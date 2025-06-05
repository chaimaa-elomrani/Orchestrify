<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ChefProfileService;

class ChefProfileController extends Controller
{
    protected $chefService;
    public function __construct(ChefProfileService $chefService)
    {
        $this->chefService = $chefService;
    }


    public function index()
    {
        return view('chefProfile');
    }


 public function store(Request $request)
{
    if (!auth()->check()) {
        return redirect()->route('login');
    }

    $user = auth()->user();

    if ($user->chefProfile && $user->chefProfile->completed) {
        return redirect()->route('home')->with('error', 'You have already completed your profile.');
    }

    $this->chefService->store($request->all());

    return redirect()->route('home')->with('success', 'Profile created successfully!');
}

}


