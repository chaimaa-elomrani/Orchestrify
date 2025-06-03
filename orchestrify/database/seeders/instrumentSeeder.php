<?php

namespace Database\Seeders;

use App\Models\Instruments;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Instrument;

class instrumentSeeder extends Seeder
{
        public function run()
    {
        $instruments = [
            [
                'nom' => 'Violon',
                'son' => 'sounds/violin.mp3',
                'volume' => 80,
            ],
            [
                'nom' => 'Piano',
                'son' => 'sounds/piano.mp3',
                'volume' => 85,
            ],
            [
                'nom' => 'Guitare',
                'son' => 'sounds/guitar.mp3',
                'volume' => 90,
            ],
            [
                'nom' => 'Flûte',
                'son' => 'sounds/flute.mp3',
                'volume' => 75,
            ],
            [
                'nom' => 'Batterie',
                'son' => 'sounds/drum.mp3',
                'volume' => 95,
            ],
            [
                'nom' => 'Trompette',
                'son' => 'sounds/trumpet.mp3',
                'volume' => 88,
            ],
            [
                'nom' => 'Saxophone',
                'son' => 'sounds/saxophone.mp3',
                'volume' => 87,
            ],
            [
                'nom' => 'Harp',
                'son' => 'sounds/harp.mp3',
                'volume' => 70,
            ],
            [
                'nom' => 'Contrebasse',
                'son' => 'sounds/contrabass.mp3',
                'volume' => 78,
            ],
            [
                'nom' => 'Accordéon',
                'son' => 'sounds/accordion.mp3',
                'volume' => 82,
            ],
        ];

        foreach ($instruments as $instrument) {
            Instruments::create($instrument);
        }
    }
}
