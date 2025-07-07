<?php

namespace App\Http\Controllers;

use App\Models\FaqGuide;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getHomePage()
    {

        $faqs = FaqGuide::OfType(0)->OfStatus(0)->limit(4)->get();

        return view('welcome',compact('faqs'));
    }
}
