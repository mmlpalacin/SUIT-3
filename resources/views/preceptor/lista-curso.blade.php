@extends('layouts.app')
@section('title', 'Mis Cursos')
@section('nav')
@include('preceptor.plantillas.nav')
@endsection
@section('content')
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
                        <td width="10px"><a href="{{route('prece.asistencia.create', $curso)}}"><x-button>Tomar Asistencia</x-button></a></td>
                        <td width="10px"><a href="{{route('prece.curso.show', $curso)}}" class="btn btn-primary">Ver Curso</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection