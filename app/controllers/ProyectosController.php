<?php 
use Illuminate\Database\Eloquent\ModelNotFoundException;
class ProyectosController extends BaseController {

//llenado de la informacion proyecto
    public function listarProyectos()
    {
        $id = Auth::user()->id;
        $proyectos = Proyecto::where('id_cvu', '=', $id)->get();
        if($proyectos){
            return View::make('cvu.list.proyecto',array('proyectos'=> $proyectos));
        }
        else{
             return View::make('cvu.form.proyecto');
        } 
    }
      
    public function agregarProyecto(){
        return View::make('cvu.form.proyecto');         
    }
    
    public function crearProyecto(){
        $id_cvu = Auth::user()->id;
        $proyecto = new Proyecto;
        $proyecto->id_cvu = $id_cvu;
        $proyecto->nom_proy = Input::get('nom_proy');
        $proyecto->desc_proy = Input::get('desc_proy');
        $proyecto->save();
        return Redirect::to('cvu/proyectos');
 
    }
    
    public function editarProyecto($id){
        $proyecto = Proyecto::find($id);
        return View::make('cvu.form.proyecto',array('proyecto'=> $proyecto));         
    }
    
    public function guardarProyecto($id){
        $id_cvu = Auth::user()->id;
        $proyecto = Proyecto::find($id);
        $proyecto->id_cvu = $id_cvu;
        $proyecto->nom_proy = Input::get('nom_proy');
        $proyecto->desc_proy = Input::get('desc_proy');
        $proyecto->save();
        return Redirect::to('cvu/proyectos');
        }

  
    
     public function borrarProyecto($id){
    // en este método podemos observar como se recibe un parámetro llamado id
    // este es el id del usuario que se desea buscar y se debe declarar en la ruta como un parámetro 
    
        $proyecto = Proyecto::find($id);
        $proyecto->delete();
        // para buscar al usuario utilizamos el metido find que nos proporciona Laravel 
    
    return Redirect::to('cvu/proyectos');
    }
 
}