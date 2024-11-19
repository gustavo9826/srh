<?php

namespace App\Models\Administration;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class UserM extends Model
{
    protected $table = 'administration.users';
    protected $fillable = [
        'id',
        'name',
        'email',
        'email_verified_at',
        'password',
        'remember_token',
        'created_at',
        'updated_at',
        'id_tbl_empleados_hraes',
        'id_tbl_empleados_central',
        'id_tbl_empleados_trasnferidos',
        'id_tbl_empleados_aux',
        'es_por_nomina'
    ];
    public function list($iterator, $searchValue)
    {
        // Construir la cláusula WHERE solo si $searchValue no está vacío
        $whereClause = '';
        $params = ['iterator' => $iterator];

        if (!empty($searchValue)) {
            // Usamos TRIM, UPPER, UNACCENT para normalizar la búsqueda
            $whereClause = ' WHERE (UPPER(TRIM(administration.users.name)) LIKE UPPER(TRIM(:searchValue)) 
                                OR UPPER(TRIM(administration.users.email)) LIKE UPPER(TRIM(:searchValue)))';

            // Se añaden los parámetros de búsqueda con el % para hacer la búsqueda más flexible
            $params['searchValue'] = '%' . $searchValue . '%';
        }

        // Consulta base
        $query = 'SELECT 
                        administration.users.id AS id,
                        UPPER(administration.users.name) AS name,
                        administration.users.email AS email
                  FROM administration.users'
            . $whereClause . '  '  // Concatenar la cláusula WHERE si es necesario
            . ' ORDER BY administration.users.id ASC
                  LIMIT 5 OFFSET :iterator';

        // Ejecutar la consulta con los parámetros adecuados
        return DB::select($query, $params);
    }
}
