@extends('layouts.master')
 
@section('content')
<h3 class="nulink"><a href="{{URL::to('cvu/personal');}}" title="Regresar" class="small text-primary"><i class="glyphicon glyphicon glyphicon-chevron-left"></i>&nbsp;</a>Ingrese sus datos personales</h3>
<hr>
@if(isset($personal))
    {{Form::model($personal, array('url' => 'cvu/personal/guardar', 'autocomplete'=>'off'))}}
@else 
    {{ Form::open(array('url' => 'cvu/personal/guardar', 'autocomplete'=>'off')) }}
@endif
        
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
            {{Form::label('fec_nac', 'Fecha de Nacimiento', array('class' => 'small'))}}
            <div class="input-group date">
                <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>{{ Form::text('fec_nac', null, array('type' => 'text', 'class' => 'form-control input-sm datepicker','placeholder' => 'yyyy-mm-dd', 'id' => 'calendar')) }}                  </div>     
            </div >

        </div>
        
        <div class="col-md-3">
            <div class="form-group">
            {{Form::label('edad', 'Edad', array('class' => 'small'))}}
            {{Form::number('edad', Input::old('edad'), array('class'=>'form-control', 'placeholder'=>'Ingrese su edad', 'autocomplete'=>'off', 'max'=> '99'))}} 
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
            {{Form::label('viajar', '¿Estaria dispuesto a viajar?', array('class' => 'small'))}}
            {{ Form::select('viajar', ['si' => 'si', 'no' => 'no'],Input::old('conacyt'), ['class' => 'form-control']) }}
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
            {{Form::label('conacyt', '¿Tiene CVU del CONACYT?', array('class' => 'small'))}}
            {{ Form::select('conacyt', ['si' => 'si', 'no' => 'no'],Input::old('conacyt'), ['class' => 'form-control']) }}
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
            
            {{Form::label('curp', 'CURP', array('class' => 'small'))}}
            {{Form::text('curp', Input::old('curp'), array('class'=>'form-control', 'placeholder'=>'Ingrese su CURP', 'autocomplete'=>'off', 'maxlength'=>'18'))}} 

            </div >
        </div>
        <div class="col-md-4">
            <div class="form-group">
            {{Form::label('rfc', 'RFC', array('class' => 'small'))}}
            {{Form::text('rfc', Input::old('rfc'), array('class'=>'form-control', 'placeholder'=>'Ingrese su RFC', 'autocomplete'=>'off', 'maxlength'=>'13'))}} 
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
            {{Form::label('disp_horario', 'Disponibilidad de Horario', array('class' => 'small'))}}
            {{Form::text('disp_horario', Input::old('disp_horario'), array('class'=>'form-control', 'placeholder'=>'Ingrese su disponibilidad de Horario', 'autocomplete'=>'off'))}} 
            </div>
        </div>
    </div> 
            
@if(isset($personal))
   {{Form::submit('Guardar', array('class'=>'btn btn-primary'))}}
@else
    {{Form::submit('Guardar', array('class'=>'btn btn-primary'))}}
    {{Form::reset('Resetear', array('class'=>'btn btn-default'))}}
@endif
           
        {{ Form::close() }}

@stop