<?php 
use Illuminate\Database\Eloquent\ModelNotFoundException;
class PublicacionesController extends BaseController {
    
    public function validarPublicaciones($input){
        $respuesta = array();
 
        $reglas =  array(
            'nom_pub'  => 'max:150',
            'tipo_pub'  => 'max:45'
        );
        
        $validator = Validator::make($input, $reglas);
        
        if (
            $validator->fails()){
            $respuesta['mensaje'] = $validator;
            $respuesta['error']   = true;
        }else{                           
            $respuesta['mensaje'] = 'La informacion se a guardado con exito';
            $respuesta['error']   = false;
        }
        
        return $respuesta; 
    }

//llenado de la informacion publicacion
    public function listarPublicaciones()
    {
        $publicaciones = Publicacion::where('id_cvu', '=', Auth::user()->id)->get();
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
        $validar= $this->validarPublicaciones(Input::all());
        
        if($validar['error'] == true){
             return Redirect::to('cvu/publicaciones/nuevo')->withErrors($validar['mensaje'])->withInput();
        }
        else{
        $publicacion = new Publicacion;
        $publicacion->id_cvu =  Auth::user()->id;
        $publicacion->nom_pub = Input::get('nom_pub');
        $publicacion->tipo_pub = Input::get('tipo_pub');
        $publicacion->desc_pub = Input::get('desc_pub');
        $publicacion->save();
        return Redirect::to('cvu/publicaciones')->with('mensaje', $validar['mensaje']);
        }
 
    }
    
    public function editarPublicacion($id){
        $publicacion = Publicacion::find($id);
        return View::make('cvu.form.publicacion',array('publicacion'=> $publicacion));         
    }
    
    public function guardarPublicacion($id){
        $validar= $this->validarPublicaciones(Input::all());
        
        if($validar['error'] == true){
             return Redirect::to('cvu/publicaciones/editar/'.$id)->withErrors($validar['mensaje'])->withInput();
        }
        else{
        $publicacion = Publicacion::find($id);
        $publicacion->id_cvu = Auth::user()->id;
        $publicacion->nom_pub = Input::get('nom_pub');
        $publicacion->tipo_pub = Input::get('tipo_pub');
        $publicacion->desc_pub = Input::get('desc_pub');
        $publicacion->save();
        return Redirect::to('cvu/publicaciones')->with('mensaje', $validar['mensaje']);
        }
    }

  
    
     public function borrarPublicacion($id){
    // en este método podemos observar como se recibe un parámetro llamado id
    // este es el id del usuario que se desea buscar y se debe declarar en la ruta como un parámetro 
    
        $publicacion = Publicacion::find($id);
        $publicacion->delete();
        // para buscar al usuario utilizamos el metido find que nos proporciona Laravel 
    
    return Redirect::to('cvu/publicaciones')->with('info', $info="Se ha borrado la informacion con exito");
     }
 
}