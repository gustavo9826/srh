<?php

namespace App\Http\Controllers\Courses\Coursesnombreacc;

use App\Http\Controllers\Controller;
use App\Models\Courses\Courses\CoursesnombreaccM;
use Illuminate\Http\Request;

class Courses6C extends Controller
{
    public function __invoke()
    {
        // Obtener todos los cursos de coordinación
        $coursesnombreacc = CoursesnombreaccM::all();

        // Pasar los cursos a la vista
        return view('courses/coursesnombreacc/list', compact('coursesnombreacc'));
    }

    public function save(Request $request)
    {
        $coursesnombreaccM = new CoursesnombreaccM();
        // Validar los datos del formulario
        $request->validate([
            'descripcion' => 'required|string|max:255',
        ]);

        // Crear usuario
        $coursesnombreaccM::create([
            'descripcion' => $request->descripcion,
            'estatus' => $request->estatus ?? false, // Manejar estatus como false si es null
        ]);

        // Redirigir a la lista de cursos con un mensaje de éxito
        return redirect()->route('coursesnombreacc.list')->with('success', 'Curso guardado exitosamente.');
    }

    public function create()
    {
        $item = new CoursesnombreaccM();
        $item->id_estatuto_organico = '';  // Valor por defecto
        $item->descripcion = '';    // Valor por defecto
        $item->estatus = '';     

        return view('courses.coursesnombreacc.form', compact('item'));
    }
    public function searchTable(Request $request)
    {
        $searchValue = $request->get('searchValue');  // Término de búsqueda
        $iterator = $request->get('iterator', 0);  // Si no se pasa iterador, por defecto será 0 (primera página)
    
        // Filtrar los cursos que coincidan con la búsqueda
        $courses = CoursesnombreaccM::where('descripcion', 'like', '%' . $searchValue . '%')
                           ->offset($iterator)
                           ->limit(5)  // Límite de resultados por página
                           ->get();
    
        return response()->json([
            'value' => $courses
        ]);
    }
}