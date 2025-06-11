<?php

namespace App\Http\Controllers;

use App\Models\MusicianProfile;
use App\Models\Programs;
use App\Services\ChefDashboardService;
use Illuminate\Http\Request;

class ChefDashboardController extends Controller
{
    
    protected $chefDashboardService;


    public function __construct(ChefDashboardService $chefDashboardService)
    {
        $this->chefDashboardService = $chefDashboardService;
    }


    public function stats()
{
    // Get programs with musicians count
    $programs = Programs::withCount('musicians')->get();
    
    // Get other statistics
    $totalPrograms = $programs->count();
    $totalMusicians = MusicianProfile::count();
    
    return view('chefDashboard', compact('programs', 'totalPrograms', 'totalMusicians'));
}

}
