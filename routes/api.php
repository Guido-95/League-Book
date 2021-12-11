<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::namespace('Api')
    ->group(function() {
        // Route::post('/login', 'UserController@login');
        // Route::get('/posts', 'PostController@index');
       
        Route::post('/messaggi', 'ChatController@messages');
        Route::post('/invio', 'ChatController@send');
       


        // Route::group(['middleware' => 'auth:api'], function(){
            
        // });
        
    });


