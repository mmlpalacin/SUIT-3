@extends('layouts.nav')
@section('personalizado')
    @can('alumno.boletin')
    <li class="block font-medium rounded-md text-white inline-flex items-center px-3 py-2 text-sm leading-4 "><a href="#">Boletin</a></li>
    @endcan
    @can('alumno.datos')
    <li  class="block font-medium rounded-md text-white inline-flex items-center px-3 py-2 text-sm leading-4 "><a href="{{route('alumno.index')}}">Datos del Alumno</a></li>
    @endcan
@endsection