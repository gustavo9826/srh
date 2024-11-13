<?php

namespace App\Http\Controllers\Administration;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class UserC extends Controller
{
    public function __invoke()
    {
        return view('administration/user');
    }

    public function getUsers(Request $request)
    {
        //listar informacon
        $user = User::select('id', 'name', 'email')->get();
        return datatables()->of($user)->toJson();
    }
}
