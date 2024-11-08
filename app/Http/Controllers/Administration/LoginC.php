<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginC extends Controller
{
    public function __invoke()
    {
        return view('administration/login');
    }

    public function authenticate(Request $request)
    {
        $user = request('user');
        $password = request('password');

        $request->validate([
            'user' => ['required'],
            'password' => ['required']
        ]);
    }
}
