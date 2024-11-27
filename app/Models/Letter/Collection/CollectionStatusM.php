<?php

namespace App\Models\Letter\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class CollectionStatusM extends Model
{

    //La funcion retorna un catalogo de estatus
    public function list()
    {
        $result = DB::table('correspondencia.cat_estatus')
            ->selectRaw('id_cat_estatus AS id, UPPER(descripcion) AS descripcion')
            ->where('estatus', true)
            ->orderBy('descripcion', 'ASC')
            ->get();

        // Retornar el resultado
        return $result;
    }
}
