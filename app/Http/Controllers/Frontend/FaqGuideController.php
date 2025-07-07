<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\FaqGuide;
use Illuminate\Http\Request;

class FaqGuideController extends Controller
{
       public function getFaqPage (){

         $faqs = FaqGuide::OfType(0)->OfStatus(0)->get();
         $guides = FaqGuide::OfType(1)->OfStatus(0)->limit(2)->get();

        return view('frontend/faq',compact('faqs','guides'));

       }

}
