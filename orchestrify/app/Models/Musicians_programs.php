<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Musicians_programs extends Model
{
    
    protected $fillable = ['musician_id', 'programme_id', 'ordre', 'duree'];


    public function musician()
    {
        return $this->belongsTo(MusicianProfile::class, 'musician_id');
    }
    public function program()
    {
        return $this->belongsTo(Program::class, 'programme_id');
    }
}
