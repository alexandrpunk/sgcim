@extends('layouts.master')
@section('content')
<h3 class="nulink">Perfil del Usuario</h3>
<hr>
<div class="row">
        <div class="col-md-3">
             <img class="center-block thumbnail" src="http://placehold.it/200" style="margin-bottom:0;">
       </div>
        <div class="col-md-9">
            <dl style="margin-bottom:0; margin-left:10px;">
                <dt>Nombre:</dt>
                <dd> {{{$usuario->nombre.' '.$usuario->apellidos }}}</dd>
                <dt>Sexo:</dt>
                <dd> {{{$usuario->sexo}}}</dd>
                <dt>Email:</dt>
                <dd>{{{$usuario->email}}}</dd>
                <dt>perfil en la organizacion:</dt>
                <dd>{{{$usuario->perfil->nom_perfil}}}</dd>
                <dt>Fecha de registro:</dt>
                <dd>{{{$usuario->created_at}}}</dd>
            </dl>
       </div>
</div>
@stop