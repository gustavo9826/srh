<?php

namespace App\Http\Controllers\Letter\Letter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LetterC extends Controller
{
    public function __invoke()
    {
        return view('letter/letter/list');
    }

    public function table(Request $request)
    {
        try {

            $iterator = $request->input('iterator'); //OFSET valor de paginador
            $searchValue = $request->input('searchValue'); // ITERATOR
            $roleUserArray = collect(session('SESSION_ROLE_USER'))->toArray(); //Array to role
            $ADM_TOTAL = config('custom_config.ADM_TOTAL'); //PERMITE EL ACCESO TOTAL A LOS MODULOS DEL SISTEMA
            $COR_TOTAL = config('custom_config.COR_TOTAL');//PERMITE EL ACCESO TOTAL A LOS MODULOS DE CORRESPONDENCIA
            $COR_USUARIO = config('custom_config.COR_USUARIO'); //PERMITE EL ACCESO A ACCIONES COMO AGREGAR/MODIFICAR/ELIMINAR FILTRADO POR AREA DE LOS MODULOS DE CORRESPONDENCIA
            $COR_ENLACE = config('custom_config.COR_ENLACE'); //PERMITE EL ACCESO A INFORMACION SOLO PARA ENLACE Y ACCIONES COMO MODIFICAR

            if (in_array($ADM_TOTAL, $roleUserArray) || in_array($COR_TOTAL, $roleUserArray)) {
                // TABLA CON ACCESO A LA INFORMACION COMPLETA
            } else {
                //TABLA CON ACCESO A LA INFORMACION POR AREA
                //OBTENER EL ID DE LA AREA INGRESADA POR USUARIO
            }






            return response()->json([ // Lógica para procesar la solicitud+
                //'value' => $value,
                'role' => $roleUserArray,
                'status' => true,
            ]);

        } catch (\Exception $e) { // Manejo de errores  
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}
