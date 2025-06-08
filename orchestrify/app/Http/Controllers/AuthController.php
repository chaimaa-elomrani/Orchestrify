<?php
namespace App\Http\Controllers;
use App\Services\AuthService;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{

    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function index()
    {
        return view('/home');
    }

    public function showRegisterForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required|in:musicien,chef',
        ]);
        $user = $this->authService->register([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password'],
            'role' => $validated['role'],
        ]);



        Auth::login($user);
        session()->flash('success', 'User registered successfully!');
        return view('/login');
    }





    public function showLoginForm()
    {
        return view('login');
    }


    public function checkProfileAndRedirect($user)
    {
        $hasMusicianProfile = DB::table('musician_profiles')->where('user_id', $user->id)->exists();
        $hasChefProfile = DB::table('chef_profiles')->where('user_id', $user->id)->exists();

        if ($hasMusicianProfile || $hasChefProfile) {
            return redirect()->route('home');
        } else {
            if ($user->role === 'musicien') {
                return redirect()->route('musician.profile')->with('message', 'Please complete your profile.');
            } elseif ($user->role === 'chef') {
                return redirect()->route('chef.profile')->with('message', 'Please complete your profile.');
            } else {
                return redirect()->route('home');
            }
        }
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $user = $this->authService->login($credentials['email'], $credentials['password']);

        if (!$user) {
            return redirect(route('login.form'))->with('error', 'Invalid credentials.');
        }

        Auth::login($user);

        return $this->checkProfileAndRedirect($user);
    }




    public function logout()
    {
        $this->authService->logout();

        Auth::logout();
        session()->flash('success', 'Logout successful!');
        return view('/home');
    }


}