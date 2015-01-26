@extends('layouts.master')

@section('title')
@parent
:: Login
@stop

{{-- Content --}}
@section('content')
    <div class="row ">
    <div class="col-md-5">
        <div class="panel panel-success">
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

            {{ Form::submit('Iniciar Sesion', array('class' => 'btn btn-primary btn-block'))}}
            {{ Form::close() }}
        </div>
    </div>
    </div>
    <div class="col-md-7">
        <p class="text-justify">Susana va a escribir un texto bonito y convincente aqui. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dignissim quam quis pellentesque tincidunt. Nullam molestie velit non neque ornare, quis fringilla dui cursus. Phasellus sed diam iaculis, suscipit nunc tincidunt, lacinia purus. Cras ornare sit amet augue nec aliquet. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Phasellus hendrerit vel lacus ac sagittis. Donec semper, metus et condimentum rhoncus, mi nisi consequat nulla, at mollis urna tortor et ipsum.</p>
            {{ HTML::link('usuarios/nuevo', 'Crear un nuevo usuario (integrate)', array('class'=>'btn btn-primary btn-block')); }}
    </div>
    </div> 

@stop