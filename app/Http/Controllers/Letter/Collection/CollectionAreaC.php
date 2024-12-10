<?php

namespace App\Http\Controllers\Letter\Collection;

use App\Models\Letter\Collection\CollectionTramiteM;
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
        $collectionTramiteM = new CollectionTramiteM();

        $idArea = $request->id; //Obtenemos el id que el usuario selecciono en el combo de area
        $selectEnlace = $collectionRelEnlaceM->idUsuarioByArea($idArea); //Obtenemos el catalogo de enlaces
        $selectUsuario = $collectionRelUsuarioM->idUsuarioByArea($idArea);
        $selectTramite = $collectionTramiteM->list($idArea);

        return response()->json([
            'selectEnlace' => $selectEnlace,
            'selectUsuario' => $selectUsuario,
            'selectTramite' => $selectTramite,
            'status' => true,
        ]);
    }
}
