@extends('layouts.master')
 
@section('content')
<h2>Usuarios</h2>
        {{ HTML::link('usuarios/nuevo', 'Crear Usuario'); }}
 
<ul>
  @foreach($usuarios as $usuario)
    <li>
    {{ HTML::link( 'usuarios/'.$usuario->id , $usuario->nombre.' - '.$usuario->apellidos ) }} ~ {{ HTML::link( 'usuarios/borrar/'.$usuario->id ,'Borrar') }}
  </li>
          @endforeach
  </ul>
@stop