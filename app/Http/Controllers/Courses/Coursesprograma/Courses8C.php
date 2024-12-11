<?php

namespace App\Http\Controllers\Courses\Coursesprograma;

use App\Http\Controllers\Controller;
use App\Models\Courses\Courses\CoursesprogramaM;
use Illuminate\Http\Request;

class Courses8C extends Controller
{
    public function __invoke()
    {
        // Obtener todos los cursos de coordinación
        $coursesprograma = CoursesprogramaM::all();
    
        // Pasar los cursos a la vista
        return view('courses/coursesprograma/list', compact('coursesprograma'));
    }

    public function save(Request $request)
    {
        $coursesprogramaM = new CoursesprogramaM();
        // Validar los datos del formulario
        $request->validate([
            'descripcion' => 'required|string|max:255',
        ]);

        // Crear usuario
        $coursesprogramaM::create([
            'descripcion' => $request->descripcion,
            'estatus' => $request->estatus ?? false, // Manejar estatus como false si es null
        ]);

        // Redirigir a la lista de cursos con un mensaje de éxito
        return redirect()->route('coursesprograma.list')->with('success', 'Curso guardado exitosamente.');
    }

    public function create()
    {
        $item = new CoursesprogramaM();
        $item->id_programa_institucional = '';  // Valor por defecto
        $item->descripcion = '';    // Valor por defecto
        $item->estatus = '';     

        return view('courses.coursesprograma.form', compact('item'));
    }
    public function searchTable(Request $request)
    {
        $searchValue = $request->get('searchValue');  // Término de búsqueda
        $iterator = $request->get('iterator', 0);  // Si no se pasa iterador, por defecto será 0 (primera página)
    
        // Filtrar los cursos que coincidan con la búsqueda
        $courses = CoursesprogramaM::where('descripcion', 'like', '%' . $searchValue . '%')
                           ->offset($iterator)
                           ->limit(5)  // Límite de resultados por página
                           ->get();
    
        return response()->json([
            'value' => $courses
        ]);
    }
}