<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anuncio;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use App\Models\Asignacion_de_Cursos;
use App\Models\Asistencia;

class HomeController extends Controller
{
    public function index(){
        $role = Role::where('name', 'admin')->first();

        $users = User::whereHas('roles', function ($query) use ($role) {
            $query->where('id', $role->id);
        })->get();

        $anuncios = Anuncio::where('status', 2)->whereIn('user_id', $users->pluck('id'))->latest('id')->paginate();
        return view ('welcome', compact('anuncios'));
    }
    public function dashboard()
    {
        $user = Auth::user();
        $role= Auth::user()->roles->first()->name;

        $cursos = Asignacion_de_Cursos::where('user_id', $user->id)->with('curso')->get();

        $asistencias = Asistencia::whereHas('alumno', function ($query) use ($user) {
            $query->where('alumno_id', $user->id);
        })->get();
        return view('dashboard', compact('cursos', 'asistencias', 'role'));
    }
}
