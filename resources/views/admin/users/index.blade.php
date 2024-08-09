@extends('layouts.app')
@section('title', 'Lista de Usuarios')
@section('nav')
    @include('admin.plantillas.nav')
@endsection
@section('content')
@if (session('info'))
        <div class="alert">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    <a href="{{route('admin.register')}}"><x-button>Nuevo Usuario</x-button></a>
    @livewire('user-index')
@endsection