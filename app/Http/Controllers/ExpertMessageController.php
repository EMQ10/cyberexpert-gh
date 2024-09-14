<?php

namespace App\Http\Controllers;
use Symfony\Component\Uid\Uuid;
use App\Models\Expert;
use App\Models\Area;
use App\Models\Expert_message;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Notifications\ExpertMessageNotification;
use App\Notifications\AdminMessageNotification;
use Illuminate\Support\Facades\Notification;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use App\Models\User;

class ExpertMessageController extends Controller
{
    use HasFactory, Notifiable;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $messages = Expert_message::latest()->get();
        return view('messages.index', compact('messages'));
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

        // $uuid = Uuid::v4();

        // echo($uuid);

        $message = new Expert_message;
        // $message->id = $uuid;

        // dd($message->mid);
        $message->expert_name = $request->expert_name;
        $message->expert_email = $request->expert_email;

        $message->name = $request->name;
        $message->phone =  $request->phone;
        $message->email = $request->email;
        $message->gender = $request->gender;
        $message->subject = $request->subject;
        $message->message = $request->message;
        $message->status = 0;
        $message->expert_id = $request->expert_id;
        $message->save();


        $user = User::whereHas('roles', function($q){$q->where('name', 'Admin');})->get();
        // dd($user);
        Notification::send($user, new AdminMessageNotification($message));

        // $user->Notification::send(new AdminMessageNotification($message));

        return redirect()->route('expertise.message.feedback');

    }

    public function feedback()
    {
        return view('message_submit_feedback');

    }
    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        $message = Expert_message::find($id);
        // $try= $message->expert_id;
        // dd($try);
        $expert = Expert::where('id',$message->expert_id)->first();
        $newexpert = Expert::all();
        // dd($expert);

        return view('messages.show', compact('message','expert','newexpert'));
    }


    public function markNotification(Request $request)
{
    auth()->user()
        ->unreadNotifications
        ->when($request->input('id'), function ($query) use ($request) {
            return $query->where('id', $request->input('id'));
        })
        ->markAsRead();

    return response()->noContent();
}

    public function mail($id)
    {
        $message = Expert_message::find($id);
        $expert = Expert::where('id', $message->expert_id)->first();

        $message->status = 1;
        $message->save();

        $expert->notify(new ExpertMessageNotification($message));

        return back()->with('success', 'Expert created successfully.');
    }
    public function expert_change(Request $request,$id)
    {
        $expert = $request->change;
        $expert = Expert::find($expert);

        $message = Expert_message::find($id);

        $message->expert_name = $expert->name;
        $message->expert_email = $expert->email;
        $message->expert_id = $expert->id;

        $message->save();
        // dd($message);


        return back()->with('success', 'expert successfully changed.');
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
