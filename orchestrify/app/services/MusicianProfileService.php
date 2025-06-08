<?php
namespace App\Services;
use App\Models\MusicianProfile;
use App\Models\Instruments;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class MusicianProfileService {

    
    public function store (array $data){
        $validated = Validator::make($data, [
            'level' => 'required|string|max:255',
            'experience' => 'required|integer|min:0|max:50',
            'style' => 'required|string|max:255',
            'disponibility' => 'required|string|max:255',
            'bio' => 'required|string',
            'instrument_id' => 'required|exists:instruments,id',
        ])->validate();
        MusicianProfile::create([
            'level' => $validated['level'],
            'experience' => $validated['experience'],
            'style' => $validated['style'],
            'disponibility' => $validated['disponibility'],
            'bio' => $validated['bio'],
            'user_id' => Auth::id(), 
            'instrument_id' => $validated['instrument_id'],
            'completed' => true,
        ]);
 
    }


    public function getAllProfiles() {
        return MusicianProfile::with('instrument')->get();
    }


    public function getUserById($id) {
        return MusicianProfile::with('user_id')->find($id);
    }

    public function getUsers(){
        $musicians = MusicianProfile::with(["user", "instrument"])->get();
        return $musicians;	
    }

    



    
    
}