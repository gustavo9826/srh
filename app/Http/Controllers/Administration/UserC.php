<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Admin\MessagesC;
use App\Models\Administration\CatalogM;
use App\Models\Administration\UserM;
use App\Http\Controllers\Controller;
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
        $catalogM = new CatalogM();
        $roleOptions = $catalogM->catRolList();
        $item = $userM->getFillable();
        return view('administration/form', compact('item', 'roleOptions'));
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
        $messagecC = new MessagesC();
        $validateC = new ValidateC();
        if (!isset($request->userId)) { //add

            $request->validate([
                'userName' => 'required',
                'userEmail' => 'required',
                'userPassword' => 'required',
                'userConfirmPassword' => 'required',
                'userRoles' => 'required|array|min:1',
            ]);

            if ($validateC->validatePassword($request->userPassword, $request->userConfirmPassword)) {
                return "contraseñas correctas";
            } else {
                return $messagecC->messageErrorBack('Las contraseñas no coinciden');
            }

        } else { //adit
            $request->validate([
                'userName' => 'required',
                'userEmail' => 'required',
                'userRoles' => 'required|array|min:1',
            ]);
        }
    }

    public function edit(string $id)
    {
        $userM = new UserM();
        $item = $userM->edit($id);
        return view('administration.form', compact('item'));
    }
}
