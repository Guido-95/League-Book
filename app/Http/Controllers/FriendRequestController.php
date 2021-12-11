<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Friend;
use App\User;
class FriendRequestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        
    }
    public function index(){
        $user = Auth::user();
        
        $friendRequests = Friend::where('friend_id', $user->id)->where('accepted', false)
        ->join('users', 'users.id', '=', 'friends.user_id')
        ->select('users.id','users.name', 'users.surname', 'users.img_profile' )
        ->get();
        // dd($friendRequests);
        // dd($friendRequests );
        // $users = DB::table('users')
        //     ->join('contacts', 'users.id', '=', 'contacts.user_id')
        //     ->join('orders', 'users.id', '=', 'orders.user_id')
        //     ->select('users.*', 'contacts.phone', 'orders.price')
        //     ->get();
        return view('users.friendrequests', compact('friendRequests'));
    }
    public function success(Request $request){
        $user = Auth::user();
        $specificRequest = Friend::where('friend_id', $user->id)->where('user_id' , $request['mandanteRichiesta'])->first();
        $specificRequest->accepted = 1;
        $specificRequest->save();
        
        $newFriendRequest = new Friend();
        if($specificRequest->user_id == $user->id ){
            $newFriendRequest->user_id = $request['mandanteRichiesta'];
            $newFriendRequest->friend_id = $user->id;
            $newFriendRequest->accepted = true;
            $newFriendRequest->save();  
        } else{
            $newFriendRequest->user_id = $user->id;
            $newFriendRequest->friend_id = $request['mandanteRichiesta'];
            $newFriendRequest->accepted = true;
            $newFriendRequest->save(); 
        }
        

        
        $chiHaMandatoLaRichiesta = User::where('id',$request['mandanteRichiesta'] )->first();
        // dd( $chiHaMandatoLaRichiesta);
        return redirect()->route("friend-request")
        ->with('message', $chiHaMandatoLaRichiesta->name . ' accettato con successo');
        // return view('users.friendrequests',compact('friendRequests'))->with('messagge','accettato con successo');
        // dd($specificRequest->accepted);
    }

    public function failed(Request $request){
        $user = Auth::user();
        $removeFriendRequest = Friend::where('friend_id', $user->id)->where('user_id',$request['mandanteRichiesta'])->first();
        $removeFriendRequest->delete();
     
        return redirect()->route("friend-request")
        ->with('message-danger',  'richiesta rifiutata con successo');
    }
}
