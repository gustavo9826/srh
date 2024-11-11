<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserC extends Controller
{
    public function __invoke()
    {
        return view('administration/user');
    }
}
