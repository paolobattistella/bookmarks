<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
     public function boot()
     {

         view()->composer('*', function($view)
         {
             $view->with('current_route_name', Route::getCurrentRoute()->getName());
         });
     }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //$this->app->bind('App\Repositories\Contracts\CategoryRepositoryContract', 'App\Repositories\CategoryRepository');
    }
}
