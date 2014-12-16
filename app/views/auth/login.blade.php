@extends('layouts.master')

@section('title')
@parent
:: Login
@stop

{{-- Content --}}
@section('content')

<div class="container">
    <div class="col-md-6">
        <div class="panel panel-success bg-success">
            <div class="panel-heading">
                <div class="panel-title">Iniciar Sesion</div>
                 <div style="float:right; font-size: 90%; position: relative; top:-20px"><a class="text-success"  href="#">¿Olvide mi contraseña?</a></div>
            </div>
            <div class="panel-body ">
            {{ Form::open(array('url' => 'login', 'class' => 'form-horizontal', 'role' => 'form')) }}
    <!-- Name -->
    <div class="input-group" style="margin-bottom:10px">
            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
            {{ Form::text('email', Input::old('email'), array('class' => 'form-control', 'placeholder' => 'Correo Electronico')) }}
            {{ $errors->first('email') }}
    </div>

    <!-- Password -->
    <div class="input-group" style="margin-bottom:10px">
            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
            {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Contraseña')) }}
            {{ $errors->first('password') }}
    </div>
            <label>{{ Form::checkbox('recordar')}} Recordar mis datos</label>
                
    <!-- Login button -->

            {{ Form::submit('Iniciar Sesion', array('class' => 'btn btn-success btn-block'))}}
            {{ Form::close() }}
        </div>
    </div>
    </div>
    <div class="col-md-6">Mundo</div>
</div>

@stop