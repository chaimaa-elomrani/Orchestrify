<?php

namespace App\Http\Controllers;

use App\Services\BrigadeService;
use Illuminate\Http\Request;
use App\Models\Programs;
use App\Models\MusicianProfile;
use App\Services\ChefDashboardService;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class ChefDashboardController extends BaseController
{   
    protected $chefDashboardService;
    protected $brigadeService;
    public function __construct(ChefDashboardService $chefDashboardService, BrigadeService $brigadeService)
    {
        $this->chefDashboardService = $chefDashboardService;
        $this->brigadeService = $brigadeService;
    }




    public function stats()
    {
        if (!auth()->check() || !auth()->user()->isChef()) {
            return redirect()->route('musician.dashboard');
        }

        $userId = auth()->id();

        $totalPrograms = Programs::where('chef_id', $userId)->count();
        
        $totalMusicians = DB::table('musician_programme')
            ->join('programs', 'musician_programme.programme_id', '=', 'programs.id')
            ->where('programs.chef_id', $userId)
            ->distinct('musician_programme.musician_profiles_id')
            ->count('musician_programme.musician_profiles_id');
        
        $programs = Programs::where('chef_id', $userId)
                           ->latest()
                           ->take(5)
                           ->get();

        $brigades = $this->brigadeService->getAllBrigades();

        return view('chefDashboard', compact('totalPrograms', 'totalMusicians', 'programs', 'brigades'));
    }
}
