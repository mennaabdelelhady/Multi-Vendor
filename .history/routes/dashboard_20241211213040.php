<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Dashboard\CategoriesController;
use Illuminate\Support\Facades\Route;


Route::group([
    'middleware'=>['auth'],
    'as' => 'dashboard.',
    'prefix' => 'dashboard'

],function(){
    Route::get('/',[DashboardController::class,'index'])
          ->name('dashboard');


   Route::resource('/categories', CategoriesController::class);
        
         
});





