<?php

namespace App\Services;

use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class BlogService
{
    

    public function getTypeOfModel (){
        return "type";
    }


    public function store(array $data): Blog
    {

        return DB::transaction(function () use ($data) {

            $blog = Blog::create([
                'title'   => $data['title'],
                'slug'    => $data['slug'],
                'status'  => $data['status'] ?? 0,
                'summary' => $data['summary'] ?? null,
                'content' => $data['content'],
            ]);


            if (!empty($data['image']) && $data['image']) {
                $this->mediaService->uploadImage($blog, $data['image'], 'blogs');
            }

            return $blog;
        });
    }


    public function update(Blog $blog, array $data): Blog
    {
        $blog->title = $data['title'];
        $blog->slug =  $data['slug'];
        $blog->status = $data['status'] ?? 0;
        $blog->summary = $data['summary'] ?? null;
        $blog->content = $data['content'];
        $blog->save();

        if (!empty($data['image'])) {

            $this->mediaService->deleteMediaById($blog, $blog->id);

            $this->mediaService->uploadImage($blog, $data['image'], 'blogs');
        }

        return $blog;
    }


    public function delete(Blog $blog): void
    {
        DB::transaction(function () use ($blog) {
            $this->mediaService->deleteMediaById($blog, $blog->id);
            $blog->delete();
        });
    }

    public function deleteMultipleBlogs(array $ids): void

    {
        DB::transaction(function () use ($ids) {
            $blogs = Blog::whereIn('id', $ids)->get();

            foreach ($blogs as $blog) {
                $this->mediaService->deleteMediaById($blog, $blog->id);
                $blog->delete();
            }
        });
    }

        public function updateStatusMultiple(array $ids, int $status): void
    {
        DB::transaction(function () use ($ids, $status) {
            Blog::whereIn('id', $ids)->update(['status' => $status]);
        });
    }


    public function getAll(int $perPage = 10)
    {
        return Blog::latest()->paginate($perPage);
    }

    public function getCountOfBlog($type){

        return Blog::where('status',$type)->count();

    }

    public function getBlogCountsByStatus(array $statuses): array
    {
        $counts = [];

        foreach ($statuses as $key => $status) {
            $counts[$key] = $this->getCountOfBlog($status);
        }

        $counts['all'] = Blog::count();

        return $counts;
    }

        public function searchBlogs(?string $search = null, int $perPage = 10)
    {
        return Blog::query()
            ->when($search, fn($q) => $q->where('title', 'like', "%{$search}%"))
            ->latest()
            ->paginate($perPage);
    }

    

    public function show(Blog $blog): Blog
    {
        return $blog;
    }
}
