<?php

namespace App\Services;

use App\Models\GetQuotes;
use App\Models\PetDetails;
use App\Models\ZipCodeState;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class GetQuoteService
{

    public function checkExistZipCode($zipCode)
    {
        if ($this->zipExistsInDatabase($zipCode)) {
            return $this->respondWithZipFromDb($zipCode);
        }

        if ($this->fetchAndStoreZipFromApi($zipCode)) {
            return $this->respondWithZipFromDb($zipCode);
        }

        return $this->respondWithInvalidZip();
    }

    protected function zipExistsInDatabase($zipCode)
    {
        return ZipCodeState::where('zip_code', $zipCode)->exists();
    }

    protected function getZipFromDatabase($zipCode)
    {
        return ZipCodeState::where('zip_code', $zipCode)->first();
    }

    protected function respondWithZipFromDb($zipCode)
    {
        $zip = $this->getZipFromDatabase($zipCode);

        session(['zip_code' => $zipCode]);

        return response()->json([
            'valid' => true,
            'state' => $zip->state
        ]);
    }

    protected function fetchAndStoreZipFromApi($zipCode)
    {
        $response = Http::withoutVerifying()->get("https://api.zippopotam.us/us/{$zipCode}");

        if ($response->successful()) {
            $data = $response->json();
            $state = $data['places'][0]['state abbreviation'] ?? null;

            ZipCodeState::create([
                'zip_code' => $zipCode,
                'state' => $state
            ]);

            return true;
        }

        return false;
    }

    protected function respondWithInvalidZip()
    {
        session()->forget('zip_code');
        return response()->json(['valid' => false], 400);
    }

   public function saveStepsData(array $data): GetQuotes
{
    return DB::transaction(function () use ($data) {

        
        $quote = GetQuotes::create([
            'zip_code'      => session()->get('zip_code'),
            'email_address' => $data['email'],
            'phone_number'  => $data['phone'] ?? null,
        ]);

        
        $pets = $data['pets'];
        if (is_string($pets)) {
            $pets = json_decode($pets, true);
        }

        if (is_array($pets)) {
            foreach ($pets as $pet) {
                PetDetails::create([
                    'get_quote_id'     => $quote->id,
                    'pet'              => $pet['petType'] ?? 0, 
                    'pet_name'         => $pet['petName'] ?? null,
                    'is_have_pet_yet'  => $pet['isHavePet'] ?? 0, 
                    'pet_breed'        => $pet['selectPetBreed'] ?? null,
                    'pet_gender'       => $pet['radioCatGender'] ?? 0, 
                    'pet_age_years'    => $pet['petAgeYear'] ?? null,
                    'pet_age_months'   => $pet['petAgeMonth'] ?? null,
                ]);
            }
        }

        return $quote;
    });
}


    public function getPetStepsData($uuid){

       return GetQuotes::where('uuid',$uuid)->first();

    }

    // public function checkExistZipCode ($zipCode)
    // {
    //     $response = Http::withoutVerifying()->get("https://api.zippopotam.us/us/{$zipCode}");

    //     if ($response->successful()) {
    //         $data = $response->json();
    //         $state = $data['places'][0]['state abbreviation'] ?? null;

    //         session(['zip_code' => $zipCode]);
    //         return response()->json(['valid' => true,'state' => $state]);
    //     }

    //     session()->forget('zip_code');
    //     return response()->json(['valid' => false], 400);

    // }
}
