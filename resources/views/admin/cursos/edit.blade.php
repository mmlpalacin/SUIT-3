@extends('layouts.app')
@section('title','Editar curso')
@section('nav')
    @include('admin.plantillas.nav')
@endsection
@section('content')
    <form action="{{route('admin.cursos.update', $curso)}}" method="POST">
        @csrf
        @method('put')
        @include('admin.plantillas.cursos')
        <x-button type="submit">Editar curso</x-button>
    </form>
@endsection