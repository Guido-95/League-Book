<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Message;
use App\User;
class ChatController extends Controller
{
    public function messages(Request $request){
        $idfriend = $request['friendid'];
        $iduser = $request['userid'];
        
        $friendChat = User::where('id',$idfriend)->first();
        $messages1 = Message::where('user1',$iduser)->where('user2', $idfriend);
        $messages2 = Message::where('user1',$idfriend)->where('user2', $iduser);
        $messages = $messages1->union($messages2)->orderBy('created_at', 'ASC')->get();
        // dd( $messages);
        $user1 = User::where('id', $iduser)->first();
        $user2 = User::where('id',$idfriend)->first();
        // $messages = Message::all();
        return response()->json( ['messaggi' => $messages, 'user1'=>$user1, 'user2'=>$user2]);
    }

    public function send(Request $request){
        $newMessage = new Message();
        $newMessage->user1 = $request['userid'];
        $newMessage->user2 = $request['friendid'];
        $newMessage->message = $request['singleMessage'];
        $newMessage->save();
        return response()->json(['prova' => $request->all()]);
    }
}
