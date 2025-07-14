<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Fan;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function  getAboutPage(){

         $fans = Fan::take(3)->get();
           
         return view('frontend/about',compact('fans'));

    }
}
