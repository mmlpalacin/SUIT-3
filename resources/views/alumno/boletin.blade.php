@extends('layouts.app')
@section('title', 'Boletin')
@section('nav')
@include('alumno.plantillas.nav')
@endsection
@section('content')
@can('boletin.update')
    <td width="10px"><a href="{{route('alumno.edit', $user)}}"><button class="btn btn-primary">editar</button></a></td>
@endcan
  <div class="container d-flex flex-column justify-content-center align-items-center">
    <h1 class="h3">ESCUELA DE EDUCACIÓN SECUNDARIA TECNICA N°3</h1>
      <thead>
        <table  class="table table-striped">
          <tr>
            <th>DIV </th>
            <th>Ciclo Lectivo</th>
            <th>Orientación: </th>
            <th colspan="3"></th>
          </tr>
          <tr>
            <th>Materia</th>
            <th>1er Cuatrimestre</th>
            <th>2do Cuatrimestre</th>
            <thth colspan="3"></th>
          </tr>
      </thead>
      <tbody>
        <tr>
          <td>materia</td>
          <td>nota1</td>
          <td>nota2</td>
        </tr>
      </tbody>
      <tfoot>
        <tr>
          <th>Inasistencias</th>
          <th>#</th> 
          <th>#</th>
          <th colspan="3"></th>
        </tr>
      </tfoot>
    </table>
  </div>
@endsection
