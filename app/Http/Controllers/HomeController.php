<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anuncio;
use App\Models\User;
use Spatie\Permission\Models\Role;

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
}
