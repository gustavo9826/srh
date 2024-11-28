<?php

namespace App\Models\Letter\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class CollectionClaveM extends Model
{
    //La funcion obtiene el catalogo de clave dependiendo del tramite
    public function list($idTramite)
    {
        return DB::table('correspondencia.cat_clave')  // Especificamos la tabla 'cat_clave' en el esquema 'correspondencia'
            ->select(DB::raw('correspondencia.cat_clave.id_cat_clave AS id, 
                UPPER(correspondencia.cat_clave.codigo) || \' - \' || UPPER(correspondencia.cat_clave.descripcion) AS descripcion'))
            ->join('correspondencia.rel_tramite_clave', 'correspondencia.cat_clave.id_cat_clave', '=', 'correspondencia.rel_tramite_clave.id_cat_clave')  // Realizamos el INNER JOIN entre 'cat_clave' y 'rel_tramite_clave'
            ->where('correspondencia.rel_tramite_clave.id_cat_tramite', $idTramite)  // Filtramos por el 'id_cat_tramite'
            ->where('correspondencia.cat_clave.estatus', true)  // Filtramos por 'estatus' en la tabla 'cat_clave'
            ->orderBy('correspondencia.cat_clave.descripcion', 'ASC')  // Ordenamos por 'descripcion' en 'cat_clave'
            ->get();  // Ejecutamos y obtenemos los resultados
    }
}
