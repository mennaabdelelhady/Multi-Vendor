<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Dashboard\CategoriesController;
use Illuminate\Support\Facades\Route;


Route::group([
    'middleware'=>['auth'],
    'as'=>['dashboard.']

],function(){
    Route::get('/dashboard',[DashboardController::class,'index'] )
          ->name('dashboard');


   Route::resource('dashboard/categories', CategoriesController::class)
        ->names([
            'index' => 'dashboard.categories.index',
            'create' => 'dashboard.categories.create',
        ]);
         
});



