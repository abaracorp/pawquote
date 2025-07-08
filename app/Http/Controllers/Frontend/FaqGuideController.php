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

        return view('frontend.faq',compact('faqs','guides'));

       }


       public function getGuidePage (){

         $guides = FaqGuide::OfType(1)->OfStatus(0)->get();

        return view('frontend.helpful_guides',compact('guides'));

       }

       


       public function handleFaqSearch (Request $request){

            $search = $request->input('search');

            $faqs = FaqGuide::query()
                ->OfType(0)->OfStatus(0)
                ->when($search, fn($q) => $q->where('question_text', 'like', "%{$search}%"))
                // ->latest()
                ->get();

            $tableData = view('frontend.faq-question', compact('faqs'))->render();

            return response()->json([
                'tableData' => $tableData,
            ]);

       }

}
