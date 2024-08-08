@extends('layouts.app')
@section('title', 'Planilla')
@section('nav')
@include('alumno.plantillas.nav')
@endsection
@section('content')
    <h1 class="h3">Planilla de Inscripción</h1>
    <form action="{{route('alumno.update', auth()->user())}}" method="post">
        @csrf
        @method('PUT')
        @include('alumno.plantillas.form')
    </form>
@endsection