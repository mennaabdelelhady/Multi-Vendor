<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\CategoriesController;
use Illuminate\Support\Facades\Route;




Route::get('/dashboard',[DashboardController::class,'index'] )
->middleware(['auth', 'verified'])
->name('dashboard');



Route::resource('dashboard/categories', CategoriesController::class);
