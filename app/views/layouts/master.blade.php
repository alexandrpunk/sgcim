<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Perfiles</title>
    <link rel="shortcut icon" href="">
		{{HTML::style('css/bootstrap.min.css')}}
            <style>
        @section('styles')
            body {
                padding-top: 60px;
            }
        @show
        </style>
</head>
    
</head>

<body>
            <!-- Navbar -->
        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <a class="navbar-brand" href="{{{ URL::to('') }}}">Markoptic</a>
                </div>
                <!-- Everything you want hidden at 940px or less, place within here -->
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">

                        @if ( Auth::guest())
                        <li>{{ HTML::link('', 'inicia sesion') }}</li>              
                        @else
                         <li>{{ HTML::link('usuarios', 'Usuarios') }}</li>
                         <li>{{ HTML::link('perfiles', 'Perfiles') }}</li>
                         <li>{{ HTML::link('logout', 'Cerrar Sesion') }}</li>
                        @endif
                    </ul> 
                </div>
            </div>
        </div> 
            

    <div class="container">
                    @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <h4>Success</h4>
                    {{{ $message }}}
                </div>
            @endif
        
    @show
        @yield('content')
        
    </div>

    {{HTML::script('js/jquery.min.js')}}
    {{HTML::script('js/bootstrap.min.js')}}

</body>
</html>
