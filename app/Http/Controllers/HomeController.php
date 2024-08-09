<?php

namespace App\Http\Controllers;

use App\Models\Anuncio;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $role = Role::where('name', 'admin')->first();

        $users = User::whereHas('roles', function ($query) use ($role) {
            $query->where('id', $role->id);
        })->get();

        $anuncios = Anuncio::where('status', 2)->whereIn('user_id', $users->pluck('id'))->latest('published_at')->paginate();

        if (auth()->user()) {
            $user = auth()->user();
            $cursosIds = $user->Asignacion->pluck('curso_id')->toArray();
        
            $anunciosCurso = Anuncio::where('status', 2)
            ->whereIn('curso_id', $cursosIds)
            ->latest('published_at')
            ->get();
            $anuncios = $anuncios->merge($anunciosCurso)->sortByDesc('published_at');
        }

        return view ('welcome', compact('anuncios'));
    }
}
