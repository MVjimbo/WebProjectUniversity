@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10 ">
                <div class="d-flex justify-content-between align-items-baseline">
                    <h2>User Info</h2>
                    @can('update',$user->profile)
                        <a href="/post/create">Add new post</a>
                    @endcan
                </div>
            </div>
        </div>
        <div class="row pt-2 justify-content-center">
            <div class="col-3">
                <div class="pl-2"><h5>Name</h5></div>
            </div>
            <div class="col-7">
                {{ $user->name}}
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-3">
                <div class="pl-2"><h5>Username</h5></div>
            </div>
            <div class="col-7">
                {{ $user->username}}
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-3">
                <div class="pl-2"><h5>Email adres</h5></div>
            </div>
            <div class="col-7">
                {{ $user->email }}
            </div>
        </div>
        <div class="row justify-content-center align-items-baseline mt-4">
            <div class="col-3">
                <h2>Your Posts</h2>
            </div>
            <div class="col-7 d-flex ">
                <h5 class="mr-1">Number of posts</h5>{{ $user->posts->count() }}
            </div>
        </div>
        @foreach($posts as $post)
            <div class="row justify-content-center">
                <div class="text-dark border col-10 my-1 rounded " style="text-decoration: none" href="/post/{{$post->id}}">
                    <div class="row mt-1  ml-1 align-items-baseline justify-content-between">
                        <a class="text-dark" style="text-decoration: none" href="/post/{{$post->id}}">
                            <h3>{{$post->title}}</h3>
                        </a>
                        <div class="d-flex">
                            <a class="btn btn-primary mr-1" href="#">Edit</a>
                            <form class="mr-2" action="/post/{{$post->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                    <div class="row ml-1">
                        <h5>{{$post->description}}</h5>
                    </div>
                    <div class="row justify-content-between mx-1">
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
                </div>
            </div>
        @endforeach
        <div class="row justify-content-center align-items-baseline mt-4">
            <div class="col-3">
                <h2>Posts Your Liked</h2>
            </div>
            <div class="col-7 d-flex ">
                    <h5 class="mr-1">Number of posts</h5>{{ $user->likes->count() }}
            </div>
        </div>
        @foreach($user->likes as $post)
            <div class="row justify-content-center">
                <a class="text-dark border col-10 my-2 rounded " style="text-decoration: none" href="/post/{{$post->id}}">
                    <div class="row mt-1 ml-1">
                        <h3>{{$post->title}}</h3>
                    </div>
                    <div class="row ml-1">
                        <h5>{{$post->description}}</h5>
                    </div>
                    <div class="row justify-content-between mx-1">
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
                </a>
            </div>
        @endforeach
        <div class="row justify-content-center align-items-baseline mt-4">
            <div class="col-3">
                <h2>Your Comments</h2>
            </div>
            <div class="col-7 d-flex ">
                <h5 class="mr-1">Number of comments</h5>{{ $user->comments->count() }}
            </div>
        </div>
        <div class="row  justify-content-center">
            <div class="col-10">
                <ul class="list-group ">
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
    </div>
@endsection
