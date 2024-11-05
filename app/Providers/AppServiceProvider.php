<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

use App\Models\Follow;

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
        //
        View::composer('*', function($view){
            $view->with('countFollow', Follow::where('following_id', auth()->id())->get());
        });

        View::composer('*', function($view){
            $view->with('countFollower', Follow::where('followed_id', auth()->id())->get());
        });

    }
}
