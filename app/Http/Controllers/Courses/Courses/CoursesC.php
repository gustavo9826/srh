<?php

namespace App\Http\Controllers\Courses\Courses;

use App\Http\Controllers\Controller;
use App\Models\Courses\Courses\CoursesM;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CoursesC extends Controller
{
    public function __invoke()
{
    // Obtener todos los cursos
    $courses = CoursesM::all();

    // Pasar los cursos a la vista
    return view('courses/courses/list', compact('courses'));
}

    public function save(Request $request)
    {
        $coursesM = new CoursesM();
        // Validar los datos del formulario
        $request->validate([
            'descripcion' => 'required|string|max:255',
        ]);

        // Crear usuario
        $coursesM::create([
            'descripcion' => $request->descripcion,
            'estatus' => $request->estatus ?? false, // Manejar estatus como false si es null
        ]);

        // Redirigir a la lista de cursos con un mensaje de éxito
        return redirect()->route('courses.list')->with('success', 'Curso guardado exitosamente.');
    }

    public function create()
    {
        $item = new CoursesM();
        $item->id_beneficio = '';  // Set an empty value or default if needed
        $item->descripcion = '';    // Set an empty value or default if needed
        $item->estatus = '';     

        return view('courses.courses.form', compact('item'));
    }
    public function searchTable(Request $request)
{
    $searchValue = $request->get('searchValue');  // Término de búsqueda
    $iterator = $request->get('iterator', 0);  // Si no se pasa iterador, por defecto será 0 (primera página)

    // Filtrar los cursos que coincidan con la búsqueda
    $courses = CoursesM::where('descripcion', 'like', '%' . $searchValue . '%')
                       ->offset($iterator)
                       ->limit(5)  // Límite de resultados por página
                       ->get();

    return response()->json([
        'value' => $courses
    ]);
}

}
