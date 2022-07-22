@extends('layouts.app')

@section('content')
<div class="container">
    <form method="POST" action="/profile/{{$user->id}}" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="row">
        <div class="col-8 offset-2">
            <h1>Edit Profile</h1>
        </div>
    </div>
        <div class="row">
            <div class="col-8 offset-2">
                <label for="title" class="col-md-4 col-form-label ">Title</label>
                <div class="col-md-6">
                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title')??$user->profile->title }}" required autocomplete="title" autofocus>
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>       
            </div>
        </div>
        <div class="row">
            <div class="col-8 offset-2">
                <label for="description" class="col-md-4 col-form-label ">Description</label>
                <div class="col-md-6">
                    <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description')??$user->profile->description }}" required autocomplete="description" autofocus>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>       
            </div>
        </div>
        <div class="row">
            <div class="col-8 offset-2">
                <label for="url" class="col-md-4 col-form-label ">URL</label>
                <div class="col-md-6">
                    <input id="url" type="text" class="form-control @error('url') is-invalid @enderror" name="url" value="{{ old('url')??$user->profile->url }}" required autocomplete="url" autofocus>
                        @error('url')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>       
            </div>
        </div>
        <div class="row">
            <div class="col-8 offset-2">
                <label for="image" class="col-md-4 col-form-label ">Profile Image</label>
                <div class="col-md-6">
                    <input type="file" id="image" class="form-control @error('image') is-invalid @enderror" name="image"  />
                      @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                </div>
            </div>
        </div>
        <div class="row pt-3" >
            <div class="col-8 offset-2">
                <button class="btn btn-primary">Save Profile</button>
            </div>
        </div>
    </form>
</div>
@endsection
