@extends('layouts.nav')
@section('personalizado')
    @can('prece.curso.index')
    <li class="block font-medium rounded-md text-white inline-flex items-center px-3 py-2 text-sm leading-4 "><a href="{{route ('prece.curso.index')}}">Mis Cursos</a></li>
    @endcan
@endsection