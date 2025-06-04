<?php
namespace App\Services;
use App\Models\MusicianProfile;
use App\Models\Instruments;


class InstrumentService {

    public function get()
    {
        return Instruments::all();
    }
}