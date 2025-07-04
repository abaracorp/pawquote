<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\GetQuotes;
use Illuminate\Http\Request;

class AffilateController extends Controller
{
    public function getAffilate(){

        $affilates = GetQuotes::latest()->get();

        return view('backend.affilate',compact('affilates'));

    }
}
