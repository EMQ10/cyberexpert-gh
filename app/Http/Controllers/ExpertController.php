<?php

namespace App\Http\Controllers;

use App\Models\Expert;
use App\Models\Area;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;

class ExpertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware(['permission:expert-list|expert-create|expert-edit|expert-delete'], ['only' => ['index', 'show']]);
        $this->middleware(['permission:expert-create'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:expert-edit'], ['only' => ['edit', 'update']]);
        $this->middleware(['permission:expert-delete'], ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $experts = Expert::latest()->paginate(10);
        return view('experts.index', compact('experts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $areas = Area::all();
        return view('experts.create',compact('areas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'picture' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'name' => 'required',
            'area_id' => 'required',
            'years_of_experience' => 'required',
            'email' => 'required',
            'contact' => 'required',
            'profile_message' => 'required',
        ]);

    $user = User::where('id', Auth::id())->value('id');

    if ($request->hasFile('picture')) {
    $image = $request->file('picture');
    $fileName = time() . '.' . $image->getClientOriginalExtension();

    $image = Image::read($image->getRealPath());
    $image->resize(500, 550, function ($constraint) {
        $constraint->aspectRatio();
    });

    $path = storage_path('app/public/images/');
    $image->save($path.$fileName);

    $expert = new Expert;
    $expert->picture = $fileName;
    $expert->name = $request->name;
    $expert->area_id = $request->area_id;
    $expert->years_of_experience = $request->years_of_experience;
    $expert->email = $request->email;
    $expert->contact = $request->contact;
    $expert->profile_message = $request->profile_message;
    $expert->user_id = $user;
    $expert->save();

    return redirect()->route('experts.index')
            ->with('success', 'expert created successfully.');
}

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Expert  $expert
     * @return \Illuminate\Http\Response
     */
     public function show($id)
    {
        $expert = Expert::find($id);

        return view('experts.show', compact('expert'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Expert  $expert
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $expert = Expert::find($id);
        $expertise = Area::all();

        return view('experts.edit', compact('expert','expertise'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Expert  $expert
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'name' => 'required',
            'area_id' => 'required',
            'years_of_experience' => 'required',
            'email' => 'required',
            'contact' => 'required',
            'profile_message' => 'required',
        ]);
        $expert = Expert::find($id);

        $expert->update($request->all());

        return redirect()->route('experts.show',$expert->id)
            ->with('success', 'Expert updated successfully');
    }

    public function picture(Request $request, $id)
    {
    $expert = Expert::find($id);

        if ($request->hasFile('picture')) {
    $image = $request->file('picture');
    $fileName = time() . '.' . $image->getClientOriginalExtension();

    $image = Image::read($image->getRealPath());
    $image->resize(500, 550, function ($constraint) {
        $constraint->aspectRatio();
    });

    $path = storage_path('app/public/images/');
    $image->save($path.$fileName);

    $expert->picture = $fileName;
    $expert->update();

    return redirect()->route('experts.show',$expert->id)
            ->with('success', 'Expert updated successfully');
    }
}
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Expert  $expert
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expert $expert)
    {
        $expert->delete();

        return redirect()->route('experts.index')
            ->with('success', 'Expert deleted successfully');
    }
}
