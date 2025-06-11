<?php

namespace App\Http\Controllers;

use App\Services\ProgramsService;
use Illuminate\Http\Request;

class ProgramsController extends Controller
{

    protected $programsService;

    public function __construct(ProgramsService $programsService)
    {
        $this->programsService = $programsService;
    }

    public function index()
    {
        return view('program');
    }

    public function store(Request $request){
        $this->programsService->store($request->all());
        session()->flash('success', 'Program created successfully!');
        return redirect()->route('programs.index');
    }
}
