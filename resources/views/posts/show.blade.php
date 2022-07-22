@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
            <img src="/storage/{{$post->image}}" class="w-100"/>
        </div>
        <div class="col-4">
            <div class="d-flex align-items-center">
                <div class="pe-3"><img src="{{$post->user->profile->profileimage()}}" class="rounded-circle w-100" style="max-width:40px" /></div>
                <div class="d-flex">
                    <a href="/profile/{{$post->user->id}}" class="text-decoration-none">
                        <div class="fw-bold">
                            <span class="text-dark"> {{$post->user->username}}</span>
                        </div>
                    </a>
                    <a href="#" class="ps-3">Follow</a>
                </div>
            </div>
            <p><a href="/profile/{{$post->user->id}}" class="text-decoration-none fw-bold">
                <span class="text-dark">{{$post->user->username}}</<span>
               </a>
               {{$post->caption}}</p>
        </div>
    </div>

</div>
@endsection
