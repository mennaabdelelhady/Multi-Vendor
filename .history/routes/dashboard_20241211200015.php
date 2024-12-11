<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Dashboard\CategoriesController;
use Illuminate\Support\Facades\Route;




Route::get('/dashboard',[DashboardController::class,'index'] )
->middleware(['auth'])
->name('dashboard');



Route::resource('dashboard/categories', CategoriesController::class)
->middleware('auth','verified');
