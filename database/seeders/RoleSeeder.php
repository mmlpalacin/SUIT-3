<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $role1=role::create(['name'=>'admin']);
        $role2=role::create(['name'=>'preceptor']);
        $role3=role::create(['name'=>'profesor']);
        $role4=role::create(['name'=>'alumno']);
        $role5=Role::create(['name' =>'otros']);
        
        Permission::create(['name' => 'admin.anuncio.index', 'description' => 'Ver lista de anuncios personales'])->syncRoles([$role1, $role2, $role3]); //si quieres asignar a varios roles
        Permission::create(['name' => 'admin.anuncio.create', 'description' => 'crear un anuncio'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'admin.anuncio.edit', 'description' => 'editar un anuncio'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'admin.anuncio.destroy', 'description' => 'eliminar un anuncio'])->syncRoles([$role1, $role2, $role3]);

        //admin
        Permission::create(['name' => 'admin.roles.index', 'description' => 'Ver lista de roles'])->syncRoles([$role1]); //si quieres asignar a varios roles
        Permission::create(['name' => 'admin.roles.create', 'description' => 'crear un rol'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.roles.edit', 'description' => 'editar un rol'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.roles.destroy', 'description' => 'eliminar un rol'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.users.index', 'description' => 'ver listado de alumnos'])->syncRoles($role1); //si quieres asignar a un solo rol
        Permission::create(['name' => 'admin.users.create', 'description' => 'ingresar un nuevo alumno'])->syncRoles($role1);
        Permission::create(['name' => 'admin.users.edit', 'description' => 'editar un alumno'])->syncRoles($role1);

        Permission::create(['name' => 'admin.register', 'description' => 'Registrar un Nuevo Usuario'])->syncRoles([$role1]);

        //preceptor
        Permission::create(['name' => 'prece.curso.index', 'description' => 'Ver lista de sus cursos asignados'])->syncRoles([$role1, $role2]); //si quieres asignar a varios roles
        Permission::create(['name' => 'prece.curso.show', 'description' => 'Ver detalles de un curso asignado'])->syncRoles([$role1, $role2]); //si quieres asignar a varios roles
        Permission::create(['name' => 'prece.asistencia.index', 'description' => 'Ver planilla de asistencia'])->syncRoles([$role1, $role2]); //si quieres asignar a varios roles
        Permission::create(['name' => 'prece.asistencia.create', 'description' => 'Ver planilla de asistencia completa'])->syncRoles([$role1, $role2]); //si quieres asignar a varios roles

        //profesor


        //alumnos
        Permission::create(['name' => 'alumno.boletin', 'description' => 'ver boletin del alumno'])->syncRoles($role4);
        Permission::create(['name' => 'alumno.datos', 'description' => 'ver datos del alumno'])->syncRoles($role4);


        //->syncRoles([$role1, $role2]); si quieres asignar a mas de un rol*/
    }
}
