<?php

namespace App\Http\Controllers;

use App\Actions\Fortify\CreateNewUser;
use Laravel\Fortify\Fortify;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Routing\Controller;

class CustomRegisteredUserController extends Controller
{
    protected $creator;

    public function __construct(CreateNewUser $creator)
    {
        $this->creator = $creator;
        $this->middleware('can:admin.register')->only('create', 'store');
    }

    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        if (config('fortify.lowercase_usernames')) {
            $request->merge([
                Fortify::username() => Str::lower($request->{Fortify::username()}),
            ]);
        }

        $this->creator->create($request->all());

        return redirect()->route('admin.users.index')->with('info', 'Recurso creado exitosamente.');;
    }
}
