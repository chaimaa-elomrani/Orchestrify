<?php

namespace App\Http\Controllers;

use App\Services\InstrumentService;
use App\Services\ProgramsService;
use App\Models\MusicianProfile;
use Illuminate\Http\Request;

class ProgramsController extends Controller
{

    protected $programsService;

    protected $musiciansService;

    protected $instrumentsService;

    public function __construct(ProgramsService $programsService, MusicianProfileController $musiciansService, InstrumentService $instrumentsService)
    {
        $this->programsService = $programsService;
        $this->musiciansService = $musiciansService;
        $this->instrumentsService = $instrumentsService;
    }


    public function index()
    {
        // Get musician profiles with their instrument relationship
        $musicians = MusicianProfile::with('instrument', 'user')->get(); // Load instrument relationship
        $instruments = $this->instrumentsService->get();
        // dd($musicians);
        // Debug to see the structure
        // dd($musicians->toArray());
        
        return view('program', compact('musicians', 'instruments'));
    }


    
    public function store(Request $request)
    {
        $this->programsService->store($request->all());
        session()->flash('success', 'Program created successfully!');
        return redirect()->route('programs.index');
    }


}
