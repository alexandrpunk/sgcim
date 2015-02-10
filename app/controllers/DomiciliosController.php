<?php 
use Illuminate\Database\Eloquent\ModelNotFoundException;
class DomiciliosController extends BaseController {

//validador de domicilios
    public function validarDomicilios($input){
        $respuesta = array();
 
        $reglas =  array(
            'nom_dom'  => 'max:100',
            'ciudad'  => 'max:150',
            'municipio'  => 'max:150',
            'estado'  => 'max:150',
            'pais'  => 'max:150'
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
        $validar= $this->validarDomicilios(Input::all());
        
        if($validar['error'] == true){
             return Redirect::to('cvu/domicilios/nuevo')->withErrors($validar['mensaje'])->withInput();
        }
        else{
        $domicilio = new Domicilio;
        $domicilio->id_cvu = Auth::user()->id;
        $domicilio->nom_dom = Input::get('nom_dom');
        $domicilio->domicilio = Input::get('domicilio');
        $domicilio->ciudad = Input::get('ciudad');
        $domicilio->municipio = Input::get('municipio');
        $domicilio->estado = Input::get('estado');
        $domicilio->pais = Input::get('pais');
        $domicilio->save();
        return Redirect::to('cvu/domicilios')->with('mensaje', $validar['mensaje']);
        }
 
    }
    
    public function editarDomicilio($id){
        $domicilio = Domicilio::find($id);
        return View::make('cvu.form.domicilio',array('domicilio'=> $domicilio));         
    }
    
    public function guardarDomicilio($id){
                $validar= $this->validarDomicilios(Input::all());
        
        if($validar['error'] == true){
             return Redirect::to('cvu/domicilios/editar/'.$id)->withErrors($validar['mensaje'])->withInput();
        }
        else{
        $domicilio = Domicilio::find($id);
        $domicilio->nom_dom = Input::get('nom_dom');
        $domicilio->domicilio = Input::get('domicilio');
        $domicilio->ciudad = Input::get('ciudad');
        $domicilio->municipio = Input::get('municipio');
        $domicilio->estado = Input::get('estado');
        $domicilio->pais = Input::get('pais');
        $domicilio->save();
        return Redirect::to('cvu/domicilios')->with('mensaje', $validar['mensaje']);
        }
    }

  
    
     public function borrarDomicilio($id){
    // en este método podemos observar como se recibe un parámetro llamado id
    // este es el id del usuario que se desea buscar y se debe declarar en la ruta como un parámetro 
    
        $domicilio = Domicilio::find($id);
        $domicilio->delete();
        // para buscar al usuario utilizamos el metido find que nos proporciona Laravel 
    
    return Redirect::to('cvu/domicilios')->with('info', $info="Se ha borrado la informacion con exito");
    }
 
}