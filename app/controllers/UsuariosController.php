<?php 
class UsuariosController extends BaseController {
 
    /**
     * Mustra la lista con todos los usuarios
     */
    public function mostrarUsuarios()
    {
        $usuarios = Usuario::all(); 
        
        // Con el método all() le estamos pidiendo al modelo de Usuario
        // que busque todos los registros contenidos en esa tabla y los devuelva en un Array
        
        return View::make('usuarios.lista', array('usuarios' => $usuarios));
        
        // El método make de la clase View indica cual vista vamos a mostrar al usuario 
        //y también pasa como parámetro los datos que queramos pasar a la vista. 
        // En este caso le estamos pasando un array con todos los usuarios
    }
 
    /**
     * Muestra formulario para crear Usuario
     */
    public function nuevoUsuario()
    {
        $perfiles = Perfil::all();
        return View::make('usuarios.crear',array('perfiles'=> $perfiles));
    }
 
 
    /**
     * Crear el usuario nuevo
     */
    public function crearUsuario()
    {
            $registro = array(
            'nombre'    =>    Input::get('nombre'),
            'apellidos' =>    Input::get('apellidos'),
            'sexo'      =>    Input::get('sexo'),
            'email'     =>    Input::get('email'),
            'password'  =>    Hash::make(Input::get('password')),
            'id_perfil' =>    Input::get('perfil'),
        );
        Usuario::create($registro);
            
    // el método create nos permite crear un nuevo usuario en la base de datos, este método es proporcionado por Laravel
    // create recibe como parámetro un arreglo con datos de un modelo y los inserta automáticamente en la base de datos 
    // en este caso el arreglo es la información que viene desde un formulario y la obtenemos con el metido Input::all()
 
        return Redirect::to('usuarios');
    // el método redirect nos devuelve a la ruta de mostrar la lista de los usuarios
 
    }
 
     /**
     * Ver usuario con id
     */
    public function verUsuario($id)
    {
    // en este método podemos observar como se recibe un parámetro llamado id
    // este es el id del usuario que se desea buscar y se debe declarar en la ruta como un parámetro 
    
        $usuario = Usuario::find($id);
        // para buscar al usuario utilizamos el metido find que nos proporciona Laravel 
        // este método devuelve un objete con toda la información que contiene un usuario
        return View::make('usuarios.ver', array('usuario' => $usuario));
    }
    
    public function borrarUsuario($id)
    {
    // en este método podemos observar como se recibe un parámetro llamado id
    // este es el id del usuario que se desea buscar y se debe declarar en la ruta como un parámetro 
    
        $usuario = Usuario::find($id);
        $usuario->delete();
        // para buscar al usuario utilizamos el metido find que nos proporciona Laravel 
        // este método devuelve un objete con toda la información que contiene un usuario
    
    return Redirect::to('usuarios');
    }
 
}