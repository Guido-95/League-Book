<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Illuminate\Support\Facades\Auth;
class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $postCommento = $_GET['postCliccato'];
        
        return view('comment.create',compact('postCommento'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   $request->validate([
        'content' => 'required|max:255',
        
        
    ]); 
        // dd($request->all());
        if(Auth::check()){
            $data = $request->all();
            $user = Auth::user();
            $newComment = new Comment();
            $newComment->post_id = $data['postCommento'];
            $newComment->user_id = $user->id;
            $newComment->img_owner = $user->img_profile;
            $newComment->owner = $user->name . ' ' . $user->surname;
            $newComment->fill($data);
            $newComment->save();
            // $posts = Post::all()->where('id_user' , $user->id);
            // $username = $user->name . ' ' . $user->surname;
            return redirect('home')->with('posts', 'username');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
