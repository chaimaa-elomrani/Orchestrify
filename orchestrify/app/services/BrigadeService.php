<?php 

namespace App\Services;
use App\Models\Brigade;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class BrigadeService{

  public function store(Request $request)
{
    // Validate the request
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'type' => 'required|string|max:255',
        'instruments' => 'required|exists:instruments,id',
        'chef_profiles_id' => 'nullable|exists:chef_profiles,id',
        'musician_profiles_id' => 'array',
        'musician_profiles_id.*' => 'exists:musician_profiles,id'
    ]);

    // Create the brigade without the musician_profiles_id array
    $brigadeData = $validated;
    unset($brigadeData['musician_profiles_id']); // Remove the array from direct insertion

    $brigade = Brigade::create($brigadeData);

    // Handle the many-to-many relationship for musicians
    if (isset($validated['musician_profiles_id'])) {
        $brigade->musicians()->attach($validated['musician_profiles_id']);
    }

    return $brigade;
}


    public function  getAllBrigades()
    {
        return Brigade::with(['chefProfile', 'musicians'])->get();
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


    public function getBrigadeByUserId($userId)
    {
        return Brigade::where('chef_profiles_id', $userId)
            ->with(['chefProfile', 'musicians'])
            ->get();
    }
}