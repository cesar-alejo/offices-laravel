<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Office;
use App\Models\Headquarter;
use App\Models\AdministrativeUnit;

class OfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        //$offices = Office::with('headquarter', 'administrative_unit')->get();
        $offices = Office::all();
        
        //dd($offices);

        return view('offices.index', compact('offices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $headquarters = Headquarter::all();
        $units = AdministrativeUnit::all();

        return view('offices.create', compact('headquarters', 'units'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'headquarters_id' => 'required',
            'administrative_units_id' => 'required',
            'code' => 'required|numeric|unique:administrative_units',
            'name' => 'required|max:60',
            'details' => 'max:256',
        ]);

        Office::create($request->all());

        return to_route('office.index')
            ->with('success', 'Record create succesfull.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Office $office)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $office = Office::findOrFail($id);

        return view('offices.edit', compact('office'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Office $office)
    {
        //$unit = AdministrativeUnit::findOrFail($id);

        //$request->validate([
        //    'code' => 'required|numeric|unique:administrative_units,' . $unit->id,
        //    'name' => 'required|max:60',
        //    'details' => 'max:256',
        //]);
  
        
        //$unit->code = $request->code;
        //$unit->name = $request->name;
        //$unit->details = $request->details;
        //$unit->save();
  
        return to_route('office.index')
            ->with('success', 'Record update succesfull.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $unit = Office::findOrFail($id);
        $unit->delete();

        return to_route('office.index')
            ->with('success', 'Record deleted succesfull.');
    }
}
