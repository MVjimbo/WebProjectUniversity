@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/survey" method="post">
        @csrf
        <div class="row">
            <div class="col-8 offset-2">
                <div class="row">
                    <h1>Add New Survey</h1>
                </div>
                <div class="form-group row">
                    <label for="title" class="col-md-4 col-form-label"><h5>Title</h5></label>

                    <input id="title"
                           type="text"
                           class="form-control @error('title') is-invalid @enderror"
                           name="title"
                           value="{{ old('title') }}"
                           autocomplete="title" autofocus>

                    @error('title')
                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                    @enderror
                </div>
                <div class="form-group row">
                    <label for="number" class="col-md-4 col-form-label"><h5>Number of Questions</h5></label>

                    <input id="number"
                           type="number"
                           class="form-control @error('number') is-invalid @enderror"
                           name="number"
                           value="{{ old('number') }}"
                           autocomplete="title" autofocus>

                    @error('number')
                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                    @enderror
                </div>
                <button type="submit" class="row btn btn-primary">
                    Continue
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
