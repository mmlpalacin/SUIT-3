@extends('layouts.app')
@section('title', 'Planilla')
@section('nav')
@include('alumno.plantillas.nav')
@endsection
@section('content')
    Formulario de datos
    <td width="10px"><a href="{{route('alumno.edit', auth()->user())}}"><button class="btn btn-primary">editar</button></a></td>
    @include('alumno.plantillas.form')
@endsection