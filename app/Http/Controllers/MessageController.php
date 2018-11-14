<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use App\Message;
use Illuminate\Support\Facades\Cookie;

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
        if($request->user()->role == 'user') {
            $messages = Message::where("user_id", "=", $request->user()->id)->get();
        } else {
            $messages = Message::get();
        }

        return view('home' , compact('messages'));
    }

    public function store(Request $request)
    {
        $message = $request->user()->posts()->create([
            'subject' => $request->get('subject'),
            'body' => $request->get('body'),
            'user_id' => $request->get('user_id')
        ]);

        Cookie::queue($message->id, 0, time() + 60 * 60 * 24 * 365);

        Cookie::queue('createTimeout', 1, time() + 60 * 5);

        return redirect('/home');
    }

    public function show(Message $message)
    {
        return view('messages.show', compact('message'));
    }

    public static function setMessageCookie(Message $message)
    {
        $commentCount = Comment::where('message_id', $message->id)->count();

        Cookie::queue($message->id, $commentCount, time() + 60 * 60 * 24 * 365);
    }
}
