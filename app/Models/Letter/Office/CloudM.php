<?php

namespace App\Models\Letter\Office;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class CloudM extends Model
{
    //Lista los anexos
    public function listAnexos($idOficio, $limit)
    {
        $query = DB::table('correspondencia.ctrl_oficio_anexo')
            ->select(
                'correspondencia.ctrl_oficio_anexo.id_ctrl_oficio_anexo AS id',
                'correspondencia.ctrl_oficio_anexo.uid AS uid',
                'correspondencia.ctrl_oficio_anexo.nombre AS nombre'
            )
            ->where('correspondencia.ctrl_oficio_anexo.estatus', true)
            ->where('correspondencia.ctrl_oficio_anexo.id_tbl_oficio', $idOficio)
            ->orderBy('correspondencia.ctrl_oficio_anexo.nombre', 'asc')
            ->limit($limit)
            ->get();

        return $query;
    }
}
