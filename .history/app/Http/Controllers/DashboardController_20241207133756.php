<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $title = 'store';
       
                
        return view('dashboard/index',[
            'user' =>'Menna',
            'title' => $title
        ]);
    }
}
