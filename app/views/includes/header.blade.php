    <!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top shadow" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="index.php">
                    <img class="navbar-brand" src="img/logo.svg">
                </a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">{{ HTML::link('principal', 'Home') }}</li>
                    <li>{{ HTML::link('usuarios', 'Usuarios') }}</li>
                    <li>{{ HTML::link('perfiles', 'Perfiles') }}</li>
                    <li>{{ HTML::link('logout', 'Cerrar Sesion') }}</li>
      
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </div>