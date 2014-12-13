@extends('layouts.master')
 
@section('sidebar')
     @parent
     Lista de Usarios
@stop
 
@section('content')
        <h1>
  Usuarios
      
    
  
</h1>
        {{ HTML::link('usuarios/nuevo', 'Crear Usuario'); }}
 
<ul>
  @foreach($usuarios as $usuario)
    <li>
    {{ HTML::link( 'usuarios/'.$usuario->id , $usuario->nombre.' - '.$usuario->apellidos ) }} ~ {{ HTML::link( 'usuarios/borrar/'.$usuario->id ,'Borrar') }}
  </li>
          @endforeach
  </ul>
@stop