<?php 

Route::get('/',array('uses' => 'AuthController@showLogin'));

// Authentication
Route::get('login', array('uses' => 'AuthController@showLogin'));
Route::post('login', 'AuthController@postLogin');
Route::get('logout', 'AuthController@getLogout');

//
//PERFILES
//
//lista todos los perfiles
Route::get('perfiles', array('uses' => 'PerfilesController@mostrarPerfiles'));
//muestra el formulario de creacion de perfiles
Route::get('perfiles/nuevo', array('uses' => 'PerfilesController@nuevoPerfil'));
 //envia los datos del formulario de creacion de perfil
Route::post('perfiles/crear', array('uses' => 'PerfilesController@crearPerfil'));
//muestra el perfil especificado por el id
Route::get('perfiles/{id}', array('uses'=>'PerfilesController@verPerfil'));
//borra el perfil especificado en el id
Route::get('perfiles/borrar/{id}', array('uses'=>'PerfilesController@borrarPerfil'));

//
//Usuarios
//
//se muestran los usuarios existentes
Route::get('usuarios', array('uses' => 'UsuariosController@mostrarUsuarios'));
//muestra el formulario para crear un usuario
Route::get('usuarios/nuevo', array('uses' => 'UsuariosController@nuevoUsuario'));
//envia los datos del formulario para crear un usario nuevo
Route::post('usuarios/crear', array('uses' => 'UsuariosController@crearUsuario'));
//muestra un usuario especificado por su id
Route::get('usuarios/{id}', array('uses'=>'UsuariosController@verUsuario'));
//borra al usuario especificado por el id
Route::get('usuarios/borrar/{id}', array('uses'=>'UsuariosController@borrarUsuario'));

//
//rutas del cvu
//
Route::get('cvu', array('uses' => 'CVUController@editarcvu'));

//
//datos personales
//se muestran los datos personales existentes
Route::get('cvu/personal', array('uses' => 'CVUController@listarPersonal'));
//muestra el formulario para llenar datos persoanles
Route::get('cvu/personal/editar', array('uses' => 'CVUController@editarPersonal'));
//envia los datos del formulario para crear un usario nuevo
Route::post('cvu/personal/guardar', array('uses' => 'CVUController@llenarPersonal'));

//
//domicilios
//
Route::get('cvu/domicilios', array('uses' => 'DomiciliosController@listarDomicilios'));
//muestra el formulario para editar los domicilios existentes
Route::get('cvu/domicilios/editar/{id}', array('uses' => 'DomiciliosController@editarDomicilio'));
//muestra el formulario para agregar un domicilio nuevo
Route::get('cvu/domicilios/nuevo', array('uses' => 'DomiciliosController@agregarDomicilio'));
//envia los datos del formulario para crear un domcilio nuevo
Route::post('cvu/domicilios/nuevo/crear', array('uses' => 'DomiciliosController@crearDomicilio'));
//guarda la informacion de un domicilio editado
Route::post('cvu/domicilios/editar/guardar/{id}', array('uses' => 'DomiciliosController@guardarDomicilio'));
Route::get('cvu/domicilios/borrar/{id}', array('uses'=>'DomiciliosController@borrarDomicilio'));

//
//escuelas
//
Route::get('cvu/escuelas', array('uses' => 'EscuelasController@listarEscuelas'));
//muestra el formulario para editar los domicilios existentes
Route::get('cvu/escuelas/editar/{id}', array('uses' => 'EscuelasController@editarEscuela'));
//muestra el formulario para agregar un domicilio nuevo
Route::get('cvu/escuelas/nuevo', array('uses' => 'EscuelasController@agregarEscuela'));
//envia los datos del formulario para crear un domcilio nuevo
Route::post('cvu/escuelas/nuevo/crear', array('uses' => 'EscuelasController@crearEscuela'));
//guarda la informacion de un domicilio editado
Route::post('cvu/escuelas/editar/guardar/{id}', array('uses' => 'EscuelasController@guardarEscuela'));
Route::get('cvu/escuelas/borrar/{id}', array('uses'=>'EscuelasController@borrarEscuela'));

//
//titulos
//
Route::get('cvu/titulos', array('uses' => 'TitulosController@listarTitulos'));
//muestra el formulario para editar los domicilios existentes
Route::get('cvu/titulos/editar/{id}', array('uses' => 'TitulosController@editarTitulo'));
//muestra el formulario para agregar un domicilio nuevo
Route::get('cvu/titulos/nuevo', array('uses' => 'TitulosController@agregarTitulo'));
//envia los datos del formulario para crear un domcilio nuevo
Route::post('cvu/titulos/nuevo/crear', array('uses' => 'TitulosController@crearTitulo'));
//guarda la informacion de un domicilio editado
Route::post('cvu/titulos/editar/guardar/{id}', array('uses' => 'TitulosController@guardarTitulo'));
Route::get('cvu/titulos/borrar/{id}', array('uses'=>'TitulosController@borrarTitulo'));

//
//espesialidades
//
Route::get('cvu/especialidades', array('uses' => 'EspecialidadesController@listarEspecialidades'));
//muestra el formulario para editar los domicilios existentes
Route::get('cvu/especialidades/editar/{id}', array('uses' => 'EspecialidadesController@editarEspecialidad'));
//muestra el formulario para agregar un domicilio nuevo
Route::get('cvu/especialidades/nuevo', array('uses' => 'EspecialidadesController@agregarEspecialidad'));
//envia los datos del formulario para crear un domcilio nuevo
Route::post('cvu/especialidades/nuevo/crear', array('uses' => 'EspecialidadesController@crearEspecialidad'));
//guarda la informacion de un domicilio editado
Route::post('cvu/especialidades/editar/guardar/{id}', array('uses' => 'EspecialidadesController@guardarEspecialidad'));
Route::get('cvu/especialidades/borrar/{id}', array('uses'=>'EspecialidadesController@borrarEspecialidad'));

//
//cursos
//
Route::get('cvu/cursos', array('uses' => 'CursosController@listarCursos'));
//muestra el formulario para editar los domicilios existentes
Route::get('cvu/cursos/editar/{id}', array('uses' => 'CursosController@editarCurso'));
//muestra el formulario para agregar un domicilio nuevo
Route::get('cvu/cursos/nuevo', array('uses' => 'CursosController@agregarCurso'));
//envia los datos del formulario para crear un domcilio nuevo
Route::post('cvu/cursos/nuevo/crear', array('uses' => 'CursosController@crearCurso'));
//guarda la informacion de un domicilio editado
Route::post('cvu/cursos/editar/guardar/{id}', array('uses' => 'CursosController@guardarCurso'));
Route::get('cvu/cursos/borrar/{id}', array('uses'=>'CursosController@borrarCurso'));


//
//publicaciones
//
Route::get('cvu/publicaciones', array('uses' => 'PublicacionesController@listarPublicaciones'));
//muestra el formulario para editar los domicilios existentes
Route::get('cvu/publicaciones/editar/{id}', array('uses' => 'PublicacionesController@editarPublicacion'));
//muestra el formulario para agregar un domicilio nuevo
Route::get('cvu/publicaciones/nuevo', array('uses' => 'PublicacionesController@agregarPublicacion'));
//envia los datos del formulario para crear un domcilio nuevo
Route::post('cvu/publicaciones/nuevo/crear', array('uses' => 'PublicacionesController@crearPublicacion'));
//guarda la informacion de un domicilio editado
Route::post('cvu/publicaciones/editar/guardar/{id}', array('uses' => 'PublicacionesController@guardarPublicacion'));
Route::get('cvu/publicaciones/borrar/{id}', array('uses'=>'PublicacionesController@borrarPublicacion'));

//
//tecnologias
//
Route::get('cvu/tecnologias', array('uses' => 'TecnologiasController@listarTecnologias'));
//muestra el formulario para editar los domicilios existentes
Route::get('cvu/tecnologias/editar/{id}', array('uses' => 'TecnologiasController@editarTecnologia'));
//muestra el formulario para agregar un domicilio nuevo
Route::get('cvu/tecnologias/nuevo', array('uses' => 'TecnologiasController@agregarTecnologia'));
//envia los datos del formulario para crear un domcilio nuevo
Route::post('cvu/tecnologias/nuevo/crear', array('uses' => 'TecnologiasController@crearTecnologia'));
//guarda la informacion de un domicilio editado
Route::post('cvu/tecnologias/editar/guardar/{id}', array('uses' => 'TecnologiasController@guardarTecnologia'));
Route::get('cvu/tecnologias/borrar/{id}', array('uses'=>'TecnologiasController@borrarTecnologia'));

//
//idiomas
//
Route::get('cvu/idiomas', array('uses' => 'IdiomasController@listarIdiomas'));
//muestra el formulario para editar los domicilios existentes
Route::get('cvu/idiomas/editar/{id}', array('uses' => 'IdiomasController@editarIdioma'));
//muestra el formulario para agregar un domicilio nuevo
Route::get('cvu/idiomas/nuevo', array('uses' => 'IdiomasController@agregarIdioma'));
//envia los datos del formulario para crear un domcilio nuevo
Route::post('cvu/idiomas/nuevo/crear', array('uses' => 'IdiomasController@crearIdioma'));
//guarda la informacion de un domicilio editado
Route::post('cvu/idiomas/editar/guardar/{id}', array('uses' => 'IdiomasController@guardarIdioma'));
Route::get('cvu/idiomas/borrar/{id}', array('uses'=>'IdiomasController@borrarIdioma'));

//
//proyectos
//
Route::get('cvu/proyectos', array('uses' => 'ProyectosController@listarProyectos'));
//muestra el formulario para editar los domicilios existentes
Route::get('cvu/proyectos/editar/{id}', array('uses' => 'ProyectosController@editarProyecto'));
//muestra el formulario para agregar un domicilio nuevo
Route::get('cvu/proyectos/nuevo', array('uses' => 'ProyectosController@agregarProyecto'));
//envia los datos del formulario para crear un domcilio nuevo
Route::post('cvu/proyectos/nuevo/crear', array('uses' => 'ProyectosController@crearProyecto'));
//guarda la informacion de un domicilio editado
Route::post('cvu/proyectos/editar/guardar/{id}', array('uses' => 'ProyectosController@guardarProyecto'));
Route::get('cvu/proyectos/borrar/{id}', array('uses'=>'ProyectosController@borrarProyecto'));

//
//proyectos
//
Route::get('cvu/trabajos', array('uses' => 'TrabajosController@listarTrabajos'));
//muestra el formulario para editar los domicilios existentes
Route::get('cvu/trabajos/editar/{id}', array('uses' => 'TrabajosController@editarTrabajo'));
//muestra el formulario para agregar un domicilio nuevo
Route::get('cvu/trabajos/nuevo', array('uses' => 'TrabajosController@agregarTrabajo'));
//envia los datos del formulario para crear un domcilio nuevo
Route::post('cvu/trabajos/nuevo/crear', array('uses' => 'TrabajosController@crearTrabajo'));
//guarda la informacion de un domicilio editado
Route::post('cvu/trabajos/editar/guardar/{id}', array('uses' => 'TrabajosController@guardarTrabajo'));
Route::get('cvu/trabajos/borrar/{id}', array('uses'=>'TrabajosController@borrarTrabajo'));
