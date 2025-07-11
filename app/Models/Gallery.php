<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Gallery extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $guarded = [];

    protected $appends = ['image_url','image_name'];

   public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('gallery-images')
            ->useDisk('public'); 
    }

    public function getImageUrlAttribute()

    {
        return $this->getFirstMediaUrl('gallery-images');
    }

    public function getImageNameAttribute()
    {
        return optional($this->getFirstMedia('gallery-images'))->file_name; 
    }

    

}
