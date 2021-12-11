<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/','WelcomeController@index');
Route::resource('posts', 'PostController');
Route::resource('users', 'UserController');

// Route::get('users', 'UserController@index')->name('users');
// Route::get('users/{id}', 'UserController@show')->name('user-show');
Route::get('/chat/{id}', 'ChatController@index')->name('chat');
Route::post('/send', 'ChatController@send')->name('send-message');
Route::get('/friend-request', 'FriendRequestController@index')->name('friend-request');
Route::post('/friend-request-success', 'FriendRequestController@success')->name('friend-request-success');
Route::post('/friend-request-failed', 'FriendRequestController@failed')->name('friend-request-failed');
Route::get('/list-friends', 'FriendController@index')->name('friends');
Route::post('/remove-friend', 'FriendController@removeFriend')->name('remove-friend');
Route::post('/friend-request', 'FriendController@friendRequest')->name('request-friend');
Route::resource('comment', 'CommentController');
Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/messages','chatController@pageChat');
// Route::get('/messages{id}','chatController@pageChat');
Route::post('/invio','chatController@send')->name('send-message');

Route::post("/messages","chatController@pageChat")->name('messages');
Route::get("{any?}","WelcomeController@index")->where("any", ".*");