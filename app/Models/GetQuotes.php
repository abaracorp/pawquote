<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class GetQuotes extends Model
{
    protected $guarded = [];


    public function getPetDetails(){

    return $this->hasMany(PetDetails::class,'get_quote_id','id');

    }


    public function getPetTextAttribute()
    {
        return $this->pet == 0 ? 'Dog' : 'Cat';
    }

    public function getPetGenderTextAttribute()
    {
        return $this->pet_gender == 0 ? 'Male' : 'Female';
    }


    protected static function boot()
{
    parent::boot();

    static::creating(function ($model) {
        $model->uuid = (string) Str::uuid();
    });
}
}
