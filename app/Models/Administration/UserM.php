<?php

namespace App\Models\Administration;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class UserM extends Model
{

    protected $table = 'administration.users';
    public $timestamps = false;
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
        'es_por_nomina',
        'estatus',
        'id_usuario',
        'fecha_usuario'
    ];
    public function list($iterator, $searchValue)
    {
        // Comienza la consulta base
        $query = DB::table('administration.users')
            ->select(
                'id',
                DB::raw('UPPER(name) AS name'),
                'email'
            )
            ->orderBy('id', 'ASC')
            ->offset($iterator)
            ->limit(5);  // Limitar los resultados a 5 con offset (paginación)

        // Si se proporciona un valor de búsqueda, agregamos la cláusula WHERE
        if (!empty($searchValue)) {
            $query->where(function ($query) use ($searchValue) {
                $query->whereRaw('UPPER(TRIM(name)) LIKE ?', ['%' . strtoupper(trim($searchValue)) . '%'])
                    ->orWhereRaw('UPPER(TRIM(email)) LIKE ?', ['%' . strtoupper(trim($searchValue)) . '%']);
            });
        }

        // Ejecutar la consulta y retornar los resultados
        return $query->get();
    }

    public function edit(string $id)
    {
        // Realizamos la consulta utilizando el Query Builder de Laravel
        $user = DB::table('administration.users')
            ->where('id', $id)
            ->first(); // Usamos first() para obtener un único registro

        // Retornamos el usuario o null si no se encuentra
        return $user ?? null;
    }

    public function validateEmail($email)
    {
        // Realizamos la consulta utilizando el Query Builder de Laravel
        $user = DB::table('administration.users')
            ->whereRaw('UPPER(TRIM(email)) = ?', [strtoupper(trim($email))])
            ->first(); // Usamos first() para obtener el primer registro

        // Retornamos true si no se encuentra el email, false si existe
        return $user ? false : true;
    }
}
