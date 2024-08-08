@extends('layouts.nav')
@section('personalizado')
@can('admin.users.index')
<div class="hidden sm:flex sm:items-center sm:ms-6">
    <div class="ms-3 relative">
        <x-dropdown align="left" width="60">
            <x-slot name="trigger">
                <span class="inline-flex rounded-md">
                    <button type="button" class="inline-flex items-center px-3 py-2 text-sm leading-4 font-medium rounded-md text-white hover:text-white focus:outline-none focus: transition ease-in-out duration-150">
                        Registro
                    </button>
                </span>
            </x-slot>
            <x-slot name="content">
                <div class="w-60">
                    <x-dropdown href="{{ route('admin.users.index') }}">
                        Registro de Usuarios
                    </x-dropdown>
                </div>
                <div class="w-60">
                    <x-dropdown href="{{ route('register') }}">
                        Nuevo Usuario
                    </x-dropdown>
                </div>
            </x-slot>
        </x-dropdown>
    </div>
</div>
@endcan

@can('admin.roles.index')
<div class="hidden sm:flex sm:items-center sm:ms-6">
    <div class="ms-3 relative">
        <x-dropdown align="left" width="60">
            <x-slot name="trigger">
                <span class="inline-flex rounded-md">
                    <button type="button" class="inline-flex items-center px-3 py-2 text-sm leading-4 font-medium rounded-md text-white hover:text-white focus:outline-none focus: transition ease-in-out duration-150">
                        Asignaciones
                    </button>
                </span>
            </x-slot>
            <x-slot name="content">
                <div class="w-60">
                    <div class="block px-4 py-2 text-xs text-gray-400">
                        Roles
                    </div>
                    <x-dropdown-link href="{{route('admin.roles.index')}}">
                        Lista de Roles
                    </x-dropdown-link>
                    <x-dropdown href="{{route('admin.roles.create')}}">
                        Crear Nuevo Rol
                    </x-dropdown-link>
                </div>
                <div class="w-60">
                    <div class="block px-4 py-2 text-xs text-gray-400">
                        Cursos
                    </div>
                    <x-dropdown-link href="{{route('admin.cursos.index')}}">
                        Lista de Cursos
                    </x-dropdown-link>
                    <x-dropdown-link href="{{route('admin.cursos.create')}}">
                        Crear Nuevo Curso
                    </x-dropdown-link>
                </div>
            </x-slot>
        </x-dropdown>
    </div>
</div>
@endcan
@endsection