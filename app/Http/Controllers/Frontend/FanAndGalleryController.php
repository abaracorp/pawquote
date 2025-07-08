<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Fan;
use Illuminate\Http\Request;

class FanAndGalleryController extends Controller
{
        public function getFanGalleryPage (){

            $fans = Fan::take(3)->get();
            return view('frontend.fan',compact('fans'));

        }


        public function getAllSuccessStories (){

            $fans = Fan::get();
            return view('frontend.view_all_success_stories',compact('fans'));

        }


        public function getSuccessStoryPage ($slug){

            $fan = Fan::where('slug',$slug)->first();


            if (!$fan) {
                return redirect()->route('frontend.fan'); 
            }

            return view('frontend.view_success_story',compact('fan'));

        }
}
