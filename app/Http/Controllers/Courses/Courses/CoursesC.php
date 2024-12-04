<?php

namespace App\Http\Controllers\Courses\Courses;

use App\Models\Letter\Collection\CollectionDateM;
use App\Models\Letter\Collection\CollectionStatusM;
use App\Models\Letter\Collection\CollectionUnidadM;
use App\Http\Controllers\Controller;
use App\Models\Letter\Collection\CollectionAreaM;
use App\Models\Letter\Collection\CollectionRelUsuarioM;
use App\Models\Courses\Courses\CoursesM;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CoursesC extends Controller
{
    public function __invoke()
    {
        return view('courses/courses/list');
    }
    public function create()
{
    $item = new CoursesM();
    $item->id_beneficio = '';  // Set an empty value or default if needed
    $item->descripcion = '';    // Set an empty value or default if needed
    $item->estatus = '';        // Set an empty value or default if needed

    return view('courses.courses.form', compact('item'));
}

}
