<?php

namespace App\Http\Controllers\Administration;

use App\Models\Administration\UserM;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserC extends Controller
{
    public function __invoke()
    {
        return view('administration/user');
    }

    public function create()
    {
        $userM = new UserM();
        $item = $userM->getfillable;
        return view('administration/update', compact('item'));
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

    public function save(Request $request)
    {

        $name = $request->name;

        return "success $name";
    }

    public function edit(string $id)
    {
        $item = User::find($id);
        return view('administration/update', compact('item'));

    }
}
