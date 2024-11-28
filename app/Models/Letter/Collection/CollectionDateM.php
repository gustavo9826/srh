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
}
