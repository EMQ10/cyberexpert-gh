<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $areas = Area::latest()->get();
        return view('areas.index', compact('areas'));    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('areas.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $input = $request->all();
        $area = Area::create($input);
        return redirect()->route('areas.index')
                        ->with('success',' Area of Expertise created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $area = Area::find($id);
        return view('areas.edit', compact('area'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $area = Area::find($id);
        $area->update($request->all());
        return redirect()->route('areas.index')
                        ->with('success',' Area of Expertise updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
