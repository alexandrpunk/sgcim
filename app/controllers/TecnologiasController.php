<?php 
use Illuminate\Database\Eloquent\ModelNotFoundException;
class TecnologiasController extends BaseController {

//llenado de la informacion tecnologia
    public function listarTecnologias()
    {
        $id = Auth::user()->id;
        $tecnologias = Tecnologia::where('id_cvu', '=', $id)->get();
        if($tecnologias){
            return View::make('cvu.list.tecnologia',array('tecnologias'=> $tecnologias));
        }
        else{
             return View::make('cvu.form.tecnologia');
        } 
    }
      
    public function agregarTecnologia(){
        return View::make('cvu.form.tecnologia');         
    }
    
    public function crearTecnologia(){
        $id_cvu = Auth::user()->id;
        $tecnologia = new Tecnologia;
        $tecnologia->id_cvu = $id_cvu;
        $tecnologia->nom_tec = Input::get('nom_tec');
        $tecnologia->desc_tec = Input::get('desc_tec');
        $tecnologia->save();
        return Redirect::to('cvu/tecnologias');
 
    }
    
    public function editarTecnologia($id){
        $tecnologia = Tecnologia::find($id);
        return View::make('cvu.form.tecnologia',array('tecnologia'=> $tecnologia));         
    }
    
    public function guardarTecnologia($id){
        $id_cvu = Auth::user()->id;
        $tecnologia = Tecnologia::find($id);
        $tecnologia->id_cvu = $id_cvu;
        $tecnologia->nom_tec = Input::get('nom_tec');
        $tecnologia->desc_tec = Input::get('desc_tec');
        $tecnologia->save();
        return Redirect::to('cvu/tecnologias');
        }

  
    
     public function borrarTecnologia($id){
    // en este método podemos observar como se recibe un parámetro llamado id
    // este es el id del usuario que se desea buscar y se debe declarar en la ruta como un parámetro 
    
        $tecnologia = Tecnologia::find($id);
        $tecnologia->delete();
        // para buscar al usuario utilizamos el metido find que nos proporciona Laravel 
    
    return Redirect::to('cvu/tecnologias');
    }
 
}