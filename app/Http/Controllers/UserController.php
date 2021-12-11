<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Friend;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $user = Auth::user();
        $users = User::where('id', '!=', $user->id)->get();

        $friendList1 = Friend::where('user_id' , $user->id);
        $friendList2 = Friend::where('friend_id' , $user->id);
        // $amici = false;
        $friends = $friendList1->union($friendList2)->get();

        return view('users.index', compact('users','friends'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $user= User::find($id);
        if($user){
            return view('users.show', compact('user'));
        }else{
            return redirect(404);
        }
       
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        // $user= User::find($id);
        return view('users.edit',compact('user'));
     
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        // $request->password =  Hash::make($request->password);
        $data = $request->all();
        $data['password'] = Hash::make($request->password);
        // dd($data);
        $user= User::find($id);
        $user->update($data);
        $user->save();
        return redirect('user.show')->with('message','modificato con successo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user= User::find($id);
        $user->delete();
        return redirect('welcome')->with('message','eliminato con successo');
    }
}
