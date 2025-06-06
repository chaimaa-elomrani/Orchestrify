<?php

namespace App\Http\Controllers;

use App\Services\InstrumentService;
use Illuminate\Http\Request;

class InstrumentsController extends Controller
{
   protected $instrumentService;

   public function __construct(InstrumentService $instrumentService)
   {
      $this->instrumentService = $instrumentService;
   }


   public function index()
   {
      $instruments = $this->instrumentService->get();
      return view('instruments', compact('instruments'));
   }

   public function store(Request $request)
   {
      $this->instrumentService->store($request->all());
      session()->flash('success', 'Instrument created successfully!');
      return redirect()->route('instruments.index');
   }


   public function destroy($id)
   {
      $this->instrumentService->delete($id);
      session()->flash('success', 'Instrument deleted successfully!');
      return redirect()->route('instruments.index');
   }


   public function showForm()
   {
            $instruments = $this->instrumentService->get();
      return view('instruments', compact('instruments'));
   }



   public function update(Request $request, $id)
   {
      $this->instrumentService->update($id, $request->all());
      session()->flash('success', 'Instrument updated successfully!');
      return redirect()->route('instruments.index');
   }
}
