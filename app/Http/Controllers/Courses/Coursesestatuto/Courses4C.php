<?php

namespace App\Http\Controllers\Courses\Coursesestatuto;

use App\Http\Controllers\Controller;
use App\Models\Courses\Courses\CoursesestatutoM;
use Illuminate\Http\Request;

class Courses4C extends Controller
{
    public function __invoke()
    {
        // Obtener todos los cursos de coordinación
        $coursesestatuto = CoursesestatutoM::all();

        // Pasar los cursos a la vista
        return view('courses/coursesestatuto/list', compact('coursesestatuto'));
    }

    public function save(Request $request)
    {
        $coursesestatutoM = new CoursesestatutoM();
        // Validar los datos del formulario
        $request->validate([
            'descripcion' => 'required|string|max:255',
        ]);

        // Crear usuario
        $coursesestatutoM::create([
            'descripcion' => $request->descripcion,
            'estatus' => $request->estatus ?? false, // Manejar estatus como false si es null
        ]);

        // Redirigir a la lista de cursos con un mensaje de éxito
        return redirect()->route('coursesestatuto.list')->with('success', 'Curso guardado exitosamente.');
    }

    public function create()
    {
        $item = new CoursesestatutoM();
        $item->id_estatuto_organico = '';  // Valor por defecto
        $item->descripcion = '';    // Valor por defecto
        $item->estatus = '';     

        return view('courses.coursesestatuto.form', compact('item'));
    }
}