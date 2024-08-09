@extends('layouts.app')
@section('title',  $curso->name . '°' . $curso->division_id)
@section('nav')
@include('components.nav-ifs')
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>alumnos</th>
                    @can('prece.asistencia.create')
                        <th><a href="{{route('prece.asistencia.create', $curso)}}"><x-button>Tomar Asistencia</x-button></a></th>
                    @endcan   
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
<div class="post">
    @foreach ($curso->anuncios as $anuncio)
        <div class="w-full sm:max-w-lg mt-6 px-6 py-4 bg-gray-100 shadow-md overflow-hidden sm:rounded-lg text-center">
            <p class="mb-1 card-text small text-muted text-left">{{$anuncio->published_at}}</p>
            <h3 class="h4 font-weight-bold">{{$anuncio->title}}</h3>
                <p class="card-text">{!!$anuncio->body!!}</p>                    
                @if($anuncio->image)
                    <td><img class="img-fluid mx-auto d-block sm:rounded-lg" src="{{Storage::url($anuncio->image->url)}}"></td>
                @endif
        </div>
    @endforeach
</div>
@endsection