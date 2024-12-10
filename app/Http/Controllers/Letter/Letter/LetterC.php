<?php

namespace App\Http\Controllers\Letter\Letter;

use App\Models\Letter\Collection\CollectionClaveM;
use App\Models\Letter\Collection\CollectionTramiteM;
use App\Models\Letter\Collection\CollectionCoordinacionM;
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
use App\Http\Controllers\Admin\MessagesC;
use Carbon\Carbon;

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
        $item->num_turno_sistema = $collectionConsecutivoM->noDocumento($item->id_cat_anio, config('custom_config.CP_TABLE_CORRESPONDENCIA'));

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
        $collectionCoordinacionM = new CollectionCoordinacionM();
        $collectionTramiteM = new CollectionTramiteM();
        $collectionRemitenteM = new CollectionRemitenteM();
        $collectionClaveM = new CollectionClaveM();

        $item = $letterM->edit($id); // Obtener el elemento con el ID pasado

        $selectArea = $collectionAreaM->list();// Obtener todos los registros del catálogo de áreas
        $selectAreaEdit = isset($item->id_cat_area) ? $collectionAreaM->edit($item->id_cat_area) : []; //Validacion de id_en DB para definir si se poblan los catalogos o son vacios

        $selectUser = isset($item->id_cat_area) ? $collectionRelUsuarioM->idUsuarioByArea($item->id_cat_area) : [];//Validacion de id_en DB para definir si se poblan los catalogos o son vacios
        $selectUserEdit = isset($item->id_cat_area) && isset($item->id_usuario_area) ? $collectionRelUsuarioM->idUsuarioByAreaEdit($item->id_usuario_area) : [];//Validacion de id_en DB para definir si se poblan los catalogos o son vacios

        $selectEnlace = isset($item->id_cat_area) ? $collectionRelEnlaceM->idUsuarioByArea($item->id_cat_area) : [];//Validacion de id_en DB para definir si se poblan los catalogos o son vaciosvacios
        $selectEnlaceEdit = isset($item->id_cat_area) && isset($item->id_usuario_enlace) ? $collectionRelUsuarioM->idUsuarioByAreaEdit($item->id_usuario_enlace) : [];////Validacion de id_en DB para definir si se poblan los catalogos o son vaciosvacios

        $selectUnidad = $collectionUnidadM->list();//Catalogo de unidad
        $selectUnidadEdit = isset($item->id_cat_unidad) ? $collectionUnidadM->edit($item->id_cat_unidad) : [];

        $selectCoordinacion = isset($item->id_cat_unidad) ? $collectionCoordinacionM->list($item->id_cat_unidad) : []; //Catalogos de coordinacion vacios
        $selectCoordinacionEdit = isset($item->id_cat_unidad) && isset($item->id_cat_coordinacion) ? $collectionCoordinacionM->edit($item->id_cat_coordinacion) : [];//Catalogos de coordinacion vacios

        $selectStatus = $collectionStatusM->list(); //Obtenemos el catalogo de estatus
        $selectStatusEdit = isset($item->id_cat_estatus) ? $collectionStatusM->edit($item->id_cat_estatus) : [];//Catalogos debe estar vacio

        $selectTramite = isset($item->id_cat_area) ? $collectionTramiteM->list($item->id_cat_area) : [];
        $selectTramiteEdit = isset($item->id_cat_area) && isset($item->id_cat_tramite) ? $collectionTramiteM->edit($item->id_cat_tramite) : [];

        $selectClave = isset($item->id_cat_area) && isset($item->id_cat_tramite) ? $collectionClaveM->list($item->id_cat_tramite) : [];
        $selectClaveEdit = isset($item->id_cat_area) && isset($item->id_cat_tramite) && isset($item->id_cat_clave) ? $collectionClaveM->edit($item->id_cat_clave) : [];

        $selectRemitente = $collectionRemitenteM->list();
        $selectRemitenteEdit = isset($item->id_cat_remitente) ? $collectionRemitenteM->edit($item->id_cat_remitente) : [];

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
        $letterM = new LetterM();
        $messagesC = new MessagesC();
        $collectionConsecutivoM = new CollectionConsecutivoM();
        //USER_ROLE
        $roleUserArray = collect(session('SESSION_ROLE_USER'))->toArray(); // Array con roles de usuario
        $ADM_TOTAL = config('custom_config.ADM_TOTAL'); // Acceso completo
        $COR_TOTAL = config('custom_config.COR_TOTAL'); // Acceso completo a correspondencia
        $COR_USUARIO = config('custom_config.COR_USUARIO'); // Acceso por área
        $checkbox = $request->has('rfc_remitente_bool') == 1 ? 1 : 0; //Se condiciona el valor del check
        //Autorizacion solo administracion

        $now = Carbon::now(); //Hora y fecha actual

        if (!isset($request->id_tbl_correspondencia)) { // || empty($request->id_tbl_correspondencia)) { // Creación de nuevo nuevo elemento


            $request->validate([
                'num_documento' => 'required|max:45',
                'fecha_inicio' => 'required',
                'num_flojas' => 'required|numeric|min:1',
                'num_tomos' => 'required|numeric|min:1',
                'lugar' => 'required|max:50',
                'asunto' => 'required|max:50',
                'observaciones' => 'max:50',
                'id_cat_area' => 'required',
                'id_usuario_area' => 'required',
                'id_usuario_enlace' => 'required',
                'id_cat_unidad' => 'required',
                'id_cat_coordinacion' => 'required',
                'id_cat_estatus' => 'required',
                'id_cat_tramite' => 'required',
                'id_cat_clave' => 'required',
                'id_cat_remitente' => $checkbox != 1 ? 'required' : 'nullable',
                'rfc_remitente_aux' => $checkbox == 1 ? 'required' : 'nullable',
            ]);

            //Validacion de documento unico
            if ($letterM->validateNoDocument($request->id_tbl_correspondencia, $request->num_documento)) {
                return $messagesC->messageErrorBack('El número de documento ya está registrado.');
            }

            //Validacion de fecha, de inicio y fin
            if ($request->fecha_inicio >= $request->fecha_fin) {
                return $messagesC->messageErrorBack('La fecha de inicio no puede ser anterior a la fecha de finalización.');
            }

            //Agregar elementos
            $letterM::create([
                'num_turno_sistema' => $request->num_turno_sistema,
                'num_documento' => $request->num_documento,
                'fecha_captura' => $request->fecha_captura,
                'fecha_inicio' => $request->fecha_inicio,
                'fecha_fin' => $request->fecha_fin,
                'num_flojas' => $request->num_flojas,
                'num_tomos' => $request->num_tomos,
                'num_copias' => $request->num_copias,
                'lugar' => $request->lugar,
                'asunto' => $request->asunto,
                'observaciones' => $request->observaciones,
                'rfc_remitente_aux' => $request->rfc_remitente_aux,
                'rfc_remitente_bool' => $checkbox,
                'id_cat_area' => $request->id_cat_area,
                'id_usuario_area' => $request->id_usuario_area,
                'id_usuario_enlace' => $request->id_usuario_enlace,
                'id_cat_estatus' => $request->id_cat_estatus,
                'id_cat_remitente' => $request->id_cat_remitente,
                'id_cat_anio' => $request->id_cat_anio,
                'id_cat_tramite' => $request->id_cat_tramite,
                'id_cat_clave' => $request->id_cat_clave,
                'id_cat_unidad' => $request->id_cat_unidad,
                'id_cat_coordinacion' => $request->id_cat_coordinacion,

                //DATA_SYSTEM
                'id_usuario_sistema' => Auth::user()->id,
                'fecha_usuario' => $now,
            ]);

            $collectionConsecutivoM->iteratorConsecutivo($request->id_cat_anio, config('custom_config.CP_TABLE_CORRESPONDENCIA'));

            return $messagesC->messageSuccessRedirect('letter.list', 'Elemento agregado con éxito.');

        } else { //modificar elemento 

            if (in_array($ADM_TOTAL, $roleUserArray) || in_array($COR_TOTAL, $roleUserArray)) {
                $request->validate([
                    'num_documento' => 'required|max:45',
                    'fecha_inicio' => 'required',
                    'num_flojas' => 'required|numeric|min:1',
                    'num_tomos' => 'required|numeric|min:1',
                    'lugar' => 'required|max:50',
                    'asunto' => 'required|max:50',
                    'observaciones' => 'max:50',
                    'id_cat_area' => 'required',
                    'id_usuario_area' => 'required',
                    'id_usuario_enlace' => 'required',
                    'id_cat_unidad' => 'required',
                    'id_cat_coordinacion' => 'required',
                    'id_cat_estatus' => 'required',
                    'id_cat_tramite' => 'required',
                    'id_cat_clave' => 'required',
                    'id_cat_remitente' => $checkbox != 1 ? 'required' : 'nullable',
                    'rfc_remitente_aux' => $checkbox == 1 ? 'required' : 'nullable',
                ]);

                //Validacion de documento unico
                if ($letterM->validateNoDocument($request->id_tbl_correspondencia, $request->num_documento)) {
                    return $messagesC->messageErrorBack('El número de documento ya está registrado.');
                }

                //Validacion de fecha, de inicio y fin
                if ($request->fecha_inicio >= $request->fecha_fin) {
                    return $messagesC->messageErrorBack('La fecha de inicio no puede ser anterior a la fecha de finalización.');
                }

                $letterM::where('id_tbl_correspondencia', $request->id_tbl_correspondencia)
                    ->update([
                        'num_documento' => $request->num_documento,
                        'fecha_inicio' => $request->fecha_inicio,
                        'fecha_fin' => $request->fecha_fin,
                        'num_flojas' => $request->num_flojas,
                        'num_tomos' => $request->num_tomos,
                        'num_copias' => $request->num_copias,
                        'lugar' => $request->lugar,
                        'asunto' => $request->asunto,
                        'observaciones' => $request->observaciones,
                        'rfc_remitente_aux' => $request->rfc_remitente_aux,
                        'rfc_remitente_bool' => $checkbox,
                        'id_cat_area' => $request->id_cat_area,
                        'id_usuario_area' => $request->id_usuario_area,
                        'id_usuario_enlace' => $request->id_usuario_enlace,
                        'id_cat_estatus' => $request->id_cat_estatus,
                        'id_cat_remitente' => $request->id_cat_remitente,
                        'id_cat_anio' => $request->id_cat_anio,
                        'id_cat_tramite' => $request->id_cat_tramite,
                        'id_cat_clave' => $request->id_cat_clave,
                        'id_cat_unidad' => $request->id_cat_unidad,
                        'id_cat_coordinacion' => $request->id_cat_coordinacion,

                        'id_usuario_sistema' => Auth::user()->id,
                        'fecha_usuario' => $now,
                    ]);

                return $messagesC->messageSuccessRedirect('letter.list', 'Elemento modificado con éxito.');
            } else {
                $request->validate([
                    'observaciones' => 'required|max:50',
                    'id_cat_estatus' => 'required',
                ]);

                $letterM::where('id_tbl_correspondencia', $request->id_tbl_correspondencia)
                    ->update([
                        'observaciones' => $request->observaciones,
                        'id_cat_estatus' => $request->id_cat_estatus,
                        'id_usuario_sistema' => Auth::user()->id,
                        'fecha_usuario' => $now,
                    ]);

                return $messagesC->messageSuccessRedirect('letter.list', 'Elemento modificado con éxito.');
            }

        }
    }

    //LA funcion elimina el elemento
    public function delete($id)
    {
        $letterM = new LetterM();
        $messagesC = new MessagesC();
        letterM::destroy($id);
        return $messagesC->messageSuccessRedirect('letter.list', 'Elemento eliminado con éxito.');
    }
}
