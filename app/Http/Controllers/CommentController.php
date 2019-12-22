<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function show(Post $post)
    {
        $data=\request()->validate([
            "comment"=> "required",
        ]);
        $user_id=auth()->user()->id;


        $post->comments()->create(array_merge(
            $data,
            ['user_id'=>$user_id]
        ));
        return back();
    }
}
