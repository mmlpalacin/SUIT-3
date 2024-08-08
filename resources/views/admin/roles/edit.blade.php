@extends('layouts.app')
@section('title','Editar Rol')
@section('nav')
    @include('admin.plantillas.nav')
@endsection
@section('content')
@include('admin.plantillas.roles')
@section('form')
    <form action="{{route('admin.roles.update', $role)}}" method="POST">
        @section('method')
            @method('PUT')
        @endsection
        @endsection
        <x-button type="submit">Editar Rol</x-button>
    </form>
@endsection