@extends('layouts.master')
 
@section('sidebar')
     @parent
     Formulario de perfil
@stop
 
@section('content')
        {{ HTML::link('perfiles', 'volver'); }}
        <h1>
  Crear perfil
      
    
  
</h1>
        {{ Form::open(array('url' => 'perfiles/crear')) }}
            {{Form::label('nombre', 'Nombre del perfil')}}
            {{Form::text('nom_perfil', '')}}
            {{Form::label('descripcion', 'Descripcion del Perfil')}}
            {{Form::text('desc_perfil', '')}}
            {{Form::submit('Guardar')}}
        {{ Form::close() }}
@stop