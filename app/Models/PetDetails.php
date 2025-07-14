<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PetDetails extends Model
{
   protected $guarded = [];

    public function getPetTextAttribute()
    {
        return $this->pet == 0 ? 'Dog' : 'Cat';
    }

    public function getPetGenderTextAttribute()
    {
        return $this->pet_gender == 0 ? 'Male' : 'Female';
    }
}
