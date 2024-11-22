<?php

namespace App\Models\Administration;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LoginM extends Model
{
    //Funcion para obtener todos los roles que tiene asignado un empleado
    public function validate($userId)
    {
        $roles = DB::table('administration.rel_rol_usuario')
            ->where('id', $userId)
            ->pluck('id_cat_modulo_rol');
        return $roles->toArray();
    }
}
