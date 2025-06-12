<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brigade extends Model
{
    
    protected $fillable = [
        'name',
        'description',
        'type',
        'instruments',
        'chef_profiles_id',

    ];



    public function chefProfile()
    {

        return $this->belongsTo(ChefProfile::class, 'chef_profiles_id');
    }
    
    public function musicians()
    {

        return $this->belongsToMany(MusicianProfile::class, 'brigade_musician', 'brigade_id', 'musician_profile_id');
    }

       public function instruments()
    {
        return $this->belongsTo(Instruments::class, 'instruments');
    }

    
   
}