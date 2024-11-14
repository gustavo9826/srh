<?php

namespace App\Models\Administration;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class UserM extends Model
{
    //SCRIP: Para obtener la informacion de usuario de sistema
    public function list($iterator, $searchValue)
    {
        // Si $searchValue está vacío, no aplicamos el filtro de búsqueda
        if (empty($searchValue)) {
            $query = 'SELECT 
                    administration.users.id AS id,
                    UPPER(administration.users.name) AS name,
                    administration.users.email AS email
                  FROM administration.users
                  ORDER BY administration.users.id ASC
                  LIMIT 5 OFFSET :iterator';

            // Ejecutar la consulta sin filtro de búsqueda
            return DB::select($query, ['iterator' => $iterator]);
        }

        // Si $searchValue no está vacío, aplicamos el filtro
        $query = 'SELECT 
                administration.users.id AS id,
                UPPER(administration.users.name) AS name,
                administration.users.email AS email
              FROM administration.users
              WHERE (administration.users.name LIKE :searchValue OR administration.users.email LIKE :searchValue)
              ORDER BY administration.users.id ASC
              LIMIT 5 OFFSET :iterator';

        // Ejecutar la consulta con el filtro de búsqueda
        return DB::select($query, [
            'searchValue' => '%' . $searchValue . '%',  // Parametro de búsqueda con el wildcard %
            'iterator' => $iterator
        ]);
    }
}
