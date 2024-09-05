<?php

namespace App\Http\Controllers;
// use Vinkla\Hashids\Facades\Hashids;

use App\Models\Expert;
use App\Models\Area;
use App\Models\Expert_area;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;
use DB;
use Symfony\Component\Uid\Uuid;



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
        $experts = Expert::latest()->get();
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
            'email' => 'required|unique:experts',
            'contact' => 'required|unique:experts',
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
    // $uuid = Uuid::v4();

    $expert = new Expert;
    // $expert->mid = $uuid;
    $expert->picture = $fileName;
    $expert->name = $request->name;
    $expert->years_of_experience = $request->years_of_experience;
    $expert->email = $request->email;
    $expert->contact = $request->contact;
    $expert->profile_message = $request->profile_message;
    $expert->publish = 0;
    $expert->user_id = $user;

    if($expert->save()){

        // $area = new Expert_area;
        // $area->`area_id`, `expert_id
    $expertise = $request->area_id;
    $expert->area()->attach($expertise);

    return redirect()->route('experts.index')
            ->with('success', 'expert created successfully.');
    }

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
        // $expert->
        $expert->load('area');

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
        $ID = $id;
        $expert = Expert::find($id);

        // get area of expertise that is not assign to an expert
        $expertarea = DB::table('expert_areas')->select('area_id')->where('expert_id', $ID)->get();
        $ur = [];
        foreach ($expertarea as $exp) {
            $ur[] = $exp->area_id;
        }

        $allexpertise = DB::table('areas')->selectRaw('id as area_id')->get();
        $ar = [];
        foreach ($allexpertise as $areaofexp) {
            $ar[] = $areaofexp->area_id;
        }

        $diff = array_diff($ar, $ur);
        $expertise = Area::whereIn('id', $diff)->get();


        return view('experts.edit', compact('expert','expertise'));
    }
    public function publish($id)
    {
        $expert = Expert::find($id);
        $expert->publish = 1;
        $expert->save();

        return redirect()->route('experts.index')->with('success', 'Expert published successfully');

    }
    public function unpublish($id)
    {
        $expert = Expert::find($id);
        $expert->publish = 0;
        $expert->save();

        return redirect()->route('experts.index')->with('success', 'Expert unpublished successfully');
    }

    public function expertise($id)
    {
        $data = Expert::find($id);
        $area[] = $data->area;

        $data->load('area');

        return \response()->json([
            'status' => 200,
            'data' => $data,
            'expertise' => $area,

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Expert  $expert
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $expert = Expert::find($id);

        $expert->update($request->all());


        $expertise = $request->area_id;
        $expert->area()->attach($expertise);

        return redirect()->route('experts.show',$expert->id)
            ->with('success', 'Expert updated successfully');
    }

     public function unassign_expertise(Request $request)
     {
        $id = $request->expert_id;
        $area = $request->expertise;

        $expert = Expert::find($id);
        $expert->area()->detach($area);

        return redirect()->route('experts.edit',$expert->id);

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

        public function message($id){
        // $decoded_id = Hashids::decode($id); //decode the hashed id
        // $expert = Expert::find($decoded_id[0]);
        $expert = Expert::find($id);
        return view('message_expert', compact('expert'));

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
