@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/question" method="post">
        @csrf
        <input type="hidden" name="survey" value="{{$survey->id}}"/>
        <div class="row">
            <div class="col-8 offset-2">
                <div class="row">
                    <h1>Add New Survey</h1>
                </div>
                @for($i=1;$i<=$data;$i++)
                    <div class="form-group row">
                        <label for="title" class="col-md-4 col-form-label"><h5>Question {{$i}}</h5></label>
                        <input id="question{{$i}}"
                               type="text"
                               class="form-control @error("question{{$i}}") is-invalid @enderror"
                               name="question{{$i}}"
                               autocomplete="title" required autofocus>

                        @error("question{{$i}}")
                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <textarea id="vars{{$i}}"
                                  class="form-control @error("vars{$i}") is-invalid @enderror"
                                  name="vars{{$i}}"
                                  rows="5"
                                  maxlength="500"
                                  autocomplete="description" required autofocus>
                            </textarea>
                        @error("vars{$i}")
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                @endfor


                <button type="submit" class="row btn btn-primary">
                    Add Survey
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
