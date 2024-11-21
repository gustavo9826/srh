<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ValidateC extends Controller
{
    //La funcion valida que ambas contraseñas sean correctas
    public function validatePassword($password, $confirmPasswors)
    {
        return $password != $confirmPasswors ? false : true;
    }
}
