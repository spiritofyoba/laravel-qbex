<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;

class MessageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $messages = Message::where("user_id", "=", $request->user()->id)->get();

        return view('home' , compact('messages'));
    }

    public function store($request)
    {
        $message = $request->user()->messages()->create([
            'subject' => $request->get('subject'),
            'body' => $request->get('body')
        ]);

        return response()->json($message, 200);
    }

    public function show(Message $message)
    {
        return view('messages.show', compact('message'));
    }
}
