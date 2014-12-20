<?php 
use Illuminate\Database\Eloquent\ModelNotFoundException;
class EspecialidadesController extends BaseController {

//llenado de la informacion especialidad
    public function listarEspecialidades()
    {
        $id = Auth::user()->id;
        $especialidades = Especialidad::where('id_cvu', '=', $id)->get();
        if($especialidades){
            return View::make('cvu.list.especialidad',array('especialidades'=> $especialidades));
        }
        else{
             return View::make('cvu.form.especialidad');
        } 
    }
      
    public function agregarEspecialidad(){
        return View::make('cvu.form.especialidad');         
    }
    
    public function crearEspecialidad(){
        $id_cvu = Auth::user()->id;
        $especialidad = new Especialidad;
        $especialidad->id_cvu = $id_cvu;
        $especialidad->nom_esp = Input::get('nom_esp');
        $especialidad->desc_esp = Input::get('desc_esp');
        $especialidad->save();
        return Redirect::to('cvu/especialidades');
 
    }
    
    public function editarEspecialidad($id){
        $especialidad = Especialidad::find($id);
        return View::make('cvu.form.especialidad',array('especialidad'=> $especialidad));         
    }
    
    public function guardarEspecialidad($id){
        $id_cvu = Auth::user()->id;
        $especialidad = Especialidad::find($id);
        $especialidad->id_cvu = $id_cvu;
        $especialidad->nom_esp = Input::get('nom_esp');
        $especialidad->desc_esp = Input::get('desc_esp');
        $especialidad->save();
        return Redirect::to('cvu/especialidades');
        }

  
    
     public function borrarEspecialidad($id){
    // en este método podemos observar como se recibe un parámetro llamado id
    // este es el id del usuario que se desea buscar y se debe declarar en la ruta como un parámetro 
    
        $especialidad = Especialidad::find($id);
        $especialidad->delete();
        // para buscar al usuario utilizamos el metido find que nos proporciona Laravel 
    
    return Redirect::to('cvu/especialidades');
    }
 
}