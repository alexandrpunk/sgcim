<?php 
use Illuminate\Database\Eloquent\ModelNotFoundException;
class ProyectosController extends BaseController {
    
        //validador de especialidades
    public function validarProyectos($input){
        $respuesta = array();
 
        $reglas =  array(
            'nom_proy'  => 'max:150'
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

//llenado de la informacion proyecto
    public function listarProyectos()
    {
        $proyectos = Proyecto::where('id_cvu', '=', Auth::user()->id)->get();
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
        $validar= $this->validarProyectos(Input::all());
        
        if($validar['error'] == true){
             return Redirect::to('cvu/proyectos/nuevo')->withErrors($validar['mensaje'])->withInput();
        }
        else{
        $proyecto = new Proyecto;
        $proyecto->id_cvu = Auth::user()->id;
        $proyecto->nom_proy = Input::get('nom_proy');
        $proyecto->desc_proy = Input::get('desc_proy');
        $proyecto->save();
        return Redirect::to('cvu/proyectos')->with('mensaje', $validar['mensaje']);
        }
 
    }
    
    public function editarProyecto($id){
        $proyecto = Proyecto::find($id);
        return View::make('cvu.form.proyecto',array('proyecto'=> $proyecto));         
    }
    
    public function guardarProyecto($id){
                $validar= $this->validarProyectos(Input::all());
        
        if($validar['error'] == true){
             return Redirect::to('cvu/proyectos/editar/'.$id)->withErrors($validar['mensaje'])->withInput();
        }
        else{ 
        $proyecto = Proyecto::find($id);
        $proyecto->nom_proy = Input::get('nom_proy');
        $proyecto->desc_proy = Input::get('desc_proy');
        $proyecto->save();
        return Redirect::to('cvu/proyectos')->with('mensaje', $validar['mensaje']);
        }
    }

  
    
     public function borrarProyecto($id){
    // en este método podemos observar como se recibe un parámetro llamado id
    // este es el id del usuario que se desea buscar y se debe declarar en la ruta como un parámetro 
    
        $proyecto = Proyecto::find($id);
        $proyecto->delete();
        // para buscar al usuario utilizamos el metido find que nos proporciona Laravel 
    
    return Redirect::to('cvu/proyectos')->with('info', $info="Se ha borrado la informacion con exito");
    }
 
}