@extends('layouts.app')
@section('title', 'Bienvenido')
@section('nav')
    @if (Route::has('login'))
        @auth
        @include('components.nav-ifs')
        @else
            <ul class="text-white max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between h-16">
                <li  class="inline-flex items-center px-3 py-2 text-sm leading-4 font-medium rounded-md text-white hover:text-white focus:outline-none focus: transition ease-in-out duration-150"><a href="{{ route('login') }}">Ingresa</a></li>
                <li><div class="flex">        
                    <div class="flex items-center shrink-0 me-3">
                        <a href="{{ route('dashboard') }}">
                            <x-authentication-card-logo class="block h-12 w-12" />
                        </a>
                    </div>
                    </div>
                </li>
            </ul>
        @endauth
    @endif
@endsection
@section('content')
    <div class="post">
    <h1 class="display-4 font-weight-bold text-center mb-4">Anuncios</h1>
        @foreach ($anuncios as $anuncio)
            <div class="w-full sm:max-w-lg mt-6 px-6 py-4 bg-gray-100 shadow-md overflow-hidden sm:rounded-lg text-center">
                <p class="mb-1 card-text small text-muted text-left">{{$anuncio->published_at}}</p>
                    @if ($anuncio->curso)
                    <p class="mb-1 card-text small text-muted text-left">{{$anuncio->curso->name}} ° {{$anuncio->curso->division_id}}</p>
                    @endif

                <h3 class="h4 font-weight-bold">{{$anuncio->title}}</h3>
                    <p class="card-text">{!!$anuncio->body!!}</p>                    @if($anuncio->image)
                        <td><img class="img-fluid mx-auto d-block sm:rounded-lg" src="{{Storage::url($anuncio->image->url)}}"></td>
                    @endif
            </div>
        @endforeach
    </div>
@endsection