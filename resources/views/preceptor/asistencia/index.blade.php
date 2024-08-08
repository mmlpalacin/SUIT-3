@extends('layouts.app')
@section('title', 'Asistencia')
@section('nav')
@include('preceptor.plantillas.nav')
@endsection
@section('content')
<h2 class="h3">Historial de Asistencia</h2>
<a href="{{route('prece.asistencia.create', $curso)}}"><x-button>Tomar Asistencia</x-button></a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Alumno</th>
                @foreach ($fechas as $fecha)
                    <th>{{ $fecha }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($alumnos as $alumno)
                <tr>
                    <td>{{ $alumno->lastname }}, {{ $alumno->name }}</td>
                    @foreach ($fechas as $fecha)
                        @php
                            $asistencia = $alumno->asistencias->firstWhere('date', $fecha);
                            $estado = $asistencia ? $asistencia->estado : 'Not Recorded';
                        @endphp
                        <td>{{ $estado }}</td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection