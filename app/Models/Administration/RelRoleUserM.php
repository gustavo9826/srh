<?php

namespace App\Models\Administration;

use Illuminate\Database\Eloquent\Model;

//Clase que hace funcion a la tabla administration.rel_rol_usuario
class RelRoleUserM extends Model
{
    protected $table = 'administration.rel_rol_usuario';
    public $timestamps = false;
    protected $fillable = [
        'id_rel_rol_usuario',
        'id',
        'id_cat_modulo_rol',
    ];
}
