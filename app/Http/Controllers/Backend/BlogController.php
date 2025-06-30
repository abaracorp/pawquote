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

    public function getBlogListing()
    {
        $blogs = $this->blogService->getAll(10);

        $count = $this->blogService->getBlogCountsByStatus([
            'published' => 0,
            'draft' => 1,
        ]);

        return view('backend.blog.blog_listing', compact('blogs', 'count'));
    }

    public function createNewBlog(){

         return view('backend.blog.create_blog');

    }


    public function saveBlogData(Request $request)
    {

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
        return view('backend.blog.edit_blog', compact('blog'));
    }

    public function updateBlog(Request $request, Blog $blog)
    {

        $validated = $request->validate([
            'title'   => 'required|string|max:255',
            'slug'   => 'required|string|max:255',
            'summary' => 'nullable|string',
            'content' => 'required|string',
            'status'  => 'nullable|in:0,1',
            'image'   => 'sometimes|required',
        ]);

        $this->blogService->update($blog, $validated);
        return redirect()->route('admin.blogs')->with('success', 'Blog updated successfully.');

    }

    public function deleteBlog(Blog $blog)
    {
        $this->blogService->delete($blog);
        return redirect()->route('admin.blogs')->with('success', 'Blog deleted successfully.');
    }


   
        public function handleBlogBulkAction(Request $request)
    {
        $action = $request->input('bulk_action');
        $selectedIds = $request->input('selected_ids', []);

        if (empty($selectedIds)) {
            return redirect()->back()->with('error', 'No blogs selected.');
        }

        switch ($action) {
            case 'delete':
                $this->blogService->deleteMultipleBlogs($selectedIds);
                break;

            case 'publish':
                $this->blogService->updateStatusMultiple($selectedIds, 0); 
                break;

            case 'draft':
                $this->blogService->updateStatusMultiple($selectedIds, 1); 
                break;
        }

        return redirect()->back()->with('message', 'Bulk action applied successfully.');
    }

        public function searchBlog(Request $request)
    {
        $search = $request->input('search');
        $blogs = $this->blogService->searchBlogs($search);

       
        $count = [
            'all' => $blogs->count(),
            'published' => $blogs->where('status', 0)->count(),
            'draft' => $blogs->where('status', 1)->count(),
        ];

        
        $countFilterPage = view('components.backend.blog-status-filter', compact('count'))->render();

        $tableData = view('backend.blog.blog_table', compact('blogs'))->render();

        return response()->json([
            'countFilterPage' => $countFilterPage,
            'tableData' => $tableData,
        ]);

    }



    
}
