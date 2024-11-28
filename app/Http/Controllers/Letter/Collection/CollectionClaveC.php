<?php

namespace App\Http\Controllers\Letter\Collection;

use App\Http\Controllers\Controller;
use App\Models\Letter\Collection\CollectionClaveM;
use Illuminate\Http\Request;

class CollectionClaveC extends Controller
{
    //La funcion retorna el valor total de las variables de clave, dependiendo de las claves que se seleccion
    public function collection(Request $request)
    {
        $collectionClaveM = new CollectionClaveM();

        $idClave = $request->id;
        $valueOfClave = $collectionClaveM->getData($idClave);

        return response()->json([
            'valueOfClave' => $valueOfClave,
            'status' => true,
        ]);
    }
}
