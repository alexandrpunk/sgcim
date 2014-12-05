@extends('layouts.master')
 
@section('sidebar')
     @parent
     Lista de Perfiles
@stop
 
@section('content')
        <h1>
  Perfiles
      
    
  
</h1>
        {{ HTML::link('perfiles/nuevo', 'Crear Perfil'); }}
 
<ul>
  @foreach($perfiles as $perfil)
    <li>
    {{ HTML::link( 'perfiles/'.$perfil->id , $perfil->nom_perfil.' - '.$perfil->desc_perfil ) }} ~ {{ HTML::link( 'perfiles/borrar/'.$perfil->id ,'Borrar') }}
  </li>
          @endforeach
  </ul>
@stop