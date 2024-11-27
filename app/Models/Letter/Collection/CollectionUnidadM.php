<?php

namespace App\Models\Letter\Collection;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class CollectionUnidadM extends Model
{
    public function list()
    {
        // Realizar la consulta usando el Query Builder de Laravel
        $result = DB::table('correspondencia.cat_unidad')
            ->select('id_cat_unidad as id', 'descripcion')
            ->where('estatus', true)
            ->orderBy('descripcion', 'ASC')
            ->get();

        return $result;
    }
}
