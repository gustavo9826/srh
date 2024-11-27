<?php

namespace App\Models\Letter\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class CollectionCoordinacionM extends Model
{
    //La funcion obtinene las coordinaciones dependiendo de la unidad que se seleccione
    public function list($idUnidad)
    {
        return DB::table('correspondencia.cat_coordinacion')
            ->select(DB::raw('correspondencia.cat_coordinacion.id_cat_coordinacion AS id, UPPER(correspondencia.cat_coordinacion.descripcion) AS name'))
            ->join('correspondencia.rel_unidad_coordinacion', 'correspondencia.cat_coordinacion.id_cat_coordinacion', '=', 'correspondencia.rel_unidad_coordinacion.id_cat_coordinacion')
            ->where('correspondencia.rel_unidad_coordinacion.id_cat_unidad', $idUnidad)
            ->where('correspondencia.cat_coordinacion.estatus', true)
            ->orderBy('correspondencia.cat_coordinacion.descripcion', 'ASC')
            ->get();
    }
}
