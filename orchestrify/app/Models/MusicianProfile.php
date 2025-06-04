<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MusicianProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'level', 
        'experience',
        'style',
        'disponibility',
        'bio',
        'user_id',
        'instrument_id',
        'completed',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function instrument()
    {
        return $this->belongsTo(Instruments::class);
    }
}
