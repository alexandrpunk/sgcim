<?php 
use Illuminate\Database\Eloquent\ModelNotFoundException;
class TitulosController extends BaseController {

//llenado de la informacion titulo
    public function listarTitulos()
    {
        $id = Auth::user()->id;
        $titulos = Titulo::where('id_cvu', '=', $id)->get();
        if($titulos){
            return View::make('cvu.list.titulo',array('titulos'=> $titulos));
        }
        else{
             return View::make('cvu.form.titulo');
        } 
    }
      
    public function agregarTitulo(){
        return View::make('cvu.form.titulo');         
    }
    
    public function crearTitulo(){
        $id_cvu = Auth::user()->id;
        $titulo = new Titulo;
        $titulo->id_cvu = $id_cvu;
        $titulo->nom_titulo = Input::get('nom_titulo');
        $titulo->tipo_titulo = Input::get('tipo_titulo');
        $titulo->desc_titulo = Input::get('desc_titulo');
        $titulo->save();
        return Redirect::to('cvu/titulos');
 
    }
    
    public function editarTitulo($id){
        $titulo = Titulo::find($id);
        return View::make('cvu.form.titulo',array('titulo'=> $titulo));         
    }
    
    public function guardarTitulo($id){
        $id_cvu = Auth::user()->id;
        $titulo = Titulo::find($id);
        $titulo->id_cvu = $id_cvu;
        $titulo->nom_titulo = Input::get('nom_titulo');
        $titulo->tipo_titulo = Input::get('tipo_titulo');
        $titulo->desc_titulo = Input::get('desc_titulo');
        $titulo->save();
        return Redirect::to('cvu/titulos');
        }

  
    
     public function borrarTitulo($id){
    // en este método podemos observar como se recibe un parámetro llamado id
    // este es el id del usuario que se desea buscar y se debe declarar en la ruta como un parámetro 
    
        $titulo = Titulo::find($id);
        $titulo->delete();
        // para buscar al usuario utilizamos el metido find que nos proporciona Laravel 
    
    return Redirect::to('cvu/titulos');
    }
 
}