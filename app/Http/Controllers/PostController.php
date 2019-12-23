<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;
use Carbon\Carbon;


class PostController extends Controller
{
    private function checkDays()
    {
        $data=Carbon::now()->subMonth();
        $posts_count=auth()->user()->posts()->where('created_at','<',$data)->count();
        $did_post=auth()->user()->posts()->count();
        if ($did_post==0)
            $result["success"]=1;
        else
        {
            if ($posts_count==0)
            {
                $result["success"]=0;
                //$post_last=$posts->orderBy('created_at','desc')->first();
                $post_last=auth()->user()->posts()->orderBy('created_at','desc')->first();
                $post_date=$post_last->created_at->addMonth();
                $result_date=Carbon::now()->diffInDays($post_date,false);
                $result["difference"]=$result_date;
            } else{
                $result["success"]=1;
            }
        }
        return $result;
    }

    public function show(Post $post)
    {

        $likes= (auth()->user()) ? auth()->user()->likes->contains($post) : false;
        $comments=$post->comments()->orderBy('created_at','DESC')->get();
        return view('posts/show', compact('post','likes','comments'));
    }
    public function index()
    {
        $posts=Post::orderBy('created_at','DESC')->get();
        return view('posts/index',[
            "posts"=>$posts
        ]);
    }

    public function create()
    {
        //$this->authorize('create');
        //$result=$this->checkDays();
        $result["success"]=1;
        return view('posts/create',[
            "result"=>$result
    ]);
    }

    public function store(){
        //$result=$this->checkDays();//
        $result["success"]=1;
        if ($result["success"]==1) {
            $data = request()->validate([
                'title' => 'required',
                'description' => 'required',
            ]);
            auth()->user()->posts()->create($data);
        }

        return redirect('/profile/' . auth()->user()->id);
    }


    public function destroy(Post $post)
    {
        foreach ($post->comments()->get() as $comment)
        {
            $result=$comment->delete();
        }
        $result=$post->delete();
        return back();
    }

    public function edit(Post $post)
    {
        return view("posts.edit",compact('post'));
    }

    public function update(Post $post)
    {
        $data=request()->validate([
            "title"=>"required",
            "description"=>"required",
        ]);

        $post->update($data);
        return redirect("/profile/{$post->user_id}");
    }
}
