<?php

namespace App\Http\Controllers;

use App\Models\MusicianProfile;
use App\Models\Programs;
use App\Services\BrigadeService;
use App\Services\InstrumentService;
use App\Services\MusicianDashboardService;
use Illuminate\Http\Request;

class MusicianDashboardController extends Controller
{
    protected $brigadeService;
    protected $instrumentsService;

    public function __construct(BrigadeService $brigadeService, InstrumentService $instrumentsService) {
        $this->brigadeService = $brigadeService;
        $this->instrumentsService = $instrumentsService;
    }

    /**
     * Display the musician dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('musicianDashboard');
    }
}
