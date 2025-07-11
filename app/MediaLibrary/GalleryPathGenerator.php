<?php 

namespace App\MediaLibrary;

use Spatie\MediaLibrary\Support\PathGenerator\PathGenerator;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class GalleryPathGenerator implements PathGenerator
{
    public function getPath(Media $media): string
    {
        return 'gallery/' . $media->model_id . '/';
    }

    public function getPathForConversions(Media $media): string
    {
        return $this->getPath($media) . 'conversions/';
    }

    public function getPathForResponsiveImages(Media $media): string
    {
        return $this->getPath($media) . 'responsive/';
    }
}
