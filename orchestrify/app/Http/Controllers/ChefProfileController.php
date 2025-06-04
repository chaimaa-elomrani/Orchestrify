<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ChefProfileServices;

class ChefProfileController extends Controller
{
    protected $chefService; 
     public function __construct(ChefProfileServices $chefService)
   {
      $this->chefService = $chefService; 
   }


   public function index(){
      return view('chefProfile');
   }

   
    public function store(Request $request)
    {
        return $this->chefService->store($request->all());
    }
}


