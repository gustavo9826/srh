<?php

namespace App\Http\Controllers\Letter\Letter;

use App\Http\Controllers\Controller;
use App\Models\Letter\Collection\CollectionAreaM;
use App\Models\Letter\Collection\CollectionRelUsuarioM;
use App\Models\Letter\Letter\LetterM;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LetterC extends Controller
{
    public function __invoke()
    {
        return view('letter/letter/list');
    }

    public function save(Request $request)
    {
        $validated = $request->validate([
            'collectionArea' => 'required',
        ]);
        /*
        $messagesC = new MessagesC();
        $userM = new UserM();
        $now = Carbon::now(); // Usando Carbon para la fecha actual
        $checkbox = $request->has('userEsPorNomina'); // Verifica si el checkbox está marcado

        // Validaciones comunes
        $validated = $request->validate([
            'userName' => 'required',
            'userEmail' => 'required|email',
            'userRoles' => 'required|array|min:1',
        ]);*/
    }
    public function create()
    {
        $letterM = new LetterM();
        $collectionAreaM = new CollectionAreaM();
        $item = $letterM->getFillable();
        $selectArea = $collectionAreaM->list();
        $selectAreaEdit = [];
        return view('letter.letter.form', compact('item', 'selectArea', 'selectAreaEdit'));
        /*
        $userM = new UserM();
                $userRoleM = new UserRoleM();
                $roleOptions = collect($userRoleM->catRolList()); // Hacer que los roles sean una colección
                $item = $userM->getFillable();
                $userRoles = []; // Inicializar como arreglo vacío para crear usuario sin roles
                return view('administration.form', compact('item', 'roleOptions', 'userRoles'));
        */
    }

    public function edit(string $id)
    {
        $letterM = new LetterM();
        $collectionAreaM = new CollectionAreaM();

        // Obtener el elemento con el ID pasado
        $item = $letterM->edit($id);

        // Obtener todos los registros del catálogo de áreas
        $selectArea = $collectionAreaM->list();

        // Obtener el registro de área editado
        $selectAreaEdit = $collectionAreaM->edit($item->id_cat_area); // Asegúrate que esto sea un objeto, no una colección

        // Verifica si $selectAreaEdit no es null y si es un objeto
        if ($selectAreaEdit) {
            // Asegurándonos de que selectArea es una colección
            // Usamos filter para eliminar el área seleccionada de la colección
            $selectArea = $selectArea->reject(function ($area) use ($selectAreaEdit) {
                return $area->id == $selectAreaEdit->id; // Aquí filtras correctamente con la propiedad id
            });

            // Ahora agregamos el área seleccionada al principio de la colección
            $selectArea->prepend($selectAreaEdit);
        }

        // Pasar los datos a la vista
        return view('letter.letter.form', compact('item', 'selectArea', 'selectAreaEdit'));
    }

    public function table(Request $request)
    {
        try {
            $collectionRelUsuarioM = new CollectionRelUsuarioM();
            $letterM = new LetterM();

            // Obtener valores de la solicitud
            $iterator = $request->input('iterator'); // OFSET valor de paginador
            $searchValue = $request->input('searchValue'); // Valor de búsqueda
            $roleUserArray = collect(session('SESSION_ROLE_USER'))->toArray(); // Array con roles de usuario
            $ADM_TOTAL = config('custom_config.ADM_TOTAL'); // Acceso completo
            $COR_TOTAL = config('custom_config.COR_TOTAL'); // Acceso completo a correspondencia
            $COR_USUARIO = config('custom_config.COR_USUARIO'); // Acceso por área

            // Verificar si el usuario tiene acceso completo
            if (in_array($ADM_TOTAL, $roleUserArray) || in_array($COR_TOTAL, $roleUserArray)) {
                // Si tiene acceso completo, no hay necesidad de filtrar por área o enlace
                // Procesar la tabla con acceso completo si es necesario
                $value = $letterM->list($iterator, $searchValue, null, null);
            } else {
                // Inicializar las variables
                $idArea = null;
                $idUserEnlace = null;

                // Verificar si el usuario tiene el rol COR_USUARIO
                if (in_array($COR_USUARIO, $roleUserArray)) {
                    // Obtener el área asociada al usuario
                    $idArea = $collectionRelUsuarioM->idAreaByUser(Auth::id())->first();
                }

                // Si no tiene un área asociada, asignamos el id del usuario como enlace
                $idUserEnlace = $idArea ? null : Auth::id();

                // Llamamos al método list() con los parámetros necesarios
                $value = $letterM->list($iterator, $searchValue, $idArea, $idUserEnlace);
            }

            // Responder con los resultados
            return response()->json([
                'value' => $value,
                'status' => true,
            ]);

        } catch (\Exception $e) {
            // Manejo de errores en caso de excepciones
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }









}
