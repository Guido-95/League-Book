<?php

namespace App\Http\Controllers;
use App\Post;
use App\User;
use App\Friend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Comment;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      $this->middleware('auth');
      
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    
    public function index()
    {
      // if(Auth::check()){
      $user = Auth::user();
      // $posts = Post::all()->where('user_id' , $user->id);
      $posts = Post::all();
      // $posts = Post::orderBy('created_at', 'DESC')->get();
      // $comments = Comment::all();
      $username = $user->name . ' ' . $user->surname;
      $profile = $user->img_profile;
      // $prova = Friend::where('friend_id', $user->id)->get(); 
      // $users = Friend::groupBy('friend_id')->get();
      // $countFriendRequest = Friend::where('friend_id', $user->id)->where('accepted', false)->count();
         
      return view('home',  compact('posts','username','profile','user'));
     
    }
}
