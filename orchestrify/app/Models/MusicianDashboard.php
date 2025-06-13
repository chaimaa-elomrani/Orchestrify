<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MusicianDashboard extends Model
{
    protected $table = 'musician_dashboard';

    protected $fillable = [
        'musician_id',
        'dashboard_data',
        'created_at',
        'updated_at',
    ];

    public function musician()
    {
        return $this->belongsTo('App\Models\Musician', 'musician_id');
    }
}
