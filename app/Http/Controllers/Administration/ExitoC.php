<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;

class ExitoC extends Controller
{
    /**
     * Muestra la vista de éxito.
     *
     * @return \Illuminate\View\View
     */
    public function __invoke()
    {
        return view('administration/exito');
    }
}