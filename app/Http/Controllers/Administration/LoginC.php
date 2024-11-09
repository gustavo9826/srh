<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;

class LoginC extends Controller
{
    public function __invoke()
    {
        return view('administration/login');
    }

    public function authenticate(Request $request)
    {
        // Validación de los campos
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        // Intentar autenticar con las credenciales proporcionadas
        if (Auth::attempt($credentials)) {
            // Si la autenticación es exitosa, regeneramos la sesión y redirigimos al dashboard
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        //Redireccion a login con el mensaje 
        return back()->with([
            'value' => 'error', //VALUE_IS(error, warning, success)
            'message' => 'Información de inicio de sesión incorrecta.',
            'estatus' => 'true'
        ]);
    }
}
