<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use function PHPSTORM_META\type;

class FaqGuideController extends Controller
{
    public function getFaqGuideListing($type){

        return view('backend.faq_guide.faq_listing',compact('type'));

    }

    public function createNewFaqGuide($type){

        dd('hii');

        return view('backend.faq_guide.create_new_faq',compact('type'));

    }
}
