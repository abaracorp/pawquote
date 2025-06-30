<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Blog extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $guarded = [];

    protected $appends = ['image_url','image_name'];


    public function getImageUrlAttribute()

    {
        return $this->getFirstMediaUrl('blogs');
    }

    public function getImageNameAttribute()
    {
        return optional($this->getFirstMedia('blogs'))->file_name; 
    }

    public function getStatusTextAttribute()
    {
        return $this->status == 0 ? 'Published' : 'Draft';
    }


}
