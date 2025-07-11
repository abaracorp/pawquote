<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FaqGuide extends Model
{

   protected $guarded = [];

   public function getStatusTextAttribute()
    {
        return $this->status == 0 ? 'Published' : 'Draft';
    }

    public function scopeOfType($query, $type)
    {
        return $query->where('type', $type);
    } 

    public function scopeOfStatus($query, $type)
    {
        return $query->where('status', $type);
    } 

        protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->slug = generateUniqueSlug($model->question_text	, $model->getTable());
        });

        static::updating(function ($model) {
            if ($model->isDirty('question_text')) {
                $model->slug = generateUniqueSlug($model->question_text	, $model->getTable());
            }
        });
    }

}
