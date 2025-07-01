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

}
