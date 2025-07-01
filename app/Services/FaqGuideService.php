<?php

namespace App\Services;

use App\Models\FaqGuide;
use Illuminate\Support\Facades\DB;

class FaqGuideService
{
    

    public function store(array $data , int $type): FaqGuide
    {

        return DB::transaction(function () use ($data,$type) {

            $faqGuide = FaqGuide::create([
                'question_text'   => $data['question_text'],
                'status'          => $data['status'] ?? 0,
                'content'         => $data['content'],  
                'type'            => $type,  
            ]);

            return $faqGuide;
        });
    }




    public function update(FaqGuide $faqGuide, array $data): FaqGuide
    {
        $faqGuide->question_text = $data['question_text']; 
        $faqGuide->status = $data['status'] ?? 0;  
        $faqGuide->content = $data['content'];
        $faqGuide->save();

       
        return $faqGuide;
    }


    public function delete(FaqGuide $faqGuide): void
    {
        DB::transaction(function () use ($faqGuide) {
            $faqGuide->delete();
        });
    }

        public function deleteMultipleFaqGuide(array $ids): void
    {
        DB::transaction(function () use ($ids) {
            FaqGuide::whereIn('id', $ids)->delete();
        });
    }


        public function updateStatusMultiple(array $ids, int $status): void
    {
        DB::transaction(function () use ($ids, $status) {
            FaqGuide::whereIn('id', $ids)->update(['status' => $status]);
        });
    }


    public function getAll(int $perPage = 10 , int $type)
    {
        return FaqGuide::latest()->ofType($type)->paginate($perPage);
    }

    public function getCountOfBlog($status,$type){

        return FaqGuide::where('status',$status)->ofType($type)->count();

    }

    public function getBlogCountsByStatus(array $statuses , $type): array
    {
        $counts = [];

        foreach ($statuses as $key => $status) {
            $counts[$key] = $this->getCountOfBlog($status,$type);
        }

        $counts['all'] = FaqGuide::ofType($type)->count();

        return $counts;
    }

        public function searchFaqGuides($type,?string $search = null, int $perPage = 10)
    {
        return FaqGuide::query()
            ->ofType($type)
            ->when($search, fn($q) => $q->where('question_text', 'like', "%{$search}%"))
            ->latest()
            ->paginate($perPage);
    }

    

    public function show(FaqGuide $faqGuide): FaqGuide
    {
        return $faqGuide;
    }
}
