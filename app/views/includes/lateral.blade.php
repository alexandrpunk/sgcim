<div class="well lateral-well">
                <img class="img-circle center-block" src="http://placehold.it/150">
            <p class="text-center">Juan perez</p>
            <p class="text-center small">{{ HTML::link('logout', 'Cerrar Sesion') }}</p>
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