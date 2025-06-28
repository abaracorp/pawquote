<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Blog extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $guarded = [];

    protected $appends = ['image_url'];


    public function getImageUrlAttribute()

    {
        return $this->getFirstMediaUrl('blogs');
    }

    public function getStatusTextAttribute()
{
    return $this->status == 0 ? 'Published' : 'Draft';
}


}
