@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="/post/{{$post->id}}" method="post">
            @csrf
            @method('PATCH')
            <div class="row">
                <div class="col-8 offset-2">
                    <div class="row">
                        <h1>Edit Book</h1>
                    </div>
                    <div class="form-group row">
                        <label for="title" class="col-md-4 col-form-label"><h5>Author and Title</h5></label>

                        <input id="title"
                               type="text"
                               class="form-control @error('title') is-invalid @enderror"
                               name="title"
                               value="{{ old('title') ?? $post->title}}"
                               autocomplete="title" autofocus>

                        @error('title')
                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                        @enderror
                    </div>
                    <div class="row">
                        <label for="description" class="col-md-4 col-form-label"><h5>Description</h5></label>

                        <textarea id="description"
                                  class="form-control @error('description') is-invalid @enderror"
                                  name="description"
                                  rows="15"
                                  maxlength="500"
                                  autocomplete="description" autofocus>{{ old('description') ?? $post->description}}</textarea>

                        @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="row pt-3">
                        <button class="btn btn-primary">
                            Edit Book
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
