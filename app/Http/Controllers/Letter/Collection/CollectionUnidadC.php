<?php

namespace App\Http\Controllers\Letter\Collection;

use App\Models\Letter\Collection\CollectionCoordinacionM;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CollectionUnidadC extends Controller
{
    public function collection(Request $request)
    {
        $collectionCoordinacionM = new CollectionCoordinacionM();

        $id = $request->id; //Obtenemos el id que el usuario selecciono en el combo de area
        $selectCoordinacion = $collectionCoordinacionM->list($id); //Obtenemos el catalogo de enlaces

        return response()->json([
            'selectCoordinacion' => $selectCoordinacion,
            'status' => true,
        ]);
    }
}
