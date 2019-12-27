@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/survey/{{$survey->id}}" method="POST">
        @csrf
        @method('PATCH')
        <h4>{{$survey->title}}</h4>
        @foreach($survey->questions as $question)
            <div class="row">
                <div class="col-12">
                        <h5 class="mr-3">{{$question->value}}</h5>
                </div>
            </div>
            <div>
                @for($i=0;$i<count($question->variants);$i++)
                    <div class="form-group form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="val{{$question->id}}" id="val{{$i}}" value="{{$question->variants[$i]->id}}">
                        <label class="form-check-label" for="val{{$i}}">{{$question->variants[$i]->value}}</label>
                    </div>
                @endfor
            </div>
            @endforeach
        <button class="btn btn-primary">
            Submit
        </button>
    </form>
</div>
@endsection
