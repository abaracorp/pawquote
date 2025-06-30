<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;

class MediaService
{
    /**
     * Upload a single image to a model.
     */
    public function uploadImage(Model $model, UploadedFile $file, string $collection = 'default'): void
    {
        $model->addMedia($file)->toMediaCollection($collection);
    }

    /**
     * Upload multiple images to a model.
     */
    public function uploadMultipleImages(Model $model, array $files, string $collection = 'default'): void
    {
        foreach ($files as $file) {
            if ($file instanceof UploadedFile) {
                $model->addMedia($file)->toMediaCollection($collection);
            }
        }
    }

    /**
     * Delete a single media by ID.
     */
    public function deleteMediaById(Model $model, int $mediaId): bool
    {
        $media = $model->media()->find($mediaId);

        $relativePath = $media->getPathRelativeToRoot();

        if (Storage::disk($media->disk)->exists($relativePath)) {
            Storage::disk($media->disk)->delete($relativePath);
        }

        if ($media) {
            return $media->delete();
        }
        return false;
    }

    /**
     * Delete all media in a collection.
     */
    public function clearMediaCollection(Model $model, string $collection = 'default'): void
    {
        $model->clearMediaCollection($collection);
    }
}
