<?php

namespace App\Http\Controllers\Letter\Letter;

use App\Models\Letter\Collection\CollectionDateM;
use App\Models\Letter\Collection\CollectionStatusM;
use App\Models\Letter\Collection\CollectionUnidadM;
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
        $item = new LetterM();
        $collectionAreaM = new CollectionAreaM();
        $collectionUnidadM = new CollectionUnidadM();
        $collectionStatusM = new CollectionStatusM();
        $collectionDateM = new CollectionDateM();

        $item->fecha_captura = now()->format('d/m/Y'); // Formato de fecha: día/mes/año
        $item->id_cat_anio = $collectionDateM->idYear();

        $selectArea = $collectionAreaM->list(); //Catalogo de area
        $selectAreaEdit = []; //catalogo de area null

        $selectUser = []; //Catalogo de Area - usuario, al crear comienza en vacio 
        $selectUserEdit = []; //Catalogo de Area - usuario, al crear comienza en vacio 

        $selectEnlace = []; //Catalogo de Area - enlace, al crear comienza en vacio 
        $selectEnlaceEdit = []; //Catalogo de Area - enlace, al crear comienza en vacio 

        $selectUnidad = $collectionUnidadM->list();//Catalogo de unidad
        $selectUnidadEdit = []; //Catalogo de Unidad, al crear comienza en vacio 

        $selectCoordinacion = []; //Catalogos de coordinacion vacios
        $selectCoordinacionEdit = [];//Catalogos de coordinacion vacios

        $selectStatus = $collectionStatusM->list(); //Obtenemos el catalogo de estatus
        $selectStatusEdit = [];//Catalogos debe estar vacio

        $selectTramite = []; //Los catalogos incian vacios
        $selectTramiteEdit = []; //Los catalogos incian vacios

        $selectClave = []; //Los catalogos inician en vacio
        $selectClaveEdit = []; // Los catalogos inician en vaio

        return view('letter.letter.form', compact('selectClaveEdit', 'selectClave', 'selectTramite', 'selectTramiteEdit', 'selectStatusEdit', 'selectStatus', 'selectCoordinacionEdit', 'selectCoordinacion', 'selectUnidadEdit', 'selectUnidad', 'item', 'selectArea', 'selectAreaEdit', 'selectUser', 'selectUserEdit', 'selectEnlace', 'selectEnlaceEdit'));
    }

    public function edit(string $id)
    {
        $letterM = new LetterM();
        $collectionAreaM = new CollectionAreaM();
        $item = $letterM->edit($id); // Obtener el elemento con el ID pasado

        $selectArea = $collectionAreaM->list();// Obtener todos los registros del catálogo de áreas

        $selectAreaEdit = isset($item->id_cat_area) ? $collectionAreaM->edit($item->id_cat_area) : [];

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
