<?php

namespace App\Http\Controllers;

use App\Models\MusicianProfile;
use App\Services\InstrumentService;
use App\Services\MusicianProfileService;
use Illuminate\Http\Request;

class MusicianProfileController extends Controller
{

    protected $musicianService;
    protected $instrumentService;

    public function __construct(MusicianProfileService $musicianService, InstrumentService $instrumentService)
    {
        $this->musicianService = $musicianService;
        $this->instrumentService = $instrumentService;
    }

    public function index()
    {
        $instruments = $this->instrumentService->get();
        return view('musicianProfile', compact('instruments'));
    }

    // public function getAllProfiles()
    // {
    //     $profiles = $this->musicianService->getAllProfiles();
    //     return view('musicianslist', compact('profiles'));
    // }

    public function getMusicians(){
        $musicians = $this->musicianService->getAllProfiles();
        return view('musicianslist', compact('musicians'));
    }

    public function store(Request $request)
    {
        $this->musicianService->store($request->all());
        session()->flash('success', 'Musician profile created successfully!');
        return redirect()->route('home');
    }

    
    public function getUsers()
    {
        $musicians = $this->musicianService->getUsers();
        return view('musicianslist', compact('musicians'));
    }





}
