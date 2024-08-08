<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CrearRolController extends Controller
{
    public function index()
    {
        $roles = role::all();
        return view('admin.roles.index', compact('roles'));
    }

    public function create(role $role)
    {
        $permissions=Permission::all();
        return view('admin.roles.create', compact('role', 'permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $role = role::create($request->all());//crea rol

        $role->permissions()->sync($request->permissions);//asigna permisos
        return redirect()->route('admin.roles.index')->with('info', 'El rol se creo con éxito');
    }

    public function show(role $role)
    {
        return view('admin.roles.show', compact('role')); 
    }

    public function edit(role $role)
    {
        $permissions = Permission::all();
        return view('admin.roles.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, role $role)
    {
        $request->validate([
            'name' => 'required',
        ]);
        
        $role->update($request->all());
        $role->permissions()->sync($request->permissions);

        return redirect()->route('admin.roles.index')->with('info', 'Se actualizó el rol con éxito');
    }

    public function destroy(role $role)
    {
        $role->delete();

        return redirect()->route('admin.roles.index')->with('info', 'Se elimino el rol con éxito');
    }
}
