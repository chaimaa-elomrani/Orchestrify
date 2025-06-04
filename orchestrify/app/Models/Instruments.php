<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instruments extends Model
{
    
    protected $fillable = [
        'name',
        'type',
        'sound',
        'description',
    ];

    public function musicians()
    {
        return $this->hasMany(MusicianProfile::class);
    }

    public function chefs()
    {
        return $this->hasMany(ChefProfile::class);
    }
}
