@extends('layouts.master')
 
@section('sidebar')
     @parent
     Información de perfil
@stop
 
@section('content')
        {{ HTML::link('perfiles', 'Volver'); }}
        <h1>
  Perfil {{$perfil->id}}
      
</h1>
        
        {{ $perfil->nom_perfil .' - '.$perfil->desc_perfil }}
        
<br />
        {{ $perfil->created_at}}
@stop