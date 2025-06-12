<?php 

namespace App\Services;
use App\Models\Brigade;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class BrigadeService{

    public function store(Request $request){

        if (!Auth::user() || Auth::user()->role !== 'chef') {
            abort(403, 'Unauthorized action.');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'type' => 'required|string|max:255',
            'instruments' => 'required|string|max:255',
            'chef_profiles_id' => 'nullable|exists:chef_profiles,id',
            'musician_profiles_id' => 'required|exists:musician_profiles,id',
        ]);

        Brigade::create([
            'name' => $validated['name'],
            'description' => $validated['description'] ?? null,
            'type' => $validated['type'],
            'instruments' => $validated['instruments'],
            'chef_profiles_id' => $validated['chef_profiles_id'] ?? Auth::id(),
            'musician_profiles_id' => $validated['musician_profiles_id'],
        ]);
    }


    public function  getAllBrigades()
    {
        return Brigade::with(['chefProfile', 'musicianProfile'])->get();
    }


    public function delete($id)
    {
        $brigade = Brigade::findOrFail($id);
        if (Auth::user()->role !== 'chef' || Auth::id() !== $brigade->chef_profiles_id) {
            abort(403, 'Unauthorized action.');
        }
        $brigade->delete();
    }


    public function update($id, Request $request)
    {
        $brigade = Brigade::findOrFail($id);
        if (Auth::user()->role !== 'chef' || Auth::id() !== $brigade->chef_profiles_id) {
            abort(403, 'Unauthorized action.');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'chef_profiles_id' => 'nullable|exists:chef_profiles,id',
            'musician_profiles_id' => 'required|exists:musician_profiles,id',
        ]);

        $brigade->update([
            'name' => $validated['name'],
            'chef_profiles_id' => $validated['chef_profiles_id'] ?? Auth::id(),
            'musician_profiles_id' => $validated['musician_profiles_id'],
        ]);
    }
}