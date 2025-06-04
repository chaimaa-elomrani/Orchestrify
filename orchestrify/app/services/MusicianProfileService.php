<?php
namespace App\Services;
use App\Models\MusicianProfile;
use App\Models\Instruments;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class MusicianProfileService {

    public function index(){
        return view('musicianProfile');
    }

    // public function store(array $data){
    //     $validated 
    // }
}