<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Programs extends Model
{

    protected $fillable = [
        'name', 
        'style',
        'tempo',
        'duration',
        'mode',
        'chef_id',
    ];


    public function musicians()
    {
        return $this->belongsToMany(MusicianProfile::class, 'musician_programme', 'programme_id', 'musician_profiles_id')
            ->withPivot('ordre', 'duree');
    }
    

       public function chef()
    {
        return $this->belongsTo(User::class, 'chef_id');
    }
}
