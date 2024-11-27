<?php

namespace App\Models\Letter\Letter;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class LetterM extends Model
{
    protected $table = 'correspondencia.tbl_correspondencia';
    public $timestamps = false;
    protected $fillable = [
        'id_tbl_correspondencia',
        'num_turno_sistema',
        'num_documento',
        'fecha_captura',
        'fecha_inicio',
        'fecha_fin',
        'num_flojas',
        'num_tomos',
        'num_copias',
        'lugar',
        'asunto',
        'observaciones',
        'rfc_remitente_aux',
        'rfc_remitente_bool',
        'fecha_usuario',
        'id_cat_area',
        'id_usuario_area',
        'id_usuario_enlace',
        'id_cat_estatus',
        'id_cat_remitente',
        'id_cat_anio',
        'id_cat_tramite',
        'id_cat_clave',
        'id_cat_unidad',
        'id_cat_coordinacion',
        'id_usuario_sistema',
    ];

    public function edit(string $id)
    {
        // Realizamos la consulta utilizando el Query Builder de Laravel
        $query = DB::table('correspondencia.tbl_correspondencia')
            ->where('id_tbl_correspondencia', $id)
            ->first(); // Usamos first() para obtener un único registro

        // Retornamos el usuario o null si no se encuentra
        return $query ?? null;
    }
    public function list($iterator, $searchValue, $idArea, $idEnlace)
    {
        // Preparar la consulta base
        $query = DB::table('correspondencia.tbl_correspondencia')
            ->select([
                'correspondencia.tbl_correspondencia.id_tbl_correspondencia AS id',
                DB::raw('UPPER(correspondencia.tbl_correspondencia.num_turno_sistema) AS num_turno_sistema'),
                DB::raw('UPPER(correspondencia.tbl_correspondencia.num_documento) AS num_documento'),
                DB::raw('UPPER(correspondencia.cat_estatus.descripcion) AS estatus'),
                DB::raw('UPPER(correspondencia.cat_tramite.descripcion) AS tramite'),
                DB::raw('UPPER(correspondencia.cat_area.descripcion) AS area'),
                DB::raw("TO_CHAR(correspondencia.tbl_correspondencia.fecha_inicio::date, 'DD/MM/YYYY') AS fecha_inicio"),
                DB::raw("TO_CHAR(correspondencia.tbl_correspondencia.fecha_fin::date, 'DD/MM/YYYY') AS fecha_fin")
            ])
            ->join('correspondencia.cat_estatus', 'correspondencia.tbl_correspondencia.id_cat_estatus', '=', 'correspondencia.cat_estatus.id_cat_estatus')
            ->join('correspondencia.cat_area', 'correspondencia.tbl_correspondencia.id_cat_area', '=', 'correspondencia.cat_area.id_cat_area')
            ->join('correspondencia.cat_tramite', 'correspondencia.tbl_correspondencia.id_cat_tramite', '=', 'correspondencia.cat_tramite.id_cat_tramite');

        // Filtrar por área si se proporciona el id
        if (!empty($idArea)) {
            $query->where('correspondencia.tbl_correspondencia.id_cat_area', $idArea);
        }

        // Filtrar por enlace si se proporciona el id
        if (!empty($idEnlace)) {
            $query->where('correspondencia.tbl_correspondencia.id_usuario_enlace', $idEnlace);
        }

        // Si se proporciona un valor de búsqueda, agregar condiciones de búsqueda
        if (!empty($searchValue)) {
            $searchValue = strtoupper(trim($searchValue));  // Limpiar y convertir a mayúsculas

            // Condiciones de búsqueda centralizadas en una sola cláusula
            $query->where(function ($query) use ($searchValue) {
                $query->whereRaw("UPPER(TRIM(correspondencia.tbl_correspondencia.num_turno_sistema)) LIKE ?", ['%' . $searchValue . '%'])
                    ->orWhereRaw("UPPER(TRIM(correspondencia.tbl_correspondencia.num_documento)) LIKE ?", ['%' . $searchValue . '%'])
                    ->orWhereRaw("UPPER(TRIM(correspondencia.cat_estatus.descripcion)) LIKE ?", ['%' . $searchValue . '%'])
                    ->orWhereRaw("UPPER(TRIM(correspondencia.cat_tramite.descripcion)) LIKE ?", ['%' . $searchValue . '%'])
                    ->orWhereRaw("UPPER(TRIM(correspondencia.cat_area.descripcion)) LIKE ?", ['%' . $searchValue . '%'])
                    ->orWhereRaw("UPPER(TRIM(TO_CHAR(correspondencia.tbl_correspondencia.fecha_inicio, 'DD/MM/YYYY'))) LIKE ?", ['%' . $searchValue . '%'])
                    ->orWhereRaw("UPPER(TRIM(TO_CHAR(correspondencia.tbl_correspondencia.fecha_fin, 'DD/MM/YYYY'))) LIKE ?", ['%' . $searchValue . '%']);
            });
        }

        // Aplicar la paginación (OFFSET y LIMIT)
        $query->orderBy('correspondencia.tbl_correspondencia.id_tbl_correspondencia', 'ASC')
            ->offset($iterator) // OFFSET
            ->limit(5); // LIMIT

        // Ejecutar la consulta y retornar los resultados
        return $query->get();
    }
}
