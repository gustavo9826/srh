<?php

namespace App\Http\Controllers\Courses\Coursescoordinacion;

use App\Http\Controllers\Controller;
use App\Models\Courses\Courses\CoursescoordinacionM;
use Illuminate\Http\Request;

class Courses3C extends Controller
{
    public function __invoke()
    {
        // Obtener todos los cursos de coordinación
        $coursescoordinacion = CoursescoordinacionM::all();

        // Pasar los cursos a la vista
        return view('courses/coursescoordinacion/list', compact('coursescoordinacion'));
    }

    public function save(Request $request)
    {
        $coursescoordinacionM = new CoursescoordinacionM();
        // Validar los datos del formulario
        $request->validate([
            'descripcion' => 'required|string|max:255',
        ]);

        // Crear usuario
        $coursescoordinacionM::create([
            'descripcion' => $request->descripcion,
            'estatus' => $request->estatus ?? false, // Manejar estatus como false si es null
        ]);

        // Redirigir a la lista de cursos con un mensaje de éxito
        return redirect()->route('coursescoordinacion.list')->with('success', 'Curso guardado exitosamente.');
    }

    public function create()
    {
        $item = new CoursescoordinacionM();
        $item->id_coordinacion = '';  // Valor por defecto
        $item->descripcion = '';    // Valor por defecto
        $item->estatus = '';     

        return view('courses.coursescoordinacion.form', compact('item'));
    }
}