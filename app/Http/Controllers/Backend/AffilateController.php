<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\GetQuotes;
use Illuminate\Http\Request;

class AffilateController extends Controller
{
    public function getAffilate(){

        $affilates = GetQuotes::with('getPetDetails')->latest()->get();

        // dd($affilates[0]['getPetDetails'][0]->pet_text);

        return view('backend.affilate',compact('affilates'));

    }

        public function searchAffiliate(Request $request)
    {
        $search = $request->input('search');

        $affilates = GetQuotes::where(function ($query) use ($search) {
            $query->where('zip_code', 'like', "%$search%")
                ->orWhere('email_address', 'like', "%$search%")
                ->orWhere('phone_number', 'like', "%$search%")
                ->orWhere('pet_name', 'like', "%$search%");
                // ->orWhere('pet_breed', 'like', "%$search%")
                // ->orWhere('pet', 'like', "%$search%");
        })->get();

        $tableData = view('backend.affiliate_comp', compact('affilates'))->render();

        return response()->json([
            // 'countFilterPage' => $countFilterPage,
            'tableData' => $tableData,
        ]);
    }
}
