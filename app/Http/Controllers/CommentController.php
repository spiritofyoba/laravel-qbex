<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->except('_token', 'comment_post_ID', 'comment_parent');

        $data['message_id'] = $request->input('comment_post_ID');
        $data['parent_id'] = $request->input('comment_parent');

        $data['status'] = config('comments.show_immediately');

        $user = Auth::user();

        if($user) {
            $data['user_id'] = $user->id;
        }

        $validator = Validator::make($data,[
            'message_id' => 'integer|required',
            'text' => 'required',
        ]);

        $comment = new Comment($data);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()->all()]);
        }

        $post = Message::find($data['message_id']);

        $post->comments()->save($comment);

        $data['id'] = $comment->id;

        $data['status'] = config('comments.show_immediately');

        $view_comment = view(env('THEME').'.comments.new_comment')->with('data', $data)->render();

        return response()->json(['success'=>true, 'comment'=>$view_comment, 'data'=>$data]);
    }
}
