<?php

namespace App\Models\Letter\Collection;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class CollectionRelUsuarioM extends Model
{
    protected $table = 'correspondencia.rel_area_usuario';
    public $timestamps = false;
    protected $fillable = [
        'id_rel_area_usuario',
        'estatus',
        'id_cat_area',
        'id_usuario',
    ];
    public function idAreaByUser($idUser)
    {
        // Consulta utilizando el Query Builder de DB
        return DB::table('correspondencia.rel_area_usuario') // Especificamos la tabla
            ->where('id_usuario', $idUser)              // Agregamos la condición para el id_usuario
            ->pluck('id_cat_area');                      // Obtenemos los valores de id_cat_area
    }
}
