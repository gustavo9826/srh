<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MessagesC extends Controller
{
    public function messageErrorBack($text)
    {
        return back()->withInput()->with([
            'message' => $text,
            'value' => 'error',
            'estatus' => 'true'
        ]);
    }
}
