<?php

namespace App\Http\Controllers\Letter\Letter;

use App\Models\Letter\Collection\CollectionConsecutivoM;
use App\Models\Letter\Collection\CollectionDateM;
use App\Models\Letter\Collection\CollectionRelEnlaceM;
use App\Models\Letter\Collection\CollectionRemitenteM;
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

    public function create()
    {
        $item = new LetterM();
        $collectionAreaM = new CollectionAreaM();
        $collectionUnidadM = new CollectionUnidadM();
        $collectionStatusM = new CollectionStatusM();
        $collectionDateM = new CollectionDateM();
        $collectionConsecutivoM = new CollectionConsecutivoM();
        $collectionRemitenteM = new CollectionRemitenteM();

        $item->fecha_captura = now()->format('d/m/Y'); // Formato de fecha: día/mes/año
        $item->id_cat_anio = $collectionDateM->idYear();
        $item->num_turno_sistema = $collectionConsecutivoM->noDocumento(1, 1);

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

        $selectRemitente = $collectionRemitenteM->list(); //Se carga el catalogo de remitente
        $selectRemitenteEdit = []; //LA funcion de editar se inicia en falso

        return view('letter.letter.form', compact('selectRemitenteEdit', 'selectRemitente', 'selectClaveEdit', 'selectClave', 'selectTramite', 'selectTramiteEdit', 'selectStatusEdit', 'selectStatus', 'selectCoordinacionEdit', 'selectCoordinacion', 'selectUnidadEdit', 'selectUnidad', 'item', 'selectArea', 'selectAreaEdit', 'selectUser', 'selectUserEdit', 'selectEnlace', 'selectEnlaceEdit'));
    }

    public function edit(string $id)
    {
        $letterM = new LetterM();
        $collectionAreaM = new CollectionAreaM();
        $collectionRelUsuarioM = new CollectionRelUsuarioM();
        $collectionRelEnlaceM = new CollectionRelEnlaceM();

        $collectionUnidadM = new CollectionUnidadM();
        $collectionStatusM = new CollectionStatusM();
        $collectionDateM = new CollectionDateM();
        $collectionRemitenteM = new CollectionRemitenteM();

        $item = $letterM->edit($id); // Obtener el elemento con el ID pasado

        $selectArea = $collectionAreaM->list();// Obtener todos los registros del catálogo de áreas
        $selectAreaEdit = isset($item->id_cat_area) ? $collectionAreaM->edit($item->id_cat_area) : []; //Validacion de id_en DB para definir si se poblan los catalogos o son vacios

        $selectUser = isset($item->id_cat_area) ? $collectionRelUsuarioM->idUsuarioByArea($item->id_cat_area) : [];//Validacion de id_en DB para definir si se poblan los catalogos o son vacios
        $selectUserEdit = isset($item->id_cat_area) && isset($item->id_usuario_area) ? $collectionRelUsuarioM->idUsuarioByAreaEdit($item->id_usuario_area) : [];//Validacion de id_en DB para definir si se poblan los catalogos o son vacios

        $selectEnlace = isset($item->id_cat_area) ? $collectionRelEnlaceM->idUsuarioByArea($item->id_cat_area) : [];//Validacion de id_en DB para definir si se poblan los catalogos o son vacios
        $selectEnlaceEdit =  $collectionRelUsuarioM->idUsuarioByAreaEdit($item->id_usuario_enlace);//Validacion de id_en DB para definir si se poblan los catalogos o son vacios;//$collectionRelEnlaceM->idUsuarioByAreaEdit($item->id_usuario_enlace);//isset($item->id_cat_area) && isset($item->id_usuario_enlace) ? $collectionRelEnlaceM->idUsuarioByAreaEdit($item->id_usuario_enlace) : [];//Validacion de id_en DB para definir si se poblan los catalogos o son vacios

        $selectUnidad = [];//Catalogo de unidad
        $selectUnidadEdit = []; //Catalogo de Unidad, al crear comienza en vacio 

        $selectCoordinacion = []; //Catalogos de coordinacion vacios
        $selectCoordinacionEdit = [];//Catalogos de coordinacion vacios

        $selectStatus = []; //Obtenemos el catalogo de estatus
        $selectStatusEdit = [];//Catalogos debe estar vacio

        $selectTramite = []; //Los catalogos incian vacios
        $selectTramiteEdit = []; //Los catalogos incian vacios

        $selectClave = []; //Los catalogos inician en vacio
        $selectClaveEdit = []; // Los catalogos inician en vaio

        $selectRemitente = []; //Se carga el catalogo de remitente
        $selectRemitenteEdit = []; //LA funcion de editar se inicia en falso

        return view('letter.letter.form', compact('selectRemitenteEdit', 'selectRemitente', 'selectClaveEdit', 'selectClave', 'selectTramite', 'selectTramiteEdit', 'selectStatusEdit', 'selectStatus', 'selectCoordinacionEdit', 'selectCoordinacion', 'selectUnidadEdit', 'selectUnidad', 'item', 'selectArea', 'selectAreaEdit', 'selectUser', 'selectUserEdit', 'selectEnlace', 'selectEnlaceEdit'));
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

    public function save(Request $request)
    {
        if (!isset($request->id_tbl_correspondencia)) { // Creación de nuevo nuevo elemento

            $checkbox = $request->has('rfc_remitente_bool') == 1 ? true : false; //Se condiciona el valor del check


            $request->validate([
                'num_documento' => 'required',
                'fecha_inicio' => 'required',
                'num_flojas' => 'required',
                'num_tomos' => 'required',
                'lugar' => 'required',
                'asunto' => 'required',
                'id_cat_area' => 'required',
                'id_usuario_area' => 'required',
                'id_usuario_enlace' => 'required',
                'id_cat_unidad' => 'required',
                'id_cat_coordinacion' => 'required',
                'id_cat_estatus' => 'required',
                'id_cat_tramite' => 'required',
                'id_cat_clave' => 'required',
            ]);

            if ($checkbox) { //Validar check input de remitente
                $request->validate(['rfc_remitente_aux' => 'required',]);
            } else {//Validar select
                $request->validate(['id_cat_remitente' => 'required',]);
            }


        } else { //modificar elemento 

        }
    }
}
