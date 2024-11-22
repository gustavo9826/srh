<?php

namespace App\Models\Administration;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class UserRoleM extends Model
{
    protected $table = 'administration.rel_rol_usuario';
    public $timestamps = false;
    protected $fillable = [
        'id_rel_rol_usuario',
        'id',
        'id_cat_modulo_rol',
    ];

    public function catRolList()
    {
        return DB::table('administration.cat_modulo_rol')
            ->select(
                'id_cat_modulo_rol AS id',
                DB::raw("CONCAT(UPPER(clave), ' - ', UPPER(nombre)) AS name")
            )
            ->where('estatus', true)
            ->orderBy('nombre', 'ASC')
            ->get();
    }
    public function catRolEdit($id)
    {
        return DB::table('administration.cat_modulo_rol')
            ->join('administration.rel_rol_usuario', 'administration.cat_modulo_rol.id_cat_modulo_rol', '=', 'administration.rel_rol_usuario.id_cat_modulo_rol')
            ->where('administration.rel_rol_usuario.id', $id)
            ->select(
                DB::raw("administration.cat_modulo_rol.id_cat_modulo_rol AS id"),
                DB::raw("CONCAT(UPPER(administration.cat_modulo_rol.clave), ' - ', UPPER(administration.cat_modulo_rol.nombre)) AS name")
            )
            ->get();
    }
}
