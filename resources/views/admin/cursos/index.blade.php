@extends('layouts.app')
@section('title', 'cursos')
@section('nav')
    @include('admin.plantillas.nav')
@endsection
@section('content')
@if (session('info'))
        <div class="alert">
            <strong>{{session('info')}}</strong>
        </div>
@endif
<x-button><a href="{{route('admin.cursos.create')}}">Nuevo Curso</a></x-button>
<div class="card">
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>curso</th>
                    <th>division</th>
                    <th>turno</th>
                    <th>Especialidad</th>
                    <th colspan="5"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cursos as $curso)
                    <tr>
                        <td>{{$curso->id}}</td>
                        <td>{{$curso->name}}</td>
                        <td>{{$curso->division_id}}</td>
                        <td>
                            @if ($curso->turno == 1)
                                Mañana
                            @elseif ($curso->turno == 2)
                                Tarde
                            @else
                                Noche
                            @endif
                        </td>
                        <td>{{$curso->especialidad->name}}</td>
                        <td width="10px"><a href="{{route('admin.cursos.edit', $curso)}}" class="btn btn-primary">Editar</a></td>
                        <td width="10px">
                            <form action="{{route('admin.cursos.destroy', $curso)}}" method="post">
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