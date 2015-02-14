<?php 
use Illuminate\Database\Eloquent\ModelNotFoundException;
class TitulosController extends BaseController {
    
    public function validarTitulos($input){
        $respuesta = array();
 
        $reglas =  array(
            'nom_titulo'  => 'max:150',
            'tipo_titulo' => 'max:45'
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
        

//llenado de la informacion titulo
    public function listarTitulos()
    {
        $titulos = Titulo::where('id_cvu', '=', Auth::user()->id)->get();
        if($titulos){
            return View::make('cvu.list.titulo',array('titulos'=> $titulos));
        }
        else{
             return View::make('cvu.form.titulo');
        } 
    }
      
    public function agregarTitulo(){
        return View::make('cvu.form.titulo');         
    }
    
    public function crearTitulo(){
         $validar= $this->validarTitulos(Input::all());
        
        if($validar['error'] == true){
             return Redirect::to('cvu/titulos/nuevo')->withErrors($validar['mensaje'])->withInput();
        }
        else{
        $titulo = new Titulo;
        $titulo->id_cvu = Auth::user()->id;
        $titulo->nom_titulo = Input::get('nom_titulo');
        $titulo->tipo_titulo = Input::get('tipo_titulo');
        $titulo->desc_titulo = Input::get('desc_titulo');
        $titulo->save();
        return Redirect::to('cvu/titulos')->with('mensaje', $validar['mensaje']);
        }
 
    }
    
    public function editarTitulo($id){
        $titulo = Titulo::find($id);
        return View::make('cvu.form.titulo',array('titulo'=> $titulo));         
    }
    
    public function guardarTitulo($id){
         $validar= $this->validarTitulos(Input::all());
        
        if($validar['error'] == true){
             return Redirect::to('cvu/titulos/editar/'.$id)->withErrors($validar['mensaje'])->withInput();
        }
        else{
        $titulo = Titulo::find($id);
        $titulo->nom_titulo = Input::get('nom_titulo');
        $titulo->tipo_titulo = Input::get('tipo_titulo');
        $titulo->desc_titulo = Input::get('desc_titulo');
        $titulo->save();
        return Redirect::to('cvu/titulos')->with('mensaje', $validar['mensaje']);
        }
    }

  

     public function borrarTitulo($id){
    // en este método podemos observar como se recibe un parámetro llamado id
    // este es el id del usuario que se desea buscar y se debe declarar en la ruta como un parámetro 
    
        $titulo = Titulo::find($id);
        $titulo->delete();
        // para buscar al usuario utilizamos el metido find que nos proporciona Laravel 
    
    return Redirect::to('cvu/titulos')->with('info', $info="Se ha borrado la informacion con exito");
    
    }
 
}