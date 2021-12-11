<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\Friend;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        

        View::composer('*', function($view)
        {
            if (Auth::check()){
                $user = Auth::user();
                $countFriendRequest = Friend::where('friend_id', $user->id)->where('accepted', false)->count();
                View::share('friendRequest', $countFriendRequest);
            }
        });
     
    
    }
}