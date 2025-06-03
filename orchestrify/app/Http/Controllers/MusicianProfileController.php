<?php

namespace App\Http\Controllers;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MusicianProfileController extends Controller
{
    // protected $authService;

    // public function __construct(AuthService $authService)
    // {
    //     $this->authService = $authService;
    // }

    public function index()
    {
        return view('musicianProfile');
    }

    // public function show(Request $request)
    // {
    //     $user = Auth::user();
    //     return view('musicianProfile', ['user' => $user]);
    // }
}