<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ChefProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'orchestre_name',
        'experience',
        'formation',
        'musicians_count',
        'style',
        'bio',
        'user_id',
        'completed',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
