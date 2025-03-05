<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\AdministrativeUnit;

class AdministrativeUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $units = AdministrativeUnit::all();

        return view('units.index', compact('units'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('units.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|numeric|unique:administrative_units',
            'name' => 'required|max:60',
            'details' => 'max:256',
        ]);

        AdministrativeUnit::create($request->all());

        return to_route('unit.index')
            ->with('success', 'Record create succesfull.');
    }

    /**
     * Display the specified resource.
     */
    public function show(AdministrativeUnit $administrativeUnit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $unit = AdministrativeUnit::findOrFail($id);

        return view('units.edit', compact('unit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $unit = AdministrativeUnit::findOrFail($id);

        $request->validate([
            'code' => 'required|numeric|unique:administrative_units,' . $unit->id,
            'name' => 'required|max:60',
            'details' => 'max:256',
        ]);
  
        
        $unit->code = $request->code;
        $unit->name = $request->name;
        $unit->details = $request->details;
        $unit->save();
  
        return to_route('unit.index')
            ->with('success', 'Record update succesfull.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $unit = AdministrativeUnit::findOrFail($id);
        $unit->delete();

        return to_route('unit.index')
            ->with('success', 'Record deleted succesfull.');
    }
}
