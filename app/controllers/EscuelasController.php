<?php 
use Illuminate\Database\Eloquent\ModelNotFoundException;
class EscuelasController extends BaseController {
    
    public function validarEscuelas($input){
        $respuesta = array();
 
        $reglas =  array(
            'nom_esc'  => 'max:100',
            'nivel_esc' => 'max:40'
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
        $validar= $this->validarEscuelas(Input::all());
        
        if($validar['error'] == true){
             return Redirect::to('cvu/escuelas/nuevo')->withErrors($validar['mensaje'])->withInput();
        }
        else{
        $escuela = new Escuela;
        $escuela->id_cvu = Auth::user()->id;
        $escuela->nom_esc = Input::get('nom_esc');
        $escuela->nivel_esc = Input::get('nivel_esc');
        $escuela->save();
        return Redirect::to('cvu/escuelas')->with('mensaje', $validar['mensaje']);
        }
 
    }
    
    public function editarEscuela($id){
        $escuela = Escuela::find($id);
        return View::make('cvu.form.escuela',array('escuela'=> $escuela));         
    }
    
    public function guardarEscuela($id){
        $validar= $this->validarEscuelas(Input::all());
        
        if($validar['error'] == true){
             return Redirect::to('cvu/escuelas/editar/'.$id)->withErrors($validar['mensaje'])->withInput();
        }
        else{
        $id_cvu = Auth::user()->id;
        $escuela = Escuela::find($id);
        $escuela->id_cvu = $id_cvu;
        $escuela->nom_esc = Input::get('nom_esc');
        $escuela->nivel_esc = Input::get('nivel_esc');
        $escuela->save();
        return Redirect::to('cvu/escuelas')->with('mensaje', $validar['mensaje']);
        }
    }

  
    
     public function borrarEscuela($id){
    // en este método podemos observar como se recibe un parámetro llamado id
    // este es el id del usuario que se desea buscar y se debe declarar en la ruta como un parámetro 
    
        $escuela = Escuela::find($id);
        $escuela->delete();
        // para buscar al usuario utilizamos el metido find que nos proporciona Laravel 
    
    return Redirect::to('cvu/escuelas')->with('info', $info="Se ha borrado la informacion con exito");
    }
 
}