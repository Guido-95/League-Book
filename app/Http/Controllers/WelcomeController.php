<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;

class WelcomeController extends Controller
{
  
    public function index(){
        if(Auth::check()){
            $user = Auth::user();
            $username = $user->name . $user->surname;
            $posts = Post::all();
            return view('home', compact('posts','username'));
        } else{
            return view('welcome');
        }
    }
}
