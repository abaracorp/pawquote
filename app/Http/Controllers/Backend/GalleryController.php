<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Services\MediaService;
use Illuminate\Http\Request;

class GalleryController extends Controller
{

    protected $mediaService;
   
    public function __construct(MediaService $mediaService)
    {
        $this->mediaService = $mediaService;
        
    }

    public function getGalleryListing(){

       $gallery = Gallery::get();

       return view('backend.fan_gallery.gallery_listing',compact('gallery'));
        
    }

    public function createNewGallery(){

      return view('backend.fan_gallery.create_and_edit_gallery');
        
    }


    public function saveGalleryData(Request $request)
    {
        $request->validate([
        'images'   => 'required|array',
        'images.*' => 'mimes:jpeg,png,jpg,gif,svg|max:10240',
        ], [
            'images.*.max' => 'Each image must not be greater than 10MB.',
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                
                $gallery = Gallery::create([
                    'name' => $image->getClientOriginalName(), 
                ]);

                $this->mediaService->uploadImage($gallery, $image, 'gallery-images');

            }
        }

         return redirect()->route('admin.gallery')->with('success', 'Gallery images uploaded successfully.');
       
    }

    public function deleteGallery (Gallery $gallery){

        
        // $this->mediaService->deleteMediaById($gallery, $gallery->id);
        $this->mediaService->clearMediaCollection($gallery,'gallery-images');
        // clearMediaCollection
        $gallery->delete();

        return redirect()->route('admin.gallery')->with('success', 'Gallery image deleted successfully.');

    }

    public function editGallery (Gallery $gallery){

      return view('backend.fan_gallery.create_and_edit_gallery',compact('gallery'));

    }

    public function updateGallery(Request $request, Gallery $gallery)
    {
        
        if ($request->hasFile('image')) {

            // $this->mediaService->deleteMediaById($gallery, $gallery->id);
            $this->mediaService->clearMediaCollection($gallery,'gallery-images');
            $this->mediaService->uploadImage($gallery, $request->file('image'), 'gallery-images');
            
        }

        return redirect()->route('admin.gallery')->with('success', 'Gallery image updated successfully!');
    }


}
