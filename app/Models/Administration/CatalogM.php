<?php

namespace App\Models\Administration;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class CatalogM extends Model
{
    public function catRolList()
    {
        // La consulta SQL para obtener los roles
        $query = "SELECT 
                    administration.cat_modulo_rol.id_cat_modulo_rol AS id,
                    CONCAT(UPPER(cat_modulo_rol.clave), ' - ', UPPER(cat_modulo_rol.nombre)) AS name
                  FROM administration.cat_modulo_rol
                  WHERE estatus = true
                  ORDER BY cat_modulo_rol.nombre ASC";

        return DB::select($query);  // Ejecutamos la consulta y devolvemos los resultados
    }
}
