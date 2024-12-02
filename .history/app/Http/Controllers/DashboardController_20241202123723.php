<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = 'Menna Mahmoud';
        $title = 'store';
        var_dump(compact('user','title'));
        exit;
                
        return view('dashboard',compact('user','title'));
    }
}
