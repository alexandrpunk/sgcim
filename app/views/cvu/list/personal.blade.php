@extends('layouts.master')
 
@section('content')
<h3>Datos personales</h3>
<hr>
<dl>
  <dt>Fecha de Nacimiento</dt>
  <dd>{{$personal->fec_nac}}</dd>
    <dt>Edad</dt>
    <dd>{{$personal->edad}}</dd>
    <dt>C.U.R.P.</dt>
    <dd>{{$personal->curp}}</dd>
    <dt>R.F.C.</dt>
    <dd>{{$personal->rfc}}</dd>
    <dt>Disponibilidad de horario</dt>
    <dd>{{$personal->disp_horario}}</dd>
    <dt>Esta Dispuesto a viajar</dt>
    <dd>{{$personal->viajar}}</dd>
    <dt>Perfil</dt>
    <dd>{{$perfil}}</dd>
</dl>
{{ HTML::link('cvu/personal/editar', 'Editar la informacion personal', array('class'=>'btn btn-primary btn-block')); }}

@stop