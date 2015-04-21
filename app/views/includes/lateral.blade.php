<div class="well lateral-well">
               
<div class="media">
   <p class="nav-header text-center"><i class="small glyphicon glyphicon-user" aria-hidden="true"></i> Usuario</p>
  <div class="media-left">
      <img class="img-circle" style="border: 2px solid #31a463;" src="http://placehold.it/90" alt="display">
  </div>
  <div class="media-body media-middle">
  <h5 class="text-capitalize text-left"><strong>{{ HTML::link('/', Auth::user()->nombre.' '.Auth::user()->apellidos) }}</strong></h5>
      
<div class="form-group pull-left">
<a href="{{URL::to('usuario/editar');}}" class="label label-info label-as-badge"><i class="glyphicon glyphicon-edit" aria-hidden="true"></i>Editar</a>
<a href="{{URL::to('logout');}}" class="label label-danger label-as-badge"><i class="glyphicon glyphicon-log-out" aria-hidden="true"></i>Salir</a>
</div>
  
  </div>
</div>
              <ul class="nav nav-list">
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