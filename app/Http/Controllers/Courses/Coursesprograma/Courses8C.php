<?php

namespace App\Http\Controllers\Courses\Coursesprograma;

use App\Models\Letter\Collection\CollectionDateM;
use App\Models\Letter\Collection\CollectionStatusM;
use App\Models\Letter\Collection\CollectionUnidadM;
use App\Http\Controllers\Controller;
use App\Models\Letter\Collection\CollectionAreaM;
use App\Models\Letter\Collection\CollectionRelUsuarioM;
use App\Models\Letter\Letter\LetterM;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class Courses8C extends Controller
{
    public function __invoke()
    {
        return view('courses/coursesprograma/list');
    }
}