<?php 

namespace App\Services;

use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class BlogService
{
    protected $mediaService;
    
    
    public function __construct(MediaService $mediaService,)
    {
        $this->mediaService = $mediaService;
        
    }

    

    // public function store(array $data): Blog
    // {
    //     return DB::transaction(function () use ($data) {
    //         return Blog::create([
    //             'title'   => $data['title'],
    //             'slug'    => Str::slug($data['title']),
    //             'status'  => $data['status'] ?? 0,
    //             'summary' => $data['summary'] ?? null,
    //             'content' => $data['content'],
    //         ]);
    //     });

        
    // }

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

        
        if (!empty($data['image']) && $data['image'] ) {
            $this->mediaService->uploadImage($blog, $data['image'], 'blogs');
        }

        return $blog;
    });
}


    public function update(Blog $blog, array $data): Blog
    {
        $blog->title = $data['title'];
        $blog->slug = Str::slug($data['title']);
        $blog->status = $data['status'] ?? 0;
        $blog->summary = $data['summary'] ?? null;
        $blog->content = $data['content'];
        $blog->save();

        return $blog;
    }


    public function delete(Blog $blog): void
    {
        DB::transaction(function () use ($blog) {
            $this->mediaService->deleteMediaById($blog,$blog->id);
            $blog->delete();
        });
    }

    public function getAll(int $perPage = 10)
    {
        return Blog::latest()->paginate($perPage);
    }

    public function show(Blog $blog): Blog
    {
        return $blog;
    }

}
