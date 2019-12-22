@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
                    <h3>{{$post->title}}</h3>
                </div>
                <div class="row mt-3 mx-1">
                    <h5>{{$post->description}}</h5>
                </div>
                <div class="row justify-content-between mx-3">
                    <div>
                        <small>
                            {{$post->user->username}}
                        </small>
                    </div>
                    <div>
                        <small>
                            {{$post->created_at}}
                        </small>
                    </div>
                </div>
        <div class="row mt-2 ml-1">

            @if((\Auth::check()) && (Auth::user()->id!=$post->user->id))
            <div class="mr-3"><like-button post-id="{{$post->id}}" likes="{{$likes}}"></like-button></div>
            @endif
            <div><strong>{{$post->users->count()}}</strong> likes</div>
        </div>
        <hr>
        <div class="row mt-4">
            <h3>Comments</h3>
        </div>
        @if(\Auth::check())
        <form method="post" action="/comment/{{$post->id}}">
            @csrf
            <label>Add Comment</label>
            <textarea class="form-control" name="comment"></textarea>
            <button class="btn btn-success mt-1" type="submit">Add Comment</button>
        </form>
        @endif
        <div class="mt-3">
            <ul class="list-group">
                @foreach($comments as $comment)
                    <li class="list-group-item">
                        <h5>{{$comment->user->username}}</h5>
                        <div class="ml-1">{{$comment->comment}}</div>
                        <small>{{$comment->created_at->diffForHumans()}}</small>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
