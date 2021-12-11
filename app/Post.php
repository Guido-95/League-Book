<?php

namespace App;
use App\Comment;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // public function comments(){
    //     return $this->hasMany('App\Comment');
    // }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function comments(){
        return $this->hasMany('App\Comment');
    }

    protected $fillable = [
        'title','content','cover'
    ];
}
