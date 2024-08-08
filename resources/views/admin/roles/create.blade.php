@extends('layouts.app')
@section('title','Crear Rol')
@section('nav')
    @include('admin.plantillas.nav')
@endsection
@section('content')
@section('content')
    <form action="{{route('admin.roles.store', $role)}}" method="post">
        @include('admin.plantillas.roles')
        <x-button type="submit">Crear Rol</x-button>
    </form>
@endsection