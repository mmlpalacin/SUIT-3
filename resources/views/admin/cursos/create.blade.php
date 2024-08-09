@extends('layouts.app')
@section('title','Crear Curso')
@section('nav')
    @include('admin.plantillas.nav')
@endsection
@section('content')
    <form action="{{route('admin.cursos.store')}}" method="post">
        @csrf
        @include('admin.plantillas.cursos')
        <x-button type="submit">Crear Curso</x-button>
    </form>
@endsection