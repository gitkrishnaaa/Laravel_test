<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function profileimage()
    {
        $imagepath=$this->image?$this->image:'profile/ynPhS2PiAnOlVSTflHbbnW1SMAyEify4SRT4Vwvr.png';
        return '/storage/'.$imagepath;
    }
    public function follower()
    {
        return $this->belongsToMany(User::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
