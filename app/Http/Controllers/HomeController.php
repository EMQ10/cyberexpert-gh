<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expert;
use App\Models\Area;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $experts = Expert::where('publish', 1)->orderBy('id', 'desc')
                            ->with('area')
                            ->when($request->name, function ($query) use ($request) {
                $query->where('name',  'like', '%' . $request->get('name') . '%');})
                ->get();
                $exp = $experts;

                          if($request->area_id){
                          $experts = Expert::where('publish', 1)->orderBy('id', 'desc')
                          ->with('area')
                            ->whereHas('area', function ($query) use ($request) {
                            $query->where('area_id', $request->area_id);
                            })->get();

                            $exp = Area::where('id',$request->area_id)->first();


                        };

                //             ->when($request->area_id, function ($query) use ($request) {
                // $query->where('area_id', $request->area_id);})



                // $member = Member::Where('surname', 'like', '%' . $request->get('searchQuest') . '%' )
                //             ->orWhere('firstname', 'like', '%' . $request->get('searchQuest') . '%' )
                //             ->orderBy('id', 'desc')->get();
        return view('experts', compact('experts','request','exp'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $expert = Expert::find($id);

        return view('experts-profile',compact('expert'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
