<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\User;
use Illuminate\Support\Facades\Auth;
class ChatController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }

    // public function index($id){
    //     $user = Auth::user();
    //     // $friendChat = User::where('id',$id)->first();
    //     $messages1 = Message::where('user1',$user->id)->where('user2', $id);
    //     $messages2 = Message::where('user1',$id)->where('user2', $user->id);
    //     $messages = $messages1->union($messages2)->orderBy('created_at', 'ASC')->get();
    //     // dd( $messages);
    //     $user1 = User::where('id', $user->id)->first();
    //     $user2 = User::where('id',$id)->first();
    //     return view('chat.single',compact('messages','user1','user2'));
    // }

    // public function send(Request $request){
    //     $request->validate([
    //         'message' => 'required|max:255',
    //     ]); 
    //     // dd($request->all());
    //     $user = Auth::user();
    //     $friendChat = User::where('id',$request['id'])->first();
    //     $newMessage = new Message();
    //     $newMessage->user1 = $user->id;
    //     $newMessage->user2 = $request['id'];
    //     $newMessage->message = $request['message'];
    //     $newMessage->save();
    //     return redirect()->route('chat',$request['id']);
    //     // dd($request->all());


    // }

    public function pageChat(Request $request){
      $user = Auth::user();
      $friend = $request['friend-id'];
      return view('chatchat.chat', compact('user','friend'));
    }
}
