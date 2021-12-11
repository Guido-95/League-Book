<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Friend;
use App\User;

use Illuminate\Support\Facades\Auth;
class FriendController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }
    public function index(){
      
    //     $friendList2 = Friend::where('user_id' , $user->id)
    //     ->orWhere('friend_id' , $user->id)
    //     ->join('users', function ($join) {
    //     $join->on('users.id', 'friends.friend_id')
    //          ->orOn('users.id', 'friends.user_id')
    //          ->select('users.*');
    // })->get();
        $user = Auth::user();
        $friendList1 = Friend::where('user_id' , $user->id)
        ->join('users', 'users.id', 'friends.friend_id')
        ->select('users.*');

        $friendList2 = Friend::where('friend_id' , $user->id)
        ->join('users', 'users.id', 'friends.user_id')
        ->select('users.*');
        
        $friends = $friendList1->union($friendList2)->get();
        // $friendList = $friendList1->merge($friendList2);
        // dd($result);
        return view('friends.index', compact('friends'));
    }

    public function removeFriend(Request $request){
        $user = Auth::user();
        $removeFriend = Friend::where('user_id' , $user->id)->where('friend_id', $request['id-remove-friend'])
        ->orWhere('user_id',$request['id-remove-friend'])->where('friend_id',$user->id)->first();
        
        $removeFriend->delete();

        return redirect()->route('friends')->with('message','amico rimosso con successo');
    }

    public function friendRequest(Request $request){

        $user = Auth::user();
        $alreadyFriend = Friend::where('user_id' , $user->id)->where('friend_id', $request->id_user)
        ->orWhere('user_id' , $request->id_user)->where
        ('friend_id', $user->id)
        ->first();
        // $alreadyFriend2 = Friend::where('user_id' , $user->id)->where('friend_id', $request->id_user)->first();
        if($alreadyFriend == null){
        
            $newFriendRequest = new Friend();
            $newFriendRequest->user_id = $user->id;
            $newFriendRequest->friend_id = $request->id_user;
            $newFriendRequest->accepted = false;
            $newFriendRequest->save();
            
           

            return redirect()->route("users.index")
            ->with('message', 'richiesta inviata con successo');
        } else  {
           
            return redirect()->route("users.index")
            ->with('message-danger', 'Hai già inviato la richiesta a questo utente');
        }
      
      
       

    }
}
