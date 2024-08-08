@extends('layouts.app')
@section('title', 'Editar Anuncio')
@section('nav')
    @include('components.nav-ifs')
@endsection
@section('content')

<div class="container">
    <h1>Editor de Anuncios</h1>
    <form action="{{ route('admin.anuncio.update', $anuncio)}}" method="POST" autocomplete="off" enctype="multipart/form-data">
        @include('admin.plantillas.form')
        @section('method')
            @method('PUT')
        @endsection
    </form>
</div>
<br>
@endsection
      