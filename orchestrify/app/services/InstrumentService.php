<?php
namespace App\Services;
use App\Models\MusicianProfile;
use App\Models\Instruments;
use Illuminate\Support\Facades\Validator;



class InstrumentService
{

    public function get()
    {
        return Instruments::all();
    }


    public function store($data)
    {
        $validated = Validator::make($data, [
            'nom' => 'required|string|max:255',
            'son' => 'required|string|max:255',
            'volume' => 'required|integer|min:1|max:100',
            'style' => 'required|string|max:255',
        ])->validate();
        Instruments::create([
            'nom' => $validated['nom'],
            'son' => $validated['son'],
            'volume' => $validated['volume'],
            'style' => $validated['style'],
        ]);
    }


    public function update($id, $data)
    {
        $instrument = Instruments::findOrFail($id);
        $instrument->update($data);
    }


    public function delete($id)
    {
        $instrument = Instruments::findOrFail($id);
        $instrument->delete();
    }

}

