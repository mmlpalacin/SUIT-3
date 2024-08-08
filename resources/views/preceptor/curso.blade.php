@extends('layouts.app')
@section('title',  $curso->name . '°' . $curso->division_id)
@section('nav')
@include('preceptor.plantillas.nav')
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>alumnos</th>
                    <th><a href="{{route('prece.asistencia.create', $curso)}}"><x-button>Tomar Asistencia</x-button></a></th>
                    <th colspan="2"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($alumnos as $alumno)
                <tr>
                    <td>{{ $alumno->lastname }}, {{ $alumno->name }}<input type="hidden" name="id[]" value="{{ $alumno->id }}"></td>
                    <td colspan="1"></td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Profesores</th>
                    <th>Materia</th>
                    <th>Día</th>
                    <th>Horario</th>
                    <th colspan="4"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($profesores as $profesor)
                    <tr>
                        <td><input type="hidden" name="id[]" value="{{$profesor->id}}">{{ $profesor->lastname }}, {{$profesor->name}}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td colspan="4"></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection