<?php 
use Illuminate\Database\Eloquent\ModelNotFoundException;
class EscuelasController extends BaseController {

//llenado de la informacion escuela
    public function listarEscuelas()
    {
        $id = Auth::user()->id;
        $escuelas = Escuela::where('id_cvu', '=', $id)->get();
        if($escuelas){
            return View::make('cvu.list.escuela',array('escuelas'=> $escuelas));
        }
        else{
             return View::make('cvu.form.escuela');
        } 
    }
      
    public function agregarEscuela(){
        return View::make('cvu.form.escuela');         
    }
    
    public function crearEscuela(){
        $id_cvu = Auth::user()->id;
        $escuela = new Escuela;
        $escuela->id_cvu = $id_cvu;
        $escuela->nom_esc = Input::get('nom_esc');
        $escuela->nivel_esc = Input::get('nivel_esc');
        $escuela->save();
        return Redirect::to('cvu/escuelas');
 
    }
    
    public function editarEscuela($id){
        $escuela = Escuela::find($id);
        return View::make('cvu.form.escuela',array('escuela'=> $escuela));         
    }
    
    public function guardarEscuela($id){
        $id_cvu = Auth::user()->id;
        $escuela = Escuela::find($id);
        $escuela->id_cvu = $id_cvu;
        $escuela->nom_esc = Input::get('nom_esc');
        $escuela->nivel_esc = Input::get('nivel_esc');
        $escuela->save();
        return Redirect::to('cvu/escuelas');
        }

  
    
     public function borrarEscuela($id){
    // en este método podemos observar como se recibe un parámetro llamado id
    // este es el id del usuario que se desea buscar y se debe declarar en la ruta como un parámetro 
    
        $escuela = Escuela::find($id);
        $escuela->delete();
        // para buscar al usuario utilizamos el metido find que nos proporciona Laravel 
    
    return Redirect::to('cvu/escuelas');
    }
 
}