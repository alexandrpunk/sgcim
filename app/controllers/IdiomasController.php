<?php 
use Illuminate\Database\Eloquent\ModelNotFoundException;
class IdiomasController extends BaseController {

//llenado de la informacion idioma
    public function listarIdiomas()
    {
        $id = Auth::user()->id;
        $idiomas = Idioma::where('id_cvu', '=', $id)->get();
        if($idiomas){
            return View::make('cvu.list.idioma',array('idiomas'=> $idiomas));
        }
        else{
             return View::make('cvu.form.idioma');
        } 
    }
      
    public function agregarIdioma(){
        return View::make('cvu.form.idioma');         
    }
    
    public function crearIdioma(){
        $id_cvu = Auth::user()->id;
        $idioma = new Idioma;
        $idioma->id_cvu = $id_cvu;
        $idioma->idioma = Input::get('idioma');
        $idioma->certificacion = Input::get('certificacion');
        $idioma->nivel = Input::get('nivel');
        $idioma->save();
        return Redirect::to('cvu/idiomas');
 
    }
    
    public function editarIdioma($id){
        $idioma = Idioma::find($id);
        return View::make('cvu.form.idioma',array('idioma'=> $idioma));         
    }
    
    public function guardarIdioma($id){
        $id_cvu = Auth::user()->id;
        $idioma = Idioma::find($id);
        $idioma->id_cvu = $id_cvu;
        $idioma->idioma = Input::get('idioma');
        $idioma->certificacion = Input::get('certificacion');
        $idioma->nivel = Input::get('nivel');
        $idioma->save();
        return Redirect::to('cvu/idiomas');
        }

  
    
     public function borrarIdioma($id){
    // en este método podemos observar como se recibe un parámetro llamado id
    // este es el id del usuario que se desea buscar y se debe declarar en la ruta como un parámetro 
    
        $idioma = Idioma::find($id);
        $idioma->delete();
        // para buscar al usuario utilizamos el metido find que nos proporciona Laravel 
    
    return Redirect::to('cvu/idiomas');
    }
 
}