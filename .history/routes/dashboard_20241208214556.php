<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\CategoriesController;



Route::get('/dashboard',[DashboardController::class,'index'] )
->middleware(['auth', 'verified'])
->name('dashboard');



Route::resource('dashboard/categories', CategoriesController::class);
