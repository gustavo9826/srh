<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Admin\MessagesC;
use App\Models\Administration\RelRoleUserM;
use App\Models\Administration\UserM;
use App\Http\Controllers\Controller;
use App\Models\Administration\UserRoleM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserC extends Controller
{
    public function __invoke()
    {
        return view('administration/user');
    }

    public function create()
    {
        $userM = new UserM();
        $userRoleM = new UserRoleM();
        $roleOptions = collect($userRoleM->catRolList()); // Hacer que los roles sean una colección
        $item = $userM->getFillable();
        $userRoles = []; // Inicializar como arreglo vacío para crear usuario sin roles
        return view('administration.form', compact('item', 'roleOptions', 'userRoles'));
    }

    public function edit(string $id)
    {
        $userM = new UserM();
        $userRoleM = new UserRoleM();
        $item = $userM->edit($id);
        $roleOptions = $userRoleM->catRolList();
        $userRoles = $userRoleM->catRolEdit($id);
        return view('administration.form', compact('item', 'roleOptions', 'userRoles'));
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
        $messagesC = new MessagesC();
        $userM = new UserM();
        $now = 'NOW()'; //Variable de timestamp
        $checkbox = isset($request->userEsPorNomina) ? true : false; //Si el chacbox esta marcado sera true, de lo contrario false

        if (!isset($request->userId)) {// Si estamos creando un nuevo usuario (no existe userId)
            $request->validate([//Validacion de campos, tipos de daros y max/min de caracteres
                'userName' => 'required',
                'userEmail' => 'required|email',
                'userRoles' => 'required|array|min:1',
                'userPassword' => 'required',
                'userConfirmPassword' => 'required',
            ]);

            if ($request->userPassword !== $request->userConfirmPassword) {// Validación de contraseñas
                return $messagesC->messageErrorBack('Las contraseñas no coinciden');
            }

            if (!$userM->validateEmail($request->userEmail)) {// Validación de correo (verificar si ya existe)
                return $messagesC->messageErrorBack('Ya existe una cuenta asociada a este correo electrónico.');
            }

            $userM::create([ //Agregar datos de usuario a la DB
                'name' => $request->userName,
                'email' => $request->userEmail,
                'password' => Hash::make($request->userPassword), //crypto
                'es_por_nomina' => $checkbox,
                'estatus' => true, //burron active
                'id_usuario' => Auth::user()->id,
                'fecha_usuario' => $now,
            ]);

            $userId = UserM::where('email', $request->userEmail)->pluck('id')->first(); //Obtener el id de usuario partiendo de su correo para la inserccion de los roles

            foreach ($request->userRoles as $key => $idModRole) {
                RelRoleUserM::create([
                    'id' => $userId, //Id de usuario para la seleccion de roles
                    'id_cat_modulo_rol' => $idModRole, //Id de role seleccionado
                ]);
            }

            return $messagesC->messageSuccessRedirect('user.list', 'Usuario añadido exitosamente.'); //Retornar el estatus con una variable
        } else {
            $request->validate([//Validacion de campos, tipos de daros y max/min de caracteres
                'userName' => 'required',
                'userEmail' => 'required|email',
                'userRoles' => 'required|array|min:1',
            ]);
        }

        // Si estamos editando un usuario, no se necesitan las validaciones de contraseña
        //return 'Edición exitosa'; // Aquí podrías hacer algo más, según lo que necesites al editar.
    }
}
