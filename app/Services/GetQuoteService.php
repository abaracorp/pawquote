<?php

namespace App\Services;

use App\Models\ZipCodeState;
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
