<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Services\BlogService;
use App\Services\MediaService;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class BlogController extends Controller
{
    protected $mediaService;
    protected $blogService;
    
    public function __construct(MediaService $mediaService,BlogService $blogService)
    {
        $this->mediaService = $mediaService;
        $this->blogService = $blogService;
    }

    public function getBlogListing(){

         $blogs = $this->blogService->getAll(10);

         return view('backend.blog.blog_listing',compact('blogs'));

    }

    public function createNewBlog(){

         return view('backend.blog.create_blog');

    }


    public function saveBlogData(Request $request)
    {

        // dd($request->all());

        try {
            $validated = $request->validate([
                'title'   => 'required|string|max:255',
                'slug'    => 'required|string|max:255',
                'summary' => 'nullable|string',
                'content' => 'required|string',
                'status'  => 'nullable|in:0,1',
                'image'   => 'required',
            ]);

            $this->blogService->store($validated);

            return redirect()->route('admin.blogs')->with('success', 'Blog created successfully.');

        } catch (ValidationException $e) {
        return redirect()->back()
            ->withErrors($e->errors())
            ->withInput();
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', $e->getMessage())
                ->withInput();
        }
    }


    public function show(Blog $blog)
    {
        return view('blogs.show', compact('blog'));
    }

    public function editBlog(Blog $blog)
    {

        // dd($blog);

        return view('blogs.edit', compact('blog'));
    }

    public function update(Request $request, Blog $blog)
    {
        $validated = $request->validate([
            'title'   => 'required|string|max:255',
            'summary' => 'nullable|string',
            'content' => 'required|string',
            'status'  => 'nullable|in:0,1',
        ]);

        $this->blogService->update($blog, $validated);
        return redirect()->route('admin.blogs')->with('success', 'Blog updated successfully.');
    }

    public function deleteBlog(Blog $blog)
    {
        $this->blogService->delete($blog);
        return redirect()->route('admin.blogs')->with('success', 'Blog deleted successfully.');
    }

    

}
