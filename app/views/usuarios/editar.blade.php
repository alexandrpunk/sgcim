@extends('layouts.master')
 
@section('content')
<h3 class="nulink"><a href="{{URL::to('usuario');}}" title="Regresar" class="small text-primary"><i class="glyphicon glyphicon glyphicon-chevron-left"></i>&nbsp;</a>Modifique su informacion personal</h3>
<hr>

    {{ Form::open(array('url' => '', 'autocomplete'=>'off')) }}

        
    <div class="row">
        <div class="col-md-3">
        <div class="form-group">
        <center>{{Form::label('photo', 'Fotografia del Usuario')}}</center>
        <img class="center-block thumbnail" src="http://placehold.it/170">
        {{ Form::file('photo', array('data-filename-placement'=>'inside', 'title'=>'Subir imagen de perfil', 'class'=>'btn btn-primary btn-xs btn-block center-block')) }}
        <p class="help-block small text-justify">El tamaño maximo de la imagen no debe exeder los 400 px x 400 px y no debe pesa mas de 2Mb</p>
        </div>
        </div>

        <div class="col-md-9">
            <div class="form-group">
            {{Form::label('nombre', 'Nombre')}}
            {{Form::text('nombre', Input::old('nombre'), array('class'=>'form-control', 'placeholder'=>'Ingrese su(s) Nombre(s)', 'autocomplete'=>'off'))}} 
            </div>
            
            <div class="form-group">
            {{Form::label('apellidos', 'Apellidos')}}
            {{Form::text('apellidos', Input::old('apellidos'), array('class'=>'form-control', 'placeholder'=>'Ingrese sus Apellidos', 'autocomplete'=>'off'))}} 
            </div>
            
            <div class="form-group">
            {{Form::label('email', 'Correo Electronico')}}
            {{Form::text('curp', Input::old('curp'), array('class'=>'form-control', 'placeholder'=>'Ingrese su Correo electronico', 'autocomplete'=>'off', 'maxlength'=>'18'))}} 
            </div>
            

            <div class="form-group">
            {{Form::label('sexo', 'Sexo')}}
            {{ Form::select('sexo', ['h' => 'Hombre', 'm' => 'Mujer'],Input::old('sexo'), ['class' => 'form-control']) }}
            </div>
                
            <div class="form-group">
            {{Form::label('perfil', 'Perfil en la organizacion')}}
            {{ Form::select('perfil', ['h' => 'Hombre', 'm' => 'Mujer'],Input::old('sexo'), ['class' => 'form-control']) }}
            </div> 
            </div>
            

        </div>
        
    {{Form::submit('Guardar', array('class'=>'btn btn-primary btn-block'))}}


           
        {{ Form::close() }}

@stop