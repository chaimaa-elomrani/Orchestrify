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
    ];


    public function musicians()
    {
        return $this->belongsToMany(MusicianProfile::class, 'musician_programme', 'programme_id', 'musician_profiles_id', 'id', 'id')
            ->withPivot('ordre', 'duree');
    }
    
}
