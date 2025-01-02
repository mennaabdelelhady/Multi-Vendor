<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Validator::extend('filter',function($attribute, $value,$params){
            return ! in_array(strtolower($value), $params);
        },'This name is prohipted!');

        paginator::useBootstrap();
    }
}
