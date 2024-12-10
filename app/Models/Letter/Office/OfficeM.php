<?php

namespace App\Models\Letter\Office;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class OfficeM extends Model
{
    protected $table = 'correspondencia.tbl_oficio';
    public $timestamps = false;
    protected $primaryKey = 'id_tbl_oficio';
    protected $fillable = [
        'num_turno_sistema',
        'fecha_inicio',
        'fecha_fin',
        'fecha_captura',
        'asunto',
        'observaciones',
        'fecha_usuario',
        'rfc_remitente_aux_nombre',
        'rfc_remitente_bool',
        'id_usuario_sistema',
        'id_cat_area',
        'id_usuario_area',
        'id_usuario_enlace',
        'id_cat_anio',
        'id_cat_remitente',
        'id_tbl_correspondencia',
    ];

    public function edit(string $id)
    {
        // Realizamos la consulta utilizando el Query Builder de Laravel
        $query = DB::table('correspondencia.tbl_oficio')
            ->where('id_tbl_oficio', $id)
            ->first(); // Usamos first() para obtener un único registro

        // Retornamos el usuario o null si no se encuentra
        return $query ?? null;
    }

    //La funcion crea la tabla tanto para busquedas como para modelado
    public function list($iterator, $searchValue, $idUser)
    {
        // Preparar la consulta base
        $query = DB::table('correspondencia.tbl_oficio')
            ->select([
                'correspondencia.tbl_oficio.id_tbl_oficio AS id',
                DB::raw('correspondencia.tbl_oficio.num_turno_sistema AS num_turno_sistema'),
                DB::raw('correspondencia.tbl_correspondencia.num_turno_sistema AS num_documento'),
                DB::raw('correspondencia.cat_area.descripcion AS area'),
                DB::raw("TO_CHAR(correspondencia.tbl_oficio.fecha_inicio::date, 'DD/MM/YYYY') AS fecha_inicio"),
                DB::raw("TO_CHAR(correspondencia.tbl_oficio.fecha_fin::date, 'DD/MM/YYYY') AS fecha_fin"),
                DB::raw("correspondencia.cat_anio.descripcion AS anio"),
            ])
            ->join('correspondencia.tbl_correspondencia', 'correspondencia.tbl_oficio.id_tbl_correspondencia', '=', 'correspondencia.tbl_correspondencia.id_tbl_correspondencia')
            ->join('correspondencia.cat_area', 'correspondencia.tbl_oficio.id_cat_area', '=', 'correspondencia.cat_area.id_cat_area')
            ->join('correspondencia.cat_anio', 'correspondencia.tbl_oficio.id_cat_anio', '=', 'correspondencia.cat_anio.id_cat_anio');

        // Filtrar por usuario si se proporciona el id
        if (!empty($idUser)) {
            $query->where('correspondencia.tbl_oficio.id_usuario_area', $idUser)
                ->orWhere('correspondencia.tbl_oficio.id_usuario_enlace', $idUser);
        }

        // Si se proporciona un valor de búsqueda, agregar condiciones de búsqueda
        if (!empty($searchValue)) {
            $searchValue = strtoupper(trim($searchValue));  // Limpiar y convertir a mayúsculas

            // Condiciones de búsqueda centralizadas en una sola cláusula
            $query->where(function ($query) use ($searchValue) {
                $query->whereRaw("UPPER(TRIM(correspondencia.tbl_oficio.num_turno_sistema)) LIKE ?", ['%' . $searchValue . '%'])
                    ->orWhereRaw("UPPER(TRIM(correspondencia.tbl_correspondencia.num_turno_sistema)) LIKE ?", ['%' . $searchValue . '%'])
                    ->orWhereRaw("UPPER(TRIM(correspondencia.cat_area.descripcion)) LIKE ?", ['%' . $searchValue . '%'])
                    ->orWhereRaw("UPPER(TRIM(correspondencia.cat_anio.descripcion)) LIKE ?", ['%' . $searchValue . '%'])
                    ->orWhereRaw("UPPER(TRIM(TO_CHAR(correspondencia.tbl_oficio.fecha_inicio, 'DD/MM/YYYY'))) LIKE ?", ['%' . $searchValue . '%'])
                    ->orWhereRaw("UPPER(TRIM(TO_CHAR(correspondencia.tbl_oficio.fecha_fin, 'DD/MM/YYYY'))) LIKE ?", ['%' . $searchValue . '%']);
            });
        }

        // Aplicar la paginación (OFFSET y LIMIT)
        $query->orderBy('correspondencia.tbl_oficio.id_tbl_oficio', 'DESC')
            ->offset($iterator) // OFFSET
            ->limit(5); // LIMIT

        // Ejecutar la consulta y retornar los resultados
        return $query->get();
    }

    //La funcion retorna  los datos de encabezado de la vista cloud
    public function dataCloud($id)
    {
        $query = DB::table('correspondencia.tbl_oficio')
            ->join('correspondencia.tbl_correspondencia', 'correspondencia.tbl_oficio.id_tbl_correspondencia', '=', 'correspondencia.tbl_correspondencia.id_tbl_correspondencia')
            ->join('correspondencia.cat_anio', 'correspondencia.tbl_oficio.id_cat_anio', '=', 'correspondencia.cat_anio.id_cat_anio')
            ->select(
                'correspondencia.tbl_oficio.num_turno_sistema AS num_turno_sistema',
                'correspondencia.tbl_correspondencia.num_turno_sistema AS num_turno_sistema_correspondencia',
                DB::raw("TO_CHAR(correspondencia.tbl_oficio.fecha_inicio::date, 'DD/MM/YYYY') AS fecha_inicio"),
                DB::raw("TO_CHAR(correspondencia.tbl_oficio.fecha_fin::date, 'DD/MM/YYYY') AS fecha_fin"),
                'correspondencia.cat_anio.descripcion AS anio'
            )
            ->where('correspondencia.tbl_oficio.id_tbl_oficio', $id)
            ->first(); // Usamos `first` para obtener solo un resultado

        return $query;
    }
}
