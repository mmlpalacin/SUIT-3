@extends('layouts.app')
@section('title', 'Anuncios')
@section('nav')
    @include('components.nav-ifs')
@endsection
@section('content')
    @if (session('info'))
        <div class="alert">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    <a href="{{route('admin.anuncio.create')}}"><x-button>Nuevo Anuncio</x-button></a>
    @livewire('anuncio-index')
@endsection
@section('scripts')