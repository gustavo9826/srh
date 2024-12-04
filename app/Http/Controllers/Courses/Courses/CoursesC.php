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
        return view('courses/courses/list');
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
}
