<?php

use Carbon\Carbon;

function CheckDays()
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
