<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }
    public function index(){
      // $user = Auth::user();
      // $users = User::where('id', '!=', $user->id)->get();
      // // dd($users);
      // return view('users.users', compact('users'));
    }

    public function show($id){
  
      // $user= User::find($id);
     
      // return view('users.show', compact('user'));
    }
}
