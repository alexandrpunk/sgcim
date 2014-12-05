<?php 
Route::get('/', function()
{
    return Redirect::to('perfiles');
});
 
Route::get('perfiles', array('uses' => 'PerfilesController@mostrarPerfiles'));
 
Route::get('perfiles/nuevo', array('uses' => 'PerfilesController@nuevoPerfil'));
 
Route::post('perfiles/crear', array('uses' => 'PerfilesController@crearPerfil'));
// esta ruta es a la cual apunta el formulario donde se introduce la información del usuario 
// como podemos observar es para recibir peticiones POST 
 
Route::get('perfiles/{id}', array('uses'=>'PerfilesController@verPerfil'));
// esta ruta contiene un parámetro llamado {id}, que sirve para indicar el id del usuario que deseamos buscar 
// este parámetro es pasado al controlador, podemos colocar todos los parámetros que necesitemos 
// solo hay que tomar en cuenta que los parámetros van entre llaves {}
// si el parámetro es opcional se colocar un signo de interrogación {parámetro?}
