<!DOCTYPE html>
<html lang="es">
<head>
@include('includes.head')    
</head>

<body>

    @if ( Auth::guest())
    <center><img class="logo" src="/img/logo.svg"></center>
    
        <div class="container"> 
            
            @if( $errors->has() )
            <div class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            @foreach($errors->all() as $error)
            * {{$error}}<br/>
            @endforeach
            </div>
            @elseif(Session::get('mensaje'))
            <div class="alert alert-success">
                 <a href="#" class="close" data-dismiss="alert">&times;</a>
                {{Session::get('mensaje')}}
            </div>
            @elseif(Session::get('info'))
            <div class="alert alert-info">
                 <a href="#" class="close" data-dismiss="alert">&times;</a>
                {{Session::get('info')}}
            </div>
            @endif
            
            <div class="well">
                @yield('content')   
            </div>
            
        </div>   
    @else
<div class="container">
<!-- Mensajes de error o exito, entonces los imprimimos y utilizamos algún estilo de bootstrap -->        
@if( $errors->has() )
<div class="alert alert-danger">
<a href="#" class="close" data-dismiss="alert">&times;</a>
@foreach($errors->all() as $error)
* {{$error}}<br/>
@endforeach
</div>
@elseif(Session::get('mensaje'))
<div class="alert alert-success">
     <a href="#" class="close" data-dismiss="alert">&times;</a>
    {{Session::get('mensaje')}}
</div>
@elseif(Session::get('info'))
<div class="alert alert-info">
     <a href="#" class="close" data-dismiss="alert">&times;</a>
    {{Session::get('info')}}
</div>
@endif

        
        <div class="row">
            <div class="col-md-3">
                @include('includes.lateral')   
            </div>
            <div class="col-md-9">
                <div class="well body-well">
                    @show
                    @yield('content')
                </div>
            </div>
        </div>
</div>
        
        
    
    @endif

    {{HTML::script('js/jquery.min.js')}}
    {{HTML::script('js/bootstrap.min.js')}}
    {{HTML::script('js/bootstrap-datepicker.js')}}
    {{HTML::script('js/script.js')}}
    {{HTML::script('js/bootstrap.file-input.js')}}

</body>
</html>
