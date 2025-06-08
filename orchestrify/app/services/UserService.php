<?php
namespace App\Services;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class UserService
{

    public function getAllUsers()
    {
        return User::all();
    }

}