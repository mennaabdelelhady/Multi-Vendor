<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $title = 'store';
       
                
        return View::make('dashboard',[
            'user' =>'Menna',
            'title' => $title
        ]);
    }
}
