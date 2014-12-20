<?php 
use Illuminate\Database\Eloquent\ModelNotFoundException;
class DomiciliosController extends BaseController {

//llenado de la informacion domicilio
    public function listarDomicilios()
    {
        $id = Auth::user()->id;
        $domicilios = Domicilio::where('id_cvu', '=', $id)->get();
        if($domicilios){
            return View::make('cvu.list.domicilio',array('domicilios'=> $domicilios));
        }
        else{
             return View::make('cvu.form.domicilio');
        } 
    }
      
    public function agregarDomicilio(){
        return View::make('cvu.form.domicilio');         
    }
    public function crearDomicilio(){
        $id_cvu = Auth::user()->id;
        $domicilio = new Domicilio;
        $domicilio->id_cvu = $id_cvu;
        $domicilio->nom_dom = Input::get('nom_dom');
        $domicilio->domicilio = Input::get('domicilio');
        $domicilio->ciudad = Input::get('ciudad');
        $domicilio->municipio = Input::get('municipio');
        $domicilio->estado = Input::get('estado');
        $domicilio->pais = Input::get('pais');
        $domicilio->save();
        return Redirect::to('cvu/domicilios');
 
    }
    
    public function editarDomicilio($id){
        $domicilio = Domicilio::find($id);
        return View::make('cvu.form.domicilio',array('domicilio'=> $domicilio));         
    }
    
    public function guardarDomicilio($id){
        $id_cvu = Auth::user()->id;
        $domicilio = Domicilio::find($id);
        $domicilio->id_cvu = $id_cvu;
        $domicilio->nom_dom = Input::get('nom_dom');
        $domicilio->domicilio = Input::get('domicilio');
        $domicilio->ciudad = Input::get('ciudad');
        $domicilio->municipio = Input::get('municipio');
        $domicilio->estado = Input::get('estado');
        $domicilio->pais = Input::get('pais');
        $domicilio->save();
        return Redirect::to('cvu/domicilios');
        }

  
    
     public function borrarDomicilio($id){
    // en este método podemos observar como se recibe un parámetro llamado id
    // este es el id del usuario que se desea buscar y se debe declarar en la ruta como un parámetro 
    
        $domicilio = Domicilio::find($id);
        $domicilio->delete();
        // para buscar al usuario utilizamos el metido find que nos proporciona Laravel 
    
    return Redirect::to('cvu/domicilios');
    }
 
}