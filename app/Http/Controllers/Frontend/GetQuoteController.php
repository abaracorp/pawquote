<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Services\GetQuoteService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GetQuoteController extends Controller

{

    protected $getQuoteService;

    public function __construct(GetQuoteService $getQuoteService)
    {
        
        $this->getQuoteService = $getQuoteService;

    }

    public function quoteZipcode (Request $request){

       
        $data = $this->getQuoteService->checkExistZipCode($request->zip);

        return response()->json($data);

    }

    public function quoteSteps (){

        $zipCode = session()->get('zip_code');


        $path = public_path('json/breeds-data.json');
        $breeds = json_decode(file_get_contents($path), true);

        return view('frontend.quote_steps',compact('zipCode','breeds'));
        
    }

    public function saveQuoteSteps(Request $request){

      $data = $this->getQuoteService->saveStepsData($request->all());

      return response()->json([
        'success' => true,
        'uuid' => $data->uuid, 
    ]);

    }

    public function quoteAllResults($uuid){

    //   dd($this->getQuoteService->getPetStepsData($uuid));

      return view('frontend/pet_protection');

    }


}
