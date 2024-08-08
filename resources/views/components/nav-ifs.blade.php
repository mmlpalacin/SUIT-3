@php
    // Obtén el rol del usuario autenticado
    $userRole = Auth::user()->roles->first()->name ?? 'guest';
@endphp

<!-- Navegación para administradores -->
@if ($userRole === 'admin')
    @include('admin.plantillas.nav')
<!-- Navegación para profesores -->
@elseif ($userRole === 'profesor')
    @include('layouts.nav')
<!-- Navegación para preceptor -->
@elseif ($userRole === 'preceptor')
    @include('preceptor.plantillas.nav')
<!-- Navegación para alumnos -->
@elseif ($userRole === 'alumno')
    @include('alumno.plantillas.nav')
@endif