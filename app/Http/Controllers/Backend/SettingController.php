<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\MediaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{

    protected $mediaService;
 
    
    public function __construct(MediaService $mediaService)
    {
        $this->mediaService = $mediaService;
        
    }

    public function getSettings(){

        $user = Auth::user();

        // dd($user);

        return view('backend.settings',compact('user'));

    }

        public function updateSetting(Request $request, User $user)
    {

        // dd($request->all());


        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'nullable|string|min:6|confirmed',
             'profile_image'   => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:10240', // 10MB
            ], [
                'profile_image.required' => 'An image is required.',
                'profile_image.image'    => 'The uploaded file must be an image.',
                'profile_image.mimes'    => 'Only jpeg, png, jpg, gif, and svg file types are allowed.',
                'profile_image.max'      => 'The image must not exceed 10MB in size.',
            ]);

        // dd($user);

        $user->name = $request->name;

        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        
        $user->save();

        if ($request->hasFile('profile_picture')) {
           
            // $this->mediaService->deleteMediaById($user, $user->id);
            $user->clearMediaCollection('profile_image');
            $this->mediaService->uploadImage($user, $request->file('profile_picture'), 'profile_image');
        }

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}
