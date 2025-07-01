<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class GetQuoteService
{
    public function checkExistZipCode ($zipCode)
    {
        $response = Http::withoutVerifying()->get("https://api.zippopotam.us/us/{$zipCode}");
        
        if ($response->successful()) {
            $data = $response->json();
            $state = $data['places'][0]['state abbreviation'] ?? null;

            session(['zip_code' => $zipCode]);
            return response()->json(['valid' => true,'state' => $state]);
        }

        session()->forget('zip_code');
        return response()->json(['valid' => false], 400);

    }
}
