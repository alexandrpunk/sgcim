<!DOCTYPE html>
<html lang="es">
<head>
@include('includes.head')    
</head>

<body>

    @if ( Auth::guest())
    <center><img class="logo" src="/img/logo.svg"></center>
        <div class="container">  
            <div class="well">
                @yield('content')   
            </div>
            
        </div>   
    @else
    @include('includes.header') 
    <div class="container">
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

</body>
</html>
