<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MusiciansPrograms extends Model
{
    
    protected $fillable = ['musician_id', 'program_id', 'ordre', 'duree'];


    public function musician()
    {
        return $this->belongsTo(MusicianProfile::class, 'musician_id');
    }
    public function program()
    {
        return $this->belongsTo(Programs::class, 'program_id');
    }
}
