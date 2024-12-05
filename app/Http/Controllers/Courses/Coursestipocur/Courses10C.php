<?php

namespace App\Http\Controllers\Courses\Coursestipocur;

use App\Http\Controllers\Controller;
use App\Models\Courses\Courses\CoursestipocurM;
use Illuminate\Http\Request;

class Courses10C extends Controller
{
    public function __invoke()
    {
        // Obtener todos los cursos de coordinación
        $coursestipocur = CoursestipocurM::all();
    
        // Pasar los cursos a la vista
        return view('courses/coursestipocur/list', compact('coursestipocur'));
    }

    public function save(Request $request)
    {
        $coursestipocurM = new CoursestipocurM();
        // Validar los datos del formulario
        $request->validate([
            'descripcion' => 'required|string|max:255',
        ]);

        // Crear usuario
        $coursestipocurM::create([
            'descripcion' => $request->descripcion,
            'estatus' => $request->estatus ?? false, // Manejar estatus como false si es null
        ]);

        // Redirigir a la lista de cursos con un mensaje de éxito
        return redirect()->route('coursestipocur.list')->with('success', 'Curso guardado exitosamente.');
    }

    public function create()
    {
        $item = new CoursestipocurM();
        $item->id_tipocursos = '';  // Valor por defecto
        $item->descripcion = '';    // Valor por defecto
        $item->estatus = '';     

        return view('courses.coursestipocur.form', compact('item'));
    }
}