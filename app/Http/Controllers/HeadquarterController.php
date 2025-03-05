<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Headquarter;

class HeadquarterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $headquarters = Headquarter::all();

        return view('headquarters.index', compact('headquarters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('headquarters.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:60',
        ]);

        Headquarter::create($request->all());

        return to_route('headq.index')
            ->with('success', 'Record create succesfull.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Headquarter $headquarter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $headquarter = Headquarter::findOrFail($id);

        return view('headquarters.edit', compact('headquarter'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:60',
        ]);
  
        $headquarter = Headquarter::findOrFail($id);
        $headquarter->name = $request->name;
        $headquarter->address = $request->address;
        $headquarter->save();
  
        return to_route('headq.index')
            ->with('success', 'Record update succesfull.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $headquarter = Headquarter::findOrFail($id);
        $headquarter->delete();

        return to_route('headq.index')
            ->with('success', 'Record deleted succesfull.');
    }
}
