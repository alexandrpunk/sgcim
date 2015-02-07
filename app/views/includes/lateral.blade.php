<div class="well lateral-well">
               
<div class="media">
  <div class="media-left ">
      <img class="img-circle" src="http://placehold.it/90" alt="display">
  </div>
  <div class="media-body media-middle ">
  <h5 class="text-capitalize"><strong>{{ HTML::link('/', Auth::user()->nombre.' '.Auth::user()->apellidos) }}</strong></h5>
      <h6 class="nulink"><strong>{{ HTML::link('logout', 'Cerrar Sesion') }}</strong></h6>
  </div>
</div>
              <ul class="nav nav-list">
                <li class="nav-divider"></li>
                <li class="nav-header"><i class="small glyphicon glyphicon-user" aria-hidden="true"></i> Perfil de usuario</li>
                <li>
                    <a href="#">
                        <i class="small glyphicon glyphicon-eye-open" aria-hidden="true"></i>&nbsp;&nbsp;Ver Perfil de Usuario
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="small glyphicon glyphicon-edit" aria-hidden="true"></i>&nbsp;&nbsp;Editar Perfil de Usuario
                    </a>
                </li>
                <li class="nav-divider"></li>
                <li class="nav-header">
                    <i class="small glyphicon glyphicon-list-alt" aria-hidden="true"></i> Curriculum</li>
                <li>
                    <a href="#">
                        <i class="small glyphicon glyphicon-eye-open" aria-hidden="true"></i>&nbsp;&nbsp;Ver Curriculum
                    </a>
                </li>
                <li>
                    <a href="{{URL::to('cvu');}}">
                        <i class="small glyphicon glyphicon-edit" aria-hidden="true"></i>&nbsp;&nbsp;Editar Curriculum
                    </a>
                </li>
                  <li>
                    <a href="#">
                        <i class="small glyphicon glyphicon-search" aria-hidden="true"></i>&nbsp;&nbsp;Buscar Curriculum
                    </a>
                </li>
              </ul>
            </div> <!-- /well -->