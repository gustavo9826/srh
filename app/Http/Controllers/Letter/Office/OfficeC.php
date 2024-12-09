<?php

namespace App\Http\Controllers\Letter\Office;
use App\Models\Letter\Letter\LetterM;
use App\Models\Letter\Office\OfficeM;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Letter\Collection\CollectionDateM;
use App\Models\Letter\Collection\CollectionConsecutivoM;
use App\Models\Letter\Collection\CollectionAreaM;
use App\Models\Letter\Collection\CollectionRemitenteM;
class OfficeC extends Controller
{
    //La funcion retorna la vista principal de la tabla
    public function list()
    {
        return view('letter/office/list');
    }

    //La funcion crea ta tabla dependiedp de los roles que se han ingreado
    public function table(Request $request)
    {
        try {
            $officeM = new OfficeM();
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
                $value = $officeM->list($iterator, $searchValue, null);
            } else {
                // Llamamos al método list() con los parámetros necesarios
                $value = $officeM->list($iterator, $searchValue, Auth::id());
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

    public function create()
    {
        $item = new LetterM();
        $collectionDateM = new CollectionDateM();
        $collectionConsecutivoM = new CollectionConsecutivoM();
        $collectionAreaM = new CollectionAreaM();
        $collectionRemitenteM = new CollectionRemitenteM();

        $item->fecha_captura = now()->format('d/m/Y'); // Formato de fecha: día/mes/año
        $item->id_cat_anio = $collectionDateM->idYear();
        $item->num_turno_sistema = $collectionConsecutivoM->noDocumento($item->id_cat_anio, config('custom_config.CP_TABLE_OFICIO'));

        $selectArea = $collectionAreaM->list(); //Catalogo de area
        $selectAreaEdit = []; //catalogo de area null

        $selectUser = []; //Catalogo de Area - usuario, al crear comienza en vacio 
        $selectUserEdit = []; //Catalogo de Area - usuario, al crear comienza en vacio 

        $selectEnlace = []; //Catalogo de Area - enlace, al crear comienza en vacio 
        $selectEnlaceEdit = []; //Catalogo de Area - enlace, al crear comienza en vacio 

        $selectRemitente = $collectionRemitenteM->list(); //Se carga el catalogo de remitente
        $selectRemitenteEdit = []; //LA funcion de editar se inicia en falso

        return view('letter/office/form', compact('selectRemitenteEdit','selectRemitente','selectEnlaceEdit', 'selectEnlace', 'selectUserEdit', 'selectUser', 'selectAreaEdit', 'selectArea', 'item'));
    }
}
