<?php

namespace App\Http\Controllers;

use App\Services\InstrumentService;
use Illuminate\Http\Request;

class InstrumentsController extends Controller
{
     protected $instrumentService; 

     public function __construct(InstrumentService $instrumentService){
        $this->instrumentService = $instrumentService; 
     }

    //  public function index(){
    //     $instruments = $this->instrumentService->get();
    //     return view('musicianProfile', compact('instruments'));
    //  }
}
