<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardC extends Controller
{
    public function dashboard(){
        return view ('home/dashboard');
    }
}
