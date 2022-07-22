<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Cache;

class profilescontroller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index($user)
    {
        $user=User::findOrFail($user);
        $follows=(auth()->user())?auth()->user()->following->contains($user->id):false;
        $postcount=Cache::remember('count.post.'.$user->id,
        now()->addSeconds(30),
        function() use($user){
            $user->posts->count();
        });
       
        $followercount=Cache::remember('count.follower.'.$user->id,
        now()->addSeconds(30),
        function() use($user){
            $user->profile->follower->count();
        });
        $followingcount=Cache::remember('count.following.'.$user->id,
        now()->addSeconds(30),
        function() use($user){
            $user->profile->follower->count();
        });
        return view('home',[
            "user"=>$user,
            "follows"=>$follows,
            'postcount'=>$postcount,
            'followercount'=>$followercount,
            'followingcount'=>$followingcount

        ]);
    }
    public function edit(\App\Models\User $user)
    {
        $this->authorize('update',$user->profile);
        return view('profiles.edit',compact('user'));

    }
    public function update(User $user)
    {
        $this->authorize('update',$user->profile);
        $data=request()->validate([
            'title'=>'required',
            'description'=>'required',
            'url'=>'url',
            'image'=>'image'

        ]);
        $image_path="";
        if(request('image')){
            $image_path= request('image')->store('profile','public');
            $image=Image::make(public_path("storage/{$image_path}"))->fit(1000,1000);
            $image->save();
            $imageArray=['image'=>$image_path];
        }
        auth()->user()->profile->update(array_merge($data,$imageArray??[]));
        return redirect("/profile/{$user->id}");
    }
}
