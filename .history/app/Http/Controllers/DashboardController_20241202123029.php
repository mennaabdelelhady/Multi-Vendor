<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = 'Menna Mahmoud';
        return view('dashboard',[
            'user'=>'Menna Mahmoud',
        ]);
    }
}
