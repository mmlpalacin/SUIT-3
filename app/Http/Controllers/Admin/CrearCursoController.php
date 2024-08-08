<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\Especialidad;
use App\Models\Division;
use App\Models\Curso;
use App\Models\User;

class CrearCursoController extends Controller
{
    public function index()
    {
        $cursos = curso::all();
        return view('admin.cursos.index', compact('cursos'));
    }

    public function create(curso $curso)
    {
        $especialidades = Especialidad::all();
        $divisiones = Division::all();
        $cursos = Curso::all();
        $role = Role::where('name', 'preceptor')->first();

        $preceptores = User::whereHas('roles', function ($query) use ($role) {
            $query->where('id', $role->id);
        })->get();
        return view('admin.cursos.create', compact('especialidades', 'divisiones', 'preceptores', 'cursos', 'curso'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'especialidad_id' => 'nullable|exists:especialidads,id',
            'division_id' => 'required|exists:divisions,id',
            'turno' => 'required|in:mañana,tarde,noche',
        ]);

        $curso =Curso::create($request->all());

        return redirect()->route('admin.cursos.index')->with('info', 'El curso se creo con éxito');
    }

    public function show(curso $curso)
    {
        return view('admin.cursos.show', compact('curso')); 
    }

    public function edit(Curso $curso)
    {
        $especialidades = Especialidad::all();
        $divisiones = Division::all();
        $role = Role::where('name', 'preceptor')->first();

        $preceptores = User::whereHas('roles', function ($query) use ($role) {
            $query->where('id', $role->id);
        })->get();

        return view('admin.cursos.edit', compact('especialidades', 'divisiones', 'preceptores', 'curso'));
    }  


    public function update(Request $request, curso $curso)
    {
        $request->validate([
            'name' => 'required|in:1,2,3,4,5,6,7',
            'especialidad_id' => 'nullable|exists:especialidads,id',
            'division_id' => 'required|exists:divisions,id',
            'turno' => 'required|in:1,2,3',
        ]);
    
        $curso->update($request->all());

        return redirect()->route('admin.cursos.index')->with('info', 'El curso se actualizó el curso con éxito');
    }

    public function destroy(curso $curso)
    {
        $curso->delete();

        return redirect()->route('admin.cursos.index')->with('info', 'Se elimino el curso con éxito');
    }
}
