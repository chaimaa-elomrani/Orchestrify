<?php
namespace App\Services;
use App\Models\ChefProfile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class ChefProfileService
{

    public function index()
    {
        return view('musicianProfile');
    }


    public function store(array $data)
    {
        $validated = Validator::make($data, [
            'orchestre_name' => 'required|string|max:255',
            'experience' => 'required|integer|min:0|max:50',
            'formation' => 'required|string|max:255',
            'musicians_count' => 'required|integer',
            'style' => 'required|string|max:255',
            'bio' => 'required|string',

        ])->validate();


        ChefProfile::create([
            'orchestre_name' => $validated['orchestre_name'],
            'experience' => $validated['experience'],
            'formation' => $validated['formation'],
            'musicians_count' => $validated['musicians_count'],
            'style' => $validated['style'],
            'bio' => $validated['bio'],
            'user_id' => Auth::id(),
            'completed' => true,
        ]);
 
    }

}