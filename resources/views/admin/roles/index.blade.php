@extends('layouts.app')
@section('title', 'Roles')
@section('nav')
    @include('admin.plantillas.nav')
@endsection
@section('content')
@if (session('info'))
        <div class="alert">
            <strong>{{session('info')}}</strong>
        </div>
@endif
<a href="{{route('admin.roles.create')}}"><x-button>Nuevo Rol</x-button></a>
<div class="card">
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Rol</th>
                    <th colspan="2"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td>{{$role->id}}</td>
                        <td>{{$role->name}}</td>
                        <td width="10px"><a href="{{route('admin.roles.edit', $role)}}" class="btn btn-primary">Editar</a></td>
                        <td width="10px">
                            <form action="{{route('admin.roles.destroy', $role)}}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                            </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection