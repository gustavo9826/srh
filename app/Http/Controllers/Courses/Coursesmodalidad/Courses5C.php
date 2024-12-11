<?php

namespace App\Http\Controllers\Courses\Coursesmodalidad;

use App\Http\Controllers\Controller;
use App\Models\Courses\Courses\CoursesmodalidadM;
use Illuminate\Http\Request;

class Courses5C extends Controller
{
    public function __invoke()
    {
        // Obtener todos los cursos de coordinación
        $coursesmodalidad = CoursesmodalidadM::all();

        // Pasar los cursos a la vista
        return view('courses/coursesmodalidad/list', compact('coursesmodalidad'));
    }

    public function save(Request $request)
    {
        $coursesmodalidadM = new CoursesmodalidadM();
        // Validar los datos del formulario
        $request->validate([
            'descripcion' => 'required|string|max:255',
        ]);

        // Crear usuario
        $coursesmodalidadM::create([
            'descripcion' => $request->descripcion,
            'estatus' => $request->estatus ?? false, // Manejar estatus como false si es null
        ]);

        // Redirigir a la lista de cursos con un mensaje de éxito
        return redirect()->route('coursesmodalidad.list')->with('success', 'Curso guardado exitosamente.');
    }

    public function create()
    {
        $item = new CoursesmodalidadM();
        $item->id_estatuto_organico = '';  // Valor por defecto
        $item->descripcion = '';    // Valor por defecto
        $item->estatus = '';     

        return view('courses.coursesmodalidad.form', compact('item'));
    }
    public function searchTable(Request $request)
    {
        $searchValue = $request->get('searchValue');  // Término de búsqueda
        $iterator = $request->get('iterator', 0);  // Si no se pasa iterador, por defecto será 0 (primera página)
    
        // Filtrar los cursos que coincidan con la búsqueda
        $courses = CoursesmodalidadM::where('descripcion', 'like', '%' . $searchValue . '%')
                           ->offset($iterator)
                           ->limit(5)  // Límite de resultados por página
                           ->get();
    
        return response()->json([
            'value' => $courses
        ]);
    }
}