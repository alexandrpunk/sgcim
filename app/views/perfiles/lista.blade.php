@extends('layouts.master')
 
@section('content')
<h3>Crear perfil</h3>
<hr>

        {{ HTML::link('perfiles/nuevo', 'Crear Perfil'); }}
 
<ul>
  @foreach($perfiles as $perfil)
    <li>
    {{ HTML::link( 'perfiles/'.$perfil->id , $perfil->nom_perfil.' - '.$perfil->desc_perfil ) }} ~ {{ HTML::link( 'perfiles/borrar/'.$perfil->id ,'Borrar') }}
  </li>
          @endforeach
  </ul>
@stop