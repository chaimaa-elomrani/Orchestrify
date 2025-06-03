<?php

namespace App\Http\Controllers;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ChefProfileController extends Controller
{

    // protected $authService;

    // public function __construct($authService)
    // {
    //     $this->authService = $authService;
    // }


   public function index(){
      return view('chefProfile');
   }







}