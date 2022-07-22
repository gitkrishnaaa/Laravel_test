@extends('layouts.app')

@section('content')
<div class="container">
    <form method="POST" action="/p" enctype="multipart/form-data">
    <div class="row">
        <div class="col-8 offset-2">
            <h1>Add New Post</h1>
        </div>
    </div>
        <div class="row">
            <div class="col-8 offset-2">
                        @csrf

                        
                            <label for="caption" class="col-md-4 col-form-label ">Post Caption</label>

                            <div class="col-md-6">
                                <input id="caption" type="text" class="form-control @error('caption') is-invalid @enderror" name="caption" value="{{ old('caption') }}" required autocomplete="caption" autofocus>

                                @error('caption')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>       
            </div>
        </div>
        <div class="row">
            <div class="col-8 offset-2">
                <label for="image" class="col-md-4 col-form-label ">Post Image</label>
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
                <button class="btn btn-primary">Add New Post</button>
            </div>
        </div>
    </form>    
</div>
@endsection
