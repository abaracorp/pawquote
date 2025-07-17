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

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('blogs')
            ->useDisk('public'); 
    }

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

    public function scopeOfStatus($query, $type)
    {
        return $query->where('status', $type);
    }


    //     protected static function boot()
    // {
    //     parent::boot();

    //     static::creating(function ($model) {
    //         $model->slug = generateUniqueSlug($model->title, $model->getTable());
    //     });

    //     static::updating(function ($model) {
    //         if ($model->isDirty('title')) {
    //             $model->slug = generateUniqueSlug($model->title, $model->getTable());
    //         }
    //     });
    // } 

  protected static function boot()
{
    parent::boot();

    static::creating(function ($model) {
        if (!empty($model->slug)) {
            $model->slug = generateUniqueSlugForBlog($model->slug, $model->getTable());
        }
    });

    static::updating(function ($model) {
        if ($model->isDirty('slug') && !empty($model->slug)) {
            $model->slug = generateUniqueSlugForBlog($model->slug, $model->getTable(), 'slug', $model->id);
        }
    });
}
 


}
