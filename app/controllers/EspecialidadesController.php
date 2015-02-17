<?php 
use Illuminate\Database\Eloquent\ModelNotFoundException;
class EspecialidadesController extends BaseController {
    
    //validador de especialidades
    public function validarEspecialidades($input){
        $respuesta = array();
 
        $reglas =  array(
            'nom_esp'  => 'max:150'
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

//llenado de la informacion especialidad
    public function listarEspecialidades()
    {
        $especialidades = Especialidad::where('id_cvu', '=',  Auth::user()->id)->get();
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
        $validar= $this->validarEspecialidades(Input::all());
        
        if($validar['error'] == true){
             return Redirect::to('cvu/especialidades/nuevo')->withErrors($validar['mensaje'])->withInput();
        }
        else{ 
        $especialidad = new Especialidad;
        $especialidad->id_cvu = Auth::user()->id;
        $especialidad->nom_esp = Input::get('nom_esp');
        $especialidad->desc_esp = Input::get('desc_esp');
        $especialidad->save();
        return Redirect::to('cvu/especialidades')->with('mensaje', $validar['mensaje']);
        }
 
    }
    
    public function editarEspecialidad($id){
        $especialidad = Especialidad::find($id);
        return View::make('cvu.form.especialidad',array('especialidad'=> $especialidad));         
    }
    
    public function guardarEspecialidad($id){
        $validar= $this->validarEspecialidades(Input::all());
        
        if($validar['error'] == true){
             return Redirect::to('cvu/especialidades/editar/'.$id)->withErrors($validar['mensaje'])->withInput();
        }
        else{ 
        $especialidad = Especialidad::find($id);
        $especialidad->nom_esp = Input::get('nom_esp');
        $especialidad->desc_esp = Input::get('desc_esp');
        $especialidad->save();
        return Redirect::to('cvu/especialidades')->with('mensaje', $validar['mensaje']);
        }
    }

  
    
     public function borrarEspecialidad($id){
    // en este método podemos observar como se recibe un parámetro llamado id
    // este es el id del usuario que se desea buscar y se debe declarar en la ruta como un parámetro 
    
        $especialidad = Especialidad::find($id);
        $especialidad->delete();
        // para buscar al usuario utilizamos el metido find que nos proporciona Laravel 
    
    return Redirect::to('cvu/especialidades')->with('info', $info="Se ha borrado la informacion con exito");
    }
 
}