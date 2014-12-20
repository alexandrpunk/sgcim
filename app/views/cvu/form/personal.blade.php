@extends('layouts.master')
 
@section('content')
<h3>Ingrese sus datos personales</h3>
<hr>
@if(isset($personal))
    {{Form::model($personal, array('url' => 'cvu/personal/guardar', 'autocomplete'=>'off'))}}
@else 
    {{ Form::open(array('url' => 'cvu/personal/guardar', 'autocomplete'=>'off')) }}
@endif
        
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
            {{Form::label('fec_nac', 'Fecha de Nacimiento')}}
            <div class="input-group date">
                <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>{{ Form::text('fec_nac', null, array('type' => 'text', 'class' => 'form-control datepicker','placeholder' => 'yyyy-mm-dd', 'id' => 'calendar')) }}                  </div>     
            </div >

        </div>
        
        <div class="col-md-4">
            <div class="form-group">
            {{Form::label('edad', 'Edad')}}
            {{Form::number('edad', Input::old('edad'), array('class'=>'form-control', 'placeholder'=>'Ingrese su edad', 'autocomplete'=>'off', 'min'=>'10', 'max'=>'100'))}} 
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
            {{Form::label('viajar', '¿Estaria dispuesto a viajar?')}}
            <select class="form-control" name="viajar">
				<option value="si">Si</option>
                <option value="no">No</option>
			</select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
            
            {{Form::label('curp', 'CURP')}}
            {{Form::text('curp', Input::old('curp'), array('class'=>'form-control', 'placeholder'=>'Ingrese su CURP', 'autocomplete'=>'off'))}} 

            </div >
        </div>
        <div class="col-md-4">
            <div class="form-group">
            {{Form::label('rfc', 'RFC')}}
            {{Form::text('rfc', Input::old('rfc'), array('class'=>'form-control', 'placeholder'=>'Ingrese su RFC', 'autocomplete'=>'off'))}} 
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
            {{Form::label('disp_horario', 'Disponibilidad de Horario')}}
            {{Form::text('disp_horario', Input::old('disp_horario'), array('class'=>'form-control', 'placeholder'=>'Ingrese su disponibilidad de Horario', 'autocomplete'=>'off'))}} 
            </div>
        </div>
    </div> 
            
@if(isset($personal))
   {{Form::submit('Guardar', array('class'=>'btn btn-success'))}}
@else
    {{Form::submit('Guardar', array('class'=>'btn btn-success'))}}
    {{Form::reset('Resetear', array('class'=>'btn btn-default'))}}
@endif
           
        {{ Form::close() }}

@stop