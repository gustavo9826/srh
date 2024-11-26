<?php

namespace App\Http\Controllers\Letter\Letter;

use App\Http\Controllers\Controller;
use App\Models\Letter\Collection\CollectionRelEnlaceM;
use App\Models\Letter\Collection\CollectionRelUsuarioM;
use App\Models\Letter\Letter\LetterM;
use Illuminate\Support\Facades\Auth;
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
            $collectionRelUsuarioM = new CollectionRelUsuarioM();
            $letterM = new LetterM();

            // Obtener valores de la solicitud
            $iterator = $request->input('iterator'); // OFSET valor de paginador
            $searchValue = $request->input('searchValue'); // Valor de búsqueda
            $roleUserArray = collect(session('SESSION_ROLE_USER'))->toArray(); // Array con roles de usuario
            $ADM_TOTAL = config('custom_config.ADM_TOTAL'); // Acceso completo
            $COR_TOTAL = config('custom_config.COR_TOTAL'); // Acceso completo a correspondencia
            $COR_USUARIO = config('custom_config.COR_USUARIO'); // Acceso por área

            // Verificar si el usuario tiene acceso completo
            if (in_array($ADM_TOTAL, $roleUserArray) || in_array($COR_TOTAL, $roleUserArray)) {
                // Si tiene acceso completo, no hay necesidad de filtrar por área o enlace
                // Procesar la tabla con acceso completo si es necesario
                $value = $letterM->list($iterator, $searchValue, null, null);
            } else {
                // Inicializar las variables
                $idArea = null;
                $idUserEnlace = null;

                // Verificar si el usuario tiene el rol COR_USUARIO
                if (in_array($COR_USUARIO, $roleUserArray)) {
                    // Obtener el área asociada al usuario
                    $idArea = $collectionRelUsuarioM->idAreaByUser(Auth::id())->first();
                }

                // Si no tiene un área asociada, asignamos el id del usuario como enlace
                $idUserEnlace = $idArea ? null : Auth::id();

                // Llamamos al método list() con los parámetros necesarios
                $value = $letterM->list($iterator, $searchValue, $idArea, $idUserEnlace);
            }

            // Responder con los resultados
            return response()->json([
                'value' => $value,
                'status' => true,
            ]);

        } catch (\Exception $e) {
            // Manejo de errores en caso de excepciones
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }









}
