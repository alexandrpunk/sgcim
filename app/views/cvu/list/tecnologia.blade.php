@extends('layouts.master') 
@section('content')
<h3>Tecnologias</h3>
<hr>

<dl>
@foreach($tecnologias as $tecnologia)
<dt class="text-uppercase">{{$tecnologia->nom_tec}}</dt>
<dd>{{$tecnologia->desc_tec}}</dd><br>
<div class="form-group">
{{ HTML::link( 'cvu/tecnologias/editar/'.$tecnologia->id , 'Editar', array('class'=>'btn btn-xs btn-info')) }}
{{ HTML::link( 'cvu/tecnologias/borrar/'.$tecnologia->id , 'Borrar', array('class'=>'btn btn-xs btn-danger')) }}
</div>
<hr>
@endforeach
</dl>

{{ HTML::link('cvu/tecnologias/nuevo', 'agregar una tecnologia', array('class'=>'btn btn-primary btn-block')); }}

@stop