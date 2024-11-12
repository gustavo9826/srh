<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserC extends Controller
{
    public function __invoke()
    {
        return view('administration/user');
    }

    public function getUsers(Request $request)
    {
        // Simular que tenemos millones de registros con 'User::query()'
        $query = User::query();

        // Si existe un término de búsqueda, lo usamos
        if ($request->has('search') && $request->search['value']) {
            $query->where('name', 'like', '%' . $request->search['value'] . '%');
        }

        // Total de registros antes de la paginación
        $totalRecords = $query->count();

        // Obtener los datos paginados
        $users = $query->skip($request->start)
            ->take($request->length)
            ->get();

        // Responder con formato JSON para DataTables
        return response()->json([
            'draw' => $request->draw,
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $totalRecords,
            'data' => $users
        ]);
    }
}
