<?php

namespace App\Http\Controllers\Alumno;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class FormController extends Controller
{
    public function index()
    {
        $editable = false;
        return view('alumno.datos.index', compact('editable'));
    }

    public function create()
    {
        return view('alumno.datos.create');
    }

    public function edit(user $user)
    {
        $editable = true;
        $user = auth()->user();
        return view('alumno.datos.edit', compact('user', 'editable'));
    }

}
