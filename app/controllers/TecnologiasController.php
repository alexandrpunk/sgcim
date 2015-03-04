<?php 
use Illuminate\Database\Eloquent\ModelNotFoundException;
class TecnologiasController extends BaseController {
    
 public function validarTecnologias($input){
        $respuesta = array();
 
        $reglas =  array(
            'nom_tec'  => 'max:150'
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
         $validar= $this->validarTecnologias(Input::all());
        
        if($validar['error'] == true){
             return Redirect::to('cvu/tecnologias/nuevo')->withErrors($validar['mensaje'])->withInput();
        }
        else{
        $tecnologia = new Tecnologia;
        $tecnologia->id_cvu = Auth::user()->id;
        $tecnologia->nom_tec = Input::get('nom_tec');
        $tecnologia->desc_tec = Input::get('desc_tec');
        $tecnologia->save();
        return Redirect::to('cvu/tecnologias')->with('mensaje', $validar['mensaje']);
        }
 
    }
    
    public function editarTecnologia($id){
        $tecnologia = Tecnologia::find($id);
        return View::make('cvu.form.tecnologia',array('tecnologia'=> $tecnologia));         
    }
    
    public function guardarTecnologia($id){
        $validar= $this->validarTecnologias(Input::all());
        
        if($validar['error'] == true){
             return Redirect::to('cvu/tecnologias/editar/'.$id)->withErrors($validar['mensaje'])->withInput();
        }
        else{ 
        $tecnologia = Tecnologia::find($id);
        $tecnologia->nom_tec = Input::get('nom_tec');
        $tecnologia->desc_tec = Input::get('desc_tec');
        $tecnologia->save();
        return Redirect::to('cvu/tecnologias')->with('mensaje', $validar['mensaje']);
        }
    }

  
    
     public function borrarTecnologia($id){
    // en este método podemos observar como se recibe un parámetro llamado id
    // este es el id del usuario que se desea buscar y se debe declarar en la ruta como un parámetro 
    
        $tecnologia = Tecnologia::find($id);
        $tecnologia->delete();
        // para buscar al usuario utilizamos el metido find que nos proporciona Laravel 
    
    return Redirect::to('cvu/tecnologias')->with('info', $info="Se ha borrado la informacion con exito");
    }
 
}