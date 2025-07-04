<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Fan extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $guarded = [];

    protected $appends = ['image_url','image_name'];

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('fan')
            ->useDisk('public'); 
    }

    public function getImageUrlAttribute()

    {
        return $this->getFirstMediaUrl('fan');
    }

    public function getImageNameAttribute()
    {
        return optional($this->getFirstMedia('fan'))->file_name; 
    }

    // public function getStatusTextAttribute()
    // {
    //     return $this->status == 0 ? 'Published' : 'Draft';
    // }
}
