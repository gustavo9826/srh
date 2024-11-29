<?php

namespace App\Http\Controllers\Letter\Collection;

use App\Http\Controllers\Controller;
use App\Models\Letter\Collection\CollectionClaveM;
use App\Models\Letter\Collection\CollectionDateM;
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

    //La funcion obtiene el año y datos de la clave que el usuario, seleccione
    public function dataClave(Request $request)
    {
        $collectionDateM = new CollectionDateM();

        $id_cat_anio = $request->id_cat_anio; //Se obtienen los valores
        $id_cat_clave = $request->id_cat_clave; //Se obtienen los valores

        $nameYear = $collectionDateM->getYearName($id_cat_anio);

        if (isset($id_cat_clave)) {
            $id_cat_clave = "Con info";
        } else {
            $dataClave = [
                '_labClave' => '_',
                '_labClaveCodigo' => '_',
                '_labClaveRedaccion' => '_',
            ];
        }

        return response()->json([
            'nameYear' => $nameYear,
            'dataClave' => $dataClave,
            'status' => true,
        ]);
    }

}
