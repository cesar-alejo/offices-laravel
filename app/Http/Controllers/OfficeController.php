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
            'headquarter_id' => 'required|numeric',
            'administrative_unit_id' => 'required|numeric',
            'code' => 'required|numeric|min:1000|max:9000|unique:offices',
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
        $headquarters = Headquarter::all();
        $units = AdministrativeUnit::all();

        return view('offices.edit', compact('office', 'headquarters', 'units'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $office = Office::findOrFail($id);

        $request->validate([
            'headquarter_id' => 'required|numeric',
            'administrative_unit_id' => 'required|numeric',
            'code' => 'required|numeric|min:1000|max:9000|unique:offices,' . $office->id,
            'name' => 'required|max:60',
            'details' => 'max:256',
        ]);

        $office->headquarter_id = $request->headquarter_id;
        $office->administrative_unit_id = $request->administrative_unit_id;
        $office->code = $request->code;
        $office->name = $request->name;
        $office->details = $request->details;
        $office->save();
  
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
