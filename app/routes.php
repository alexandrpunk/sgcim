<?php 

Route::get('/',array('uses' => 'AuthController@showLogin'));

// Authentication
Route::get('login', array('as' => 'login', 'uses' => 'AuthController@showLogin'));
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

Route::get('principal',function(){

        return View::make('layouts.master');}

);