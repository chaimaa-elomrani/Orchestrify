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


   public function index(){
      return view('chefProfile');
   }

   
    public function store(Request $request)
    {
        return $this->chefService->store($request->all());
    }
}


