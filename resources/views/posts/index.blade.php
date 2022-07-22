@extends('layouts.app')

@section('content')
<div class="container">
    @foreach($posts as $post)
    <div class="row">
        <div class="col-4 offset-3">
            <a href="/profile/{{$post->user->id}}"><img src="/storage/{{$post->image}}" class="w-100"/></a>
        </div>
    </div>
    <div class="row pb-4 pt-2">
        <div class="col-4 offset-3">
            <div>
                <p><a href="/profile/{{$post->user->id}}" class="text-decoration-none fw-bold">
                <span class="text-dark">{{$post->user->username}}</<span>
               </a>
               {{$post->caption}}</p>
            </div>
        </div>
    </div>
    @endforeach
    <div class="row ">
    <div class="col-12 d-flex justify-content-center ">{{$posts->links("pagination::bootstrap-4")}}</div>
    </div>
</div>
@endsection
