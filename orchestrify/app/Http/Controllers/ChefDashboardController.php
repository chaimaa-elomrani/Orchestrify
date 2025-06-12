<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Programs;
use App\Models\MusicianProfile;
use App\Services\ChefDashboardService;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class ChefDashboardController extends BaseController
{
    public function stats()
    {
        // Check if user is authenticated and is a chef
        if (!auth()->check() || !auth()->user()->isChef()) {
            return redirect()->route('musician.dashboard');
        }

        $userId = auth()->id();

        // Get statistics for the authenticated chef only
        $totalPrograms = Programs::where('chef_id', $userId)->count();
        
        // Count musicians assigned to this chef's programs via the correct pivot table name
        $totalMusicians = DB::table('musician_programme')
            ->join('programs', 'musician_programme.programme_id', '=', 'programs.id')
            ->where('programs.chef_id', $userId)
            ->distinct('musician_programme.musician_profiles_id')
            ->count('musician_programme.musician_profiles_id');
        
        // Get only the chef's programs
        $programs = Programs::where('chef_id', $userId)
                           ->latest()
                           ->take(5)
                           ->get();

        return view('chefDashboard', compact('totalPrograms', 'totalMusicians', 'programs'));
    }
}
