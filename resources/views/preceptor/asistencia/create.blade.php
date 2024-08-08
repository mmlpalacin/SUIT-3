@extends('layouts.app')
@section('title', 'Asistencia')
@section('nav')
@include('preceptor.plantillas.nav')
@endsection
@section('content')
<table class="table">
    <form action="{{route('prece.asistencia.store', $curso)}}" method="POST">
        @csrf
        <label for="fecha">Fecha</label>
        <input type="date" name="date" id="date" class="form-control" required>
            <thead>
                <tr>
                    <th>Alumno</th>
                    <th>Presente</th>
                    <th>Tarde</th>
                    <th>Ausente</th>
                    <th colspan="4"></th>
                </tr>
            </thead>
            <tbody>    
                @foreach ($alumnos as $alumno)
                    <tr>
                        <input type="hidden" name="asistencias[{{ $alumno->id }}][alumno_id]" value="{{ $alumno->id }}">
                        <td>{{ $alumno->lastname }} {{ $alumno->name }}</td>
                        <td><input type="radio" name="asistencias[{{ $alumno->id }}][estado]" value="presente"></td>
                        <td><input type="radio" name="asistencias[{{ $alumno->id }}][estado]" value="tarde"></td>
                        <td><input type="radio" name="asistencias[{{ $alumno->id }}][estado]" value="ausente"></td>
                        <td colspan="4"></td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <td><x-button type="submit">Registrar</x-button></td>
            </tfoot>
        </form>
</table>
@endsection
