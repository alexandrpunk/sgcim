<?php 
class CVUController extends BaseController {
 
    /**
     * Mustra la lista con todos los usuarios
     */
    public function editarcvu()
    {
        
        return View::make('cvu.editar');
        
    }
 
    /*
     * Muestra formulario para crear Usuario
     */
    public function listarPersonal()
    {
        $id = Auth::user()->id;
        $perfil = Auth::user()->perfil->nom_perfil;
        $personal = Personal::find($id);
        return View::make('cvu.list.personal',array('personal'=> $personal))->with('perfil', $perfil);;
    }
 
 
    /**
     * Crear el usuario nuevo
     */
    public function llenarPersonal()
    {
        $personal = Personal::find($id);
        
        $personal->fec_nac = Input::get('fec_nac');
        $personal->edad = Input::get('edad');
        $personal->curp = Input::get('curp');
        $personal->rfc = Input::get('rfc');
        $personal->disp_horario = Input::get('horario');
        $personal->viajar = Input::get('viajar');
        
        $personal->save();
            

        return Redirect::to('cvu/personal');
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