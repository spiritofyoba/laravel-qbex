<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function show($alias)
    {
        $message = Message::where('alias', $alias)->first();
        if ($message) {
            $comments = $message->comments;
            $com = $comments->groupBy('parent_id');
        } else $com = false;

        dd($com);

        return view('messages.show', [
            'post' => $message,
            'com' => $com
        ]);
    }
}
