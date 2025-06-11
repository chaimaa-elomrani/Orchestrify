<?php

namespace App\Services;
use App\Models\MusicianProfile;
use App\Models\MusiciansPrograms;
use App\Models\User;
use Illuminate\Support\Facades\Validator;


class MusiciansProgramsService
{
    public function index()
    {
        return view('musiciansPrograms');
    }

    public function store(array $data)
    {
        $validated = Validator::make($data, [
            'program_name' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
        ])->validate();

        MusiciansPrograms::create([
            'program_name' => $validated['program_name'],
            'description' => $validated['description'],
            'date' => $validated['date'],
            'location' => $validated['location'],
        ]);
    }

 

}