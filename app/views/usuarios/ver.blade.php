@extends('layouts.master')
 
@section('sidebar')
     @parent
     Información de Usuario
@stop
 
@section('content')
        {{ HTML::link('usuarios', 'Volver'); }}
        <h1>
  Perfil {{$usuario->id}}
      
</h1>
    {{ $usuario->nombre.' '.$usuario->apellidos }}<br>
    {{ $usuario->sexo}}<br>
    {{ $usuario->email}}<br>    
    {{ $usuario->password}}
        
<br />
        {{ $usuario->created_at}}
@stop