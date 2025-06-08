<?php
namespace App\Http\Controllers;
use App\Services\AuthService;
use App\Services\ChefProfileService;
use App\Services\InstrumentService;
use App\Services\MusicianProfileService;
use App\Services\UserService;
use Illuminate\Http\Request;


class UsersController extends Controller
{

    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }


    public function index()
    {
        $users = $this->userService->getAllUsers();
        return view('users', compact('users'));
    }
}