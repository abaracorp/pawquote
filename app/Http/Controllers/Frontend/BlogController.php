<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function getBlogPage()
    {

        $allBlogs = Blog::ofStatus(0)->latest()->take(7)->get();
        $featuredBlog = $allBlogs->first();
        $blogs = $allBlogs->skip(1);


        return view('frontend.blog', compact('blogs', 'featuredBlog'));
    }


    public function getAllBlogPage()
    {

        $blogs = Blog::ofStatus(0)->latest()->paginate(9);

        return view('frontend.blog_listing', compact('blogs'));
    }


    public function getBlogDeatil($slug)
    {
        $blog = Blog::where('slug', $slug)->first();

        if (!$blog) {
            return redirect()->route('frontend.blog');
        }

        $latestBlogs = Blog::latest()->OfStatus(0)->whereNot('id', $blog->id)->take(3)->get();

        return view('frontend.blog_detail', compact('blog', 'latestBlogs'));
    }

    // handleBlogSearch

    public function handleBlogSearch(Request $request)
    {
        $search = trim($request->input('query'));

        if (empty($search)) {
            return response()->json([]);
        }

        $blogs = Blog::query()
            ->OfStatus(0)
            ->where('title', 'like', "%{$search}%")
            ->get();

        return response()->json($blogs);
    }
}
