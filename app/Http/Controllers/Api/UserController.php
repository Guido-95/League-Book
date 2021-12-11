<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth; 
use App\User;

class UserController extends Controller
{
    public function Login(Request $request, User $user){
        $rulesLogin = array(
            'email' => 'required|exists:users',
            'password'=>'required',    
        );
        
        $data = $request->all();
        $validation = Validator::make($data,$rulesLogin);
        // dd($validation->errors());
        if($validation->fails()){
         
            return response()->json(['errori'=>$validation->errors()]);
        } else{
        
            if(Auth::attempt(['email' => $request->email, 'password' => $request->password], true)){ 
                
                $success['token'] =  $user->createToken('MyApp')-> accessToken;
                if (Auth::check()) {
                    $user = Auth::user();
                  
                }
                return response()->json(['user'=>"loggato",'token'=>$success]); 
            } 
            else{ 
                return response()->json(['error'=>'Unauthorised', 'faillogin' => 'Combinazione username password errata']); 
            } 
        }
    }
}
