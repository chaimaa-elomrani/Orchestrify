<?php

namespace App\Http\Controllers;

use App\Models\Brigade;
use App\Models\Instruments;
use App\Models\MusicianProfile;
use App\Services\InstrumentService;
use App\Services\MusicianProfileService;
use Auth;
use Illuminate\Http\Request;

class brigadeController extends Controller
{

    protected $brigadeService;
    protected $instrumentService;
    protected $musicianProfileService;

    public function __construct(\App\Services\BrigadeService $brigadeService, InstrumentService $instrumentService , MusicianProfileService $musicianProfileService)
    {
        $this->brigadeService = $brigadeService;
        $this->instrumentService = $instrumentService;
        $this->musicianProfileService = $musicianProfileService;
    }


    public function index()
    {
        $brigades = Brigade::with(['musicians', 'instruments'])->get();
        $instruments = $this->instrumentService->get();
        $musicians = $this->musicianProfileService->getAllProfiles();
        return view('brigade', compact('brigades', 'instruments', 'musicians'));
    }


    public function show($id)
    {
        try {
            // Fetch the brigade with its relationships
            $brigade = Brigade::with(['musicians.user', 'instruments'])->findOrFail($id);

            return view('brigadeDetails', compact('brigade'));
        } catch (\Exception $e) {
            return redirect()->route('brigades.index')->with('error', 'Brigade not found.');
        }
    }



     public function store(Request $request)
    {
       $this->brigadeService->store($request);

        return redirect()->route('brigades.index')->with('success', 'Brigade created successfully.');
    }





    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'description' => 'nullable|string',
            'instruments' => 'array',
        ]);

        $brigade = Brigade::findOrFail($id);
        $brigade->update($request->only(['name', 'type', 'description']));

        if ($request->has('instruments')) {
            $brigade->instruments()->sync($request->instruments);
        }

        return redirect()->route('brigades.show', $id)->with('success', 'Brigade updated successfully.');
    }

    public function chooseMusicians($id)
    {
        $brigade = Brigade::with(['instruments', 'musicians'])->findOrFail($id);

        // Get musicians who can play the required instruments and are not already in this brigade
        $availableMusicians = MusicianProfile::with(['user', 'instruments'])
            ->whereHas('instruments', function ($query) use ($brigade) {
                $query->whereIn('instruments.id', $brigade->instruments->pluck('id'));
            })
            ->whereDoesntHave('brigade', function ($query) use ($id) {
                $query->where('brigade_id', $id);
            })
            ->get();

        return view('brigades.choose-musicians', compact('brigade', 'availableMusicians'));
    }

    public function assignMusicians(Request $request, $id)
    {
        $request->validate([
            'musicians' => 'required|array',
            'musicians.*' => 'exists:musicians,id'
        ]);

        $brigade = Brigade::findOrFail($id);
        $brigade->musicians()->attach($request->musicians);

        return redirect()->route('brigades.show', $id)->with('success', 'Musicians assigned successfully.');
    }

    public function removeMusician($brigadeId, $musicianId)
    {
        $brigade = Brigade::findOrFail($brigadeId);
        $brigade->musicians()->detach($musicianId);

        return redirect()->route('brigades.show', $brigadeId)->with('success', 'Musician removed from brigade.');
    }
}
