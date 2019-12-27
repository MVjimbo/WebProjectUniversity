@extends('layouts.app')

@section('content')
<div class="container">
    @foreach($user->surveys as $survey)
        <div class="mb-3">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex align-items-baseline">
                        <h4 class="mr-3">{{$survey->title}}</h4>
                        <a href="{{ url('/survey/' . $survey->id )}}">{{ url('/survey/' . $survey->id )}}</a>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-11">
                    <div class="d-flex">
                        <div class="mr-2">All Number</div>
                        {{$survey->count}}
                    </div>
                </div>
            </div>
            @foreach($survey->questions as $question)
                <div class="mb-3">
                    <div class="row justify-content-center">
                        <div class="col-11">
                            <h5>{{$question->value}}</h5>
                        </div>
                    </div>
                    @foreach($question->variants as $variant)
                        <div class="row justify-content-center">
                            <div class="col-11">
                                <div class="d-flex">
                                    <div class="mr-2">{{$variant->value}}</div>
                                    {{$variant->count}}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    @endforeach
</div>
@endsection
