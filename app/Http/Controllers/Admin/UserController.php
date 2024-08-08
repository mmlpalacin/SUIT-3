<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Asignacion_de_Cursos;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Curso;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.users.index')->only('index');
        $this->middleware('can:admin.users.create')->only('create', 'store');
        $this->middleware('can:admin.users.edit')->only('edit', 'update');
        $this->middleware('can:admin.users.destroy')->only('destroy');
    }
     
    public function index()
    {
        return view('admin.users.index');
    }

    public function show($id)
    {
        $usuario = User::find($id);
        return view('admin.users.show', compact('usuario'));
    }
    public function edit(User $user)
    {
        $roles = role::all();
        $cursos = Curso::all();
        return view ('admin.users.edit', compact('user', 'roles', 'cursos'));
    }

    public function update(Request $request, user $user)
    {
        $request->validate([
            'curso' => 'array|nullable',
            'curso.*' => 'exists:cursos,id',
        ]);
        
        //asiganr rol
        if ($request->role) {
            $user->roles()->sync($request->role);
        }

        //asignar curso
        $cursos = $request->input('curso');
        if($cursos){
        if ($user->hasRole('alumno')) {
            $cursoId = $cursos[0] ?? null; 
            $existingAssignment = Asignacion_de_Cursos::where('user_id', $user->id)->first();

            if ($existingAssignment) { // Si el alumno ya está asignado, actualiza el curso
                $existingAssignment->curso_id = $cursoId;
                $existingAssignment->save();
            }else
                Asignacion_de_Cursos::create([
                'user_id' => $user->id,
                'curso_id' => $cursoId,
                'rol' => 'alumno',
                ]);
        }else{

            $selectedCursoIds = $request->curso;

            // Obtener los IDs de los cursos previamente asignados
            $existingCursoIds = Asignacion_de_Cursos::where('user_id', $user->id)->pluck('curso_id')->toArray();

            // Eliminar asignaciones para cursos que no están en la lista seleccionada
            Asignacion_de_Cursos::where('user_id', $user->id)
                ->whereNotIn('curso_id', $selectedCursoIds)
                ->delete();

            foreach ($selectedCursoIds as $cursoId) {
                Asignacion_de_Cursos::create([
                    'user_id' => $user->id,
                    'curso_id' => $cursoId,
                    'rol' => 'otro',
                ]);
            }
        }}else{
            Asignacion_de_Cursos::where('user_id', $user->id)->delete();
        }

        return redirect()->route('admin.users.index')->with('info','Se asignó el rol con exito');

    }
    public function destroy(user $user)
    {
        $user->delete();
        
        return redirect()->route('admin.users')->with('info','El usuario se elimino con exito');
    }
}