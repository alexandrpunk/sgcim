<?php 
use Illuminate\Database\Eloquent\ModelNotFoundException;
class PublicacionesController extends BaseController {

//llenado de la informacion publicacion
    public function listarPublicaciones()
    {
        $id = Auth::user()->id;
        $publicaciones = Publicacion::where('id_cvu', '=', $id)->get();
        if($publicaciones){
            return View::make('cvu.list.publicacion',array('publicaciones'=> $publicaciones));
        }
        else{
             return View::make('cvu.form.publicacion');
        } 
    }
      
    public function agregarPublicacion(){
        return View::make('cvu.form.publicacion');         
    }
    
    public function crearPublicacion(){
        $id_cvu = Auth::user()->id;
        $publicacion = new Publicacion;
        $publicacion->id_cvu = $id_cvu;
        $publicacion->nom_pub = Input::get('nom_pub');
        $publicacion->tipo_pub = Input::get('tipo_pub');
        $publicacion->desc_pub = Input::get('desc_pub');
        $publicacion->save();
        return Redirect::to('cvu/publicaciones');
 
    }
    
    public function editarPublicacion($id){
        $publicacion = Publicacion::find($id);
        return View::make('cvu.form.publicacion',array('publicacion'=> $publicacion));         
    }
    
    public function guardarPublicacion($id){
        $id_cvu = Auth::user()->id;
        $publicacion = Publicacion::find($id);
        $publicacion->id_cvu = $id_cvu;
        $publicacion->nom_pub = Input::get('nom_pub');
        $publicacion->tipo_pub = Input::get('tipo_pub');
        $publicacion->desc_pub = Input::get('desc_pub');
        $publicacion->save();
        return Redirect::to('cvu/publicaciones');
        }

  
    
     public function borrarPublicacion($id){
    // en este método podemos observar como se recibe un parámetro llamado id
    // este es el id del usuario que se desea buscar y se debe declarar en la ruta como un parámetro 
    
        $publicacion = Publicacion::find($id);
        $publicacion->delete();
        // para buscar al usuario utilizamos el metido find que nos proporciona Laravel 
    
    return Redirect::to('cvu/publicaciones');
    }
 
}