@extends('layouts.app')
@section('title', 'Crear Anuncio')
@section('nav')
    @include('components.nav-ifs')
@endsection
@section('content')

<div class="container">
    <h1 class="h3">Tablón de Anuncios</h1>
    <form action="{{ route('admin.anuncio.store')}}" method="POST" autocomplete="off" enctype="multipart/form-data">
        @include('admin.plantillas.form')
    </form>
</div>
<br>
@endsection