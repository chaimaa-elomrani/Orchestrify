<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $fillable = [
        'name',
        'description',
        'date',
        'location',
        'user_id',
        'completed',
    ];

    public function musicians()
    {
        return $this->belongsToMany(MusicianProfile::class, 'musicians_programs')
                    ->withPivot('ordre', 'duree');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function instruments()
    {
        return $this->hasMany(Instruments::class);
    }
    public function musiciansPrograms()
    {
        return $this->hasMany(Musicians_programs::class);
    }
}
