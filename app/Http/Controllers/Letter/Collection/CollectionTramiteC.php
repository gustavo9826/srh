<?php

namespace App\Http\Controllers\Letter\Collection;

use App\Models\Letter\Collection\CollectionClaveM;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CollectionTramiteC extends Controller
{
    //LA funcion obtiene los valores del catalogo y valores de la clave, dependiendo del tramite seleccionado
    public function collection(Request $request)
    {
        $collectionClaveM = new CollectionClaveM();

        $id = $request->id; //Obtenemos el id que el usuario selecciono en el combo de area
        $selectClave = $collectionClaveM->list($id); //Obtenemos el catalogo de enlaces

        return response()->json([
            'selectClave' => $selectClave,
            'status' => true,
        ]);
    }
}
