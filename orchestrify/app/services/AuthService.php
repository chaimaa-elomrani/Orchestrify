<?php
namespace App\Services;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;

class AuthService {

    public function register (array $data): User{
        $user = User::create([
            'name' => $data['name'], 
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
        ]);

        return $user;

    }


    public function login ($email , $password){

        if(Auth::attempt(['email' => $email, 'password' => $password])){
            return false; 
        }

        $user = User::where('email', $email)->first();
        $user->profile_completed =true ; 
        $user->save(); 

        return $user ; 
    }


    public function logout(){
       $user = Auth::user();
        if(!$user){
            return false ; 
        }

        $user->tokens()->delete(); 
        return true ; 
    }
}
