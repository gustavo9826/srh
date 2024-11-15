<?php

namespace App\Http\Controllers\Administration;

use App\Models\Administration\UserM;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class UserC extends Controller
{
    public function __invoke()
    {
        return view('administration/user');
    }

    public function update()
    {
        return view('administration/update');
    }
    public function list(Request $request)
    {
        try {

            $iterator = $request->input('iterator'); //OFSET valor de paginador
            $searchValue = $request->input('searchValue');

            $userM = new UserM();
            $value = $userM->list($iterator, $searchValue);

            return response()->json([ // Lógica para procesar la solicitud+
                'value' => $value,
                'status' => true,
            ]);

        } catch (\Exception $e) { // Manejo de errores  
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}
