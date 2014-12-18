<!DOCTYPE html>
<html lang="es">
<head>
@include('includes.head')    
</head>

<body>

    @if ( Auth::guest())

        <div class="container">
                <div class="alert alert-warning alert-block">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <h4>inicie sesion porfavor</h4>
                </div>
        </div>
        
                    @show
                        @yield('content')   
    
    @else
    @include('includes.header') 
    <div class="container">   
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <h4>Success</h4>
             {{{ $message }}}
            </div>
            @endif
    </div>
    <div class="container">
<div class="row">
    <div class="col-md-3">
        @include('includes.lateral')   
    </div>
    <div class="col-md-9">
        <div class="well">
            @show
            @yield('content')
        </div>
    </div>
</div>
</div>
        
        
    
    @endif

    {{HTML::script('js/jquery.min.js')}}
    {{HTML::script('js/bootstrap.min.js')}}
    {{HTML::script('js/script.js')}}

</body>
</html>
