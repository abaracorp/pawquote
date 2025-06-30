<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Services\MediaService;
use Illuminate\Http\Request;

class FanStoriesController extends Controller
{
    protected $mediaService;
   
    public function __construct(MediaService $mediaService)
    {
        $this->mediaService = $mediaService;
        
    }
}
