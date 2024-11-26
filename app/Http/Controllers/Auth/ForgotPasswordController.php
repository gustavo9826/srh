<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Models\User;

class ForgotPasswordController extends Controller
{
    /**
     * Handle sending a password reset link to the given email.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ], [
            'email.required' => 'El campo de correo electrónico es obligatorio.',
            'email.email' => 'Debe ingresar un correo electrónico válido.',
            'email.exists' => 'El correo electrónico no está registrado.',
        ]);

        // Generar una contraseña temporal
        $temporaryPassword = Str::random(10);

        // Actualizar la contraseña temporal en la base de datos
        $user = User::where('email', $request->email)->first();
        $user->password = bcrypt($temporaryPassword);
        $user->save();

        // Enviar la contraseña temporal por correo
        Mail::raw("Tu nueva contraseña temporal es: $temporaryPassword", function ($message) use ($request) {
            $message->to($request->email)
                    ->subject('Restablecimiento de Contraseña');
        });

        return back()->with(['status' => 'Se ha enviado una nueva contraseña temporal a tu correo electrónico.']);
    }
}