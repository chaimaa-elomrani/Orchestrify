<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ChefProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'orchestre_nom',
        'experience',
        'formation',
        'nombre_musiciens',
        'style',
        'biographie',
    ];

    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
