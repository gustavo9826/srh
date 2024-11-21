<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Admin\MessagesC;
use App\Models\Administration\CatalogM;
use App\Models\Administration\UserM;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $userM = new UserM();

        // Validación común para creación y edición
        $validated = $request->validate([
            'userName' => 'required',
            'userEmail' => 'required',
            'userRoles' => 'required|array|min:1',
        ]);

        // Si estamos creando un nuevo usuario (no existe userId)
        if (!isset($request->userId)) {

            /*
            // Validaciones adicionales para creación (contraseña)
            $request->validate([
                'userPassword' => 'required',
                'userConfirmPassword' => 'required',
            ]);

            // Validación de contraseñas
            if ($request->userPassword !== $request->userConfirmPassword) {
                return $messagecC->messageErrorBack('Las contraseñas no coinciden');
            }

            // Validación de correo (verificar si ya existe)
            if (!$userM->validateEmail($request->userEmail)) {
                return $messagecC->messageErrorBack('Ya existe una cuenta asociada a este correo electrónico.');
            }

            // Si todo es correcto, concatenar los roles y retornar el mensaje adecuado
            /*
            $rolesString = implode(',', $request->userRoles);
            return $rolesString . ' ' . Auth::user()->id;
*/
            foreach ($request->userRoles as $key => $value) {
                echo "Clave: $key, Valor: ";
                print_r($value);  // Imprime el contenido del valor
                echo "<br>";
            }
        }

        // Si estamos editando un usuario, no se necesitan las validaciones de contraseña
        return 'Edición exitosa'; // Aquí podrías hacer algo más, según lo que necesites al editar.
    }

    public function edit(string $id)
    {
        $userM = new UserM();
        $item = $userM->edit($id);
        return view('administration.form', compact('item'));
    }


}
