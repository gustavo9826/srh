<?php

namespace App\Http\Controllers\Courses\Coursestipoac;

use App\Http\Controllers\Controller;
use App\Models\Courses\Courses\CoursestipoacM;
use Illuminate\Http\Request;

class Courses9C extends Controller
{
    public function __invoke()
    {
        // Obtener todos los cursos de coordinación
        $coursestipoac = CoursestipoacM::all();
    
        // Pasar los cursos a la vista
        return view('courses/coursestipoac/list', compact('coursestipoac'));
    }

    public function save(Request $request)
    {
        $coursestipoacM = new CoursestipoacM();
        // Validar los datos del formulario
        $request->validate([
            'descripcion' => 'required|string|max:255',
        ]);

        // Crear usuario
        $coursestipoacM::create([
            'descripcion' => $request->descripcion,
            'estatus' => $request->estatus ?? false, // Manejar estatus como false si es null
        ]);

        // Redirigir a la lista de cursos con un mensaje de éxito
        return redirect()->route('coursestipoac.list')->with('success', 'Curso guardado exitosamente.');
    }

    public function create()
    {
        $item = new CoursestipoacM();
        $item->id_tipo_accion = '';  // Valor por defecto
        $item->descripcion = '';    // Valor por defecto
        $item->estatus = '';     

        return view('courses.coursestipoac.form', compact('item'));
    }
}