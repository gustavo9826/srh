<?php

namespace App\Http\Controllers\Courses\Coursescategoria;

use App\Http\Controllers\Controller;
use App\Models\Courses\Courses\CoursescategoriaM;
use Illuminate\Http\Request;

class Courses2C extends Controller
{
    public function __invoke()
{
    // Obtener todos los cursos
    $coursescategoria = CoursescategoriaM::all();

    // Pasar los cursos a la vista
    return view('courses/coursescategoria/list', compact('coursescategoria'));
}

    public function save(Request $request)
    {
        $coursescategoriaM = new CoursescategoriaM();
        // Validar los datos del formulario
        $request->validate([
            'descripcion' => 'required|string|max:255',
        ]);

        // Crear usuario
        $coursescategoriaM::create([
            'descripcion' => $request->descripcion,
            'estatus' => $request->estatus ?? false, // Manejar estatus como false si es null
        ]);

        // Redirigir a la lista de cursos con un mensaje de éxito
        return redirect()->route('coursescategoria.list')->with('success', 'Curso guardado exitosamente.');
    }

    public function create()
    {
        $item = new CoursescategoriaM();
        $item->id_categoria = '';  // Set an empty value or default if needed
        $item->descripcion = '';    // Set an empty value or default if needed
        $item->estatus = '';     

        return view('courses.coursescategoria.form', compact('item'));
    }
    public function searchTable(Request $request)
    {
        $searchValue = $request->get('searchValue');  // Término de búsqueda
        $iterator = $request->get('iterator', 0);  // Si no se pasa iterador, por defecto será 0 (primera página)

        // Filtrar los cursos que coincidan con la búsqueda
        $courses = CoursescategoriaM::where('descripcion', 'like', '%' . $searchValue . '%')
            ->offset($iterator)
            ->limit(5)  // Límite de resultados por página
            ->get();

        return response()->json([
            'value' => $courses,
            'status' => true,
        ]);
    }
}
