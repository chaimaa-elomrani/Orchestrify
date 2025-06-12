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
        'musician_profiles_id',
    ];


    public function chefProfile()
    {
        return $this->belongsTo(User::class, 'chef_profiles_id');
    }
    
    public function musicians()
    {
        return $this->belongsTo(MusicianProfile::class, 'musician_profiles_id');
    }

    public function instruments()
    {
        return $this->belongsTo(Instruments::class, 'instruments');
    }

    
   
}
