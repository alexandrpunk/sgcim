<?php 
use Illuminate\Database\Eloquent\ModelNotFoundException;
class TrabajosController extends ValidacionController {
    
 
        protected $reglas =  array(
            'lugar_trabajo'  => 'max:150',
            'puesto_trabajo' => 'max:415',
            'jefe_trabajo' => 'max:150',
            'sigue_trabajo' => 'max:2',
            'desc_trabajo' => 'max:150'
        );
        


//llenado de la informacion trabajo
    public function listarTrabajos(){
        $trabajos = Trabajo::where('id_cvu', '=', Auth::user()->id)->get();
        if($trabajos){
            return View::make('cvu.list.trabajo',array('trabajos'=> $trabajos));
        }
        else{
             return View::make('cvu.form.trabajo');
        } 
    }
      
    public function agregarTrabajo(){
        return View::make('cvu.form.trabajo');         
    }
    
    public function crearTrabajo(){
        $validar= $this->validar(Input::all());
        
        if($validar['error'] == true){
             return Redirect::to('cvu/trabajos/nuevo')->withErrors($validar['mensaje'])->withInput();
        }
        else{
            $trabajo = new Trabajo;
            $trabajo->id_cvu = Auth::user()->id;
            $trabajo->lugar_trabajo = Input::get('lugar_trabajo');
            $trabajo->puesto_trabajo = Input::get('puesto_trabajo');
            $trabajo->jefe_trabajo = Input::get('jefe_trabajo');
            $trabajo->sigue_trabajo = Input::get('sigue_trabajo');
            $trabajo->tiempo_trabajo = Input::get('tiempo_trabajo');
            $trabajo->desc_trabajo = Input::get('desc_trabajo');
            $trabajo->save();
            return Redirect::to('cvu/trabajos');
        }
 
    }
    
    public function editarTrabajo($id){
        $trabajo = Trabajo::find($id);
        return View::make('cvu.form.trabajo',array('trabajo'=> $trabajo));         
    }
    
    public function guardarTrabajo($id){
        $trabajo = Trabajo::find($id);
        $trabajo->lugar_trabajo = Input::get('lugar_trabajo');
        $trabajo->puesto_trabajo = Input::get('puesto_trabajo');
        $trabajo->jefe_trabajo = Input::get('jefe_trabajo');
        $trabajo->sigue_trabajo = Input::get('sigue_trabajo');
        $trabajo->tiempo_trabajo = Input::get('tiempo_trabajo');
        $trabajo->desc_trabajo = Input::get('desc_trabajo');
        $trabajo->save();
        return Redirect::to('cvu/trabajos');
        }

  
    
     public function borrarTrabajo($id){
    // en este método podemos observar como se recibe un parámetro llamado id
    // este es el id del usuario que se desea buscar y se debe declarar en la ruta como un parámetro 
    
        $trabajo = Trabajo::find($id);
        $trabajo->delete();
        // para buscar al usuario utilizamos el metido find que nos proporciona Laravel 
    
    return Redirect::to('cvu/trabajos');
    }
 
}