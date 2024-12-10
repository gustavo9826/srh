<?php

namespace App\Http\Controllers\Letter\Office;
use App\Models\Letter\Office\CloudM;
use App\Models\Letter\Office\OfficeM;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CloudC extends Controller
{
    //La funcion obtiene datos para el ebcabezado de la vista cloud
    public function cloudData(Request $request)
    {
        $id_tbl_oficio = $request->id_tbl_oficio;
        $officeM = new OfficeM();
        $value = $officeM->dataCloud($id_tbl_oficio);
        return response()->json([
            'value' => $value,
            'status' => true,
        ]);
    }

    public function cloudAnexos(Request $request)
    {
        $cloudM = new CloudM();
        $value = $cloudM->listAnexos($request->id_tbl_oficio, 10);
        return response()->json([
            'value' => $value,
            'status' => true,
        ]);
    }

}
