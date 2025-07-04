<?php

namespace App\Services;

use App\Models\Fan;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class FanService
{
    protected $mediaService;


    public function __construct(MediaService $mediaService,)
    {
        $this->mediaService = $mediaService;
    }


    public function store(array $data): Fan
    {

        return DB::transaction(function () use ($data) {

            $fan = Fan::create([
                'title'   => $data['title'],
                'slug'    => Str::slug($data['title']),
                // 'status'  => $data['status'] ?? 0,
                'label'   => $data['label'] ?? null,
                'content' => $data['content'],
            ]);


            if (!empty($data['image']) && $data['image']) {
                $this->mediaService->uploadImage($fan, $data['image'], 'fan');
            }

            return $fan;
        });
    }


    public function update(Fan $fan, array $data): Fan
    {
        $fan->title = $data['title'];
        $fan->slug =  Str::slug($data['title']);
        // $fan->status = $data['status'] ?? 0;
        $fan->label = $data['label'] ?? null;
        $fan->content = $data['content'];
        $fan->save();

        if (!empty($data['image'])) {

            // $fan->clearMediaCollection('fan');

            $this->mediaService->deleteMediaById($fan, $fan->id);

            $this->mediaService->uploadImage($fan, $data['image'], 'fan');
        }

        return $fan;
    }


    public function delete(Fan $fan): void
    {
        DB::transaction(function () use ($fan) {
            $this->mediaService->deleteMediaById($fan, $fan->id);
            $fan->delete();
        });
    }

    public function deleteMultipleFans(array $ids): void

    {
        DB::transaction(function () use ($ids) {
            $fans = Fan::whereIn('id', $ids)->get();

            foreach ($fans as $fan) {
                $this->mediaService->deleteMediaById($fan, $fan->id);
                $fan->delete();
            }
        });
    }

        public function updateStatusMultiple(array $ids, int $status): void
    {
        DB::transaction(function () use ($ids, $status) {
            Fan::whereIn('id', $ids)->update(['status' => $status]);
        });
    }


    public function getAll(int $perPage = 10)
    {
        return Fan::latest()->paginate($perPage);
    }

    public function getCountOfFan($type){

        return Fan::where('status',$type)->count();

    }

    public function getFanCountsByStatus(array $statuses): array
    {
        $counts = [];

        foreach ($statuses as $key => $status) {
            $counts[$key] = $this->getCountOfFan($status);
        }

        $counts['all'] = Fan::count();

        return $counts;
    }

        public function searchFans(?string $search = null, int $perPage = 10)
    {
        return Fan::query()
            ->when($search, fn($q) => $q->where('title', 'like', "%{$search}%"))
            ->latest()
            ->paginate($perPage);
    }

    

    public function show(Fan $fan): Fan
    {
        return $fan;
    }
}
