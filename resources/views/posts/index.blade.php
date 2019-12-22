@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach ($posts as $post)
            <div class="row justify-content-center">
                <div class="text-dark border col-10 my-1 rounded " style="text-decoration: none" href="/post/{{$post->id}}">
                    <div class="row mt-1  ml-1">
                        <a class="text-dark" style="text-decoration: none" href="/post/{{$post->id}}">
                            <h3>{{$post->title}}</h3>
                        </a>
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
    </div>
@endsection
