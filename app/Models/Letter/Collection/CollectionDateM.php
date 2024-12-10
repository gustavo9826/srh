<?php

namespace App\Models\Letter\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class CollectionDateM extends Model
{
    public function idYear()
    {
        $year = now()->format('Y'); // Año actual

        // Usar parámetros vinculados (prepared statements) para evitar inyección SQL
        $result = DB::select("SELECT correspondencia.cat_anio.id_cat_anio AS id
                          FROM correspondencia.cat_anio
                          WHERE correspondencia.cat_anio.descripcion = :year", ['year' => $year]);

        // Verifica si se obtuvo algún resultado
        return $result[0]->id; // Devuelve el id encontrado  f
    }

    //La funcion obtiene el nomobre del año, dependiendo del id que se ingrese
    public function getYearName($idYear)
    {
        // Usamos el Query Builder para seleccionar solo la columna 'descripcion'
        return DB::table('correspondencia.cat_anio')
            ->where('correspondencia.cat_anio.id_cat_anio', $idYear)
            ->where('correspondencia.cat_anio.estatus', true)
            ->select('correspondencia.cat_anio.descripcion AS name')  // Solo seleccionamos la columna 'descripcion'
            ->first();
    }

}
