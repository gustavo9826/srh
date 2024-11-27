<?php

namespace App\Http\Controllers\Letter\Collection;

use App\Http\Controllers\Controller;
use App\Models\Letter\Collection\CollectionRelEnlaceM;
use App\Models\Letter\Collection\CollectionRelUsuarioM;
use Illuminate\Http\Request;

class CollectionAreaC extends Controller
{
    //Lafuncion obtiene los caralogos dependiendo de el area que el usuario seleccione
    public function collection(Request $request)
    {
        $collectionRelEnlaceM = new CollectionRelEnlaceM();
        $collectionRelUsuarioM = new CollectionRelUsuarioM();

        $idArea = $request->id; //Obtenemos el id que el usuario selecciono en el combo de area
        $selectEnlace = $collectionRelEnlaceM->idUsuarioByArea($idArea); //Obtenemos el catalogo de enlaces
        $selectUsuario = $collectionRelUsuarioM->idUsuarioByArea($idArea);

        return response()->json([
            'selectEnlace' => $selectEnlace,
            'selectUsuario' => $selectUsuario,
            'status' => true,
        ]);
    }
}
