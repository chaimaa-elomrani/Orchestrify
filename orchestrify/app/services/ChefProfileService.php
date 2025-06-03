<?php
namespace App\Http\Controllers;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ChefProfileService {

    public function index(){
        return view('musicianProfile');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required|in:musicien,chef',
        ]);

        $authService = new AuthService();
        $user = $authService->register([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'role' => $validated['role'],
        ]);

        Auth::login($user);
        session()->flash('success', 'User registered successfully!');
        return redirect()->route('chef.profile');
    }
}