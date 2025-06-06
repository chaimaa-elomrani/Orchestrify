<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instruments extends Model
{
    protected $fillable = [
        'nom',
        'style', 
        'volume',
        'son'
    ];
    
    protected $table = 'instruments';
}


