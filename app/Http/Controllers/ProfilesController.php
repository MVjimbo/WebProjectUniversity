<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    public function show(User $user)
    {
        //$this->authorize('view',$user->profile);

        return view("profiles.index",[
            'user'=>$user,
            'posts'=>$user->posts()->orderBy('updated_at','desc')->get(),
            'comments'=>$user->comments()->orderBy('updated_at','desc')->get()
        ]);
    }
}
