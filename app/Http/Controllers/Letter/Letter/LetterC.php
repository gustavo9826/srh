<?php

namespace App\Http\Controllers\Letter\Letter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LetterC extends Controller
{
    public function __invoke()
    {
        return view('letter/letter/list');
    }
}
