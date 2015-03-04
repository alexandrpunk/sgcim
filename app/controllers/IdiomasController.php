<?php 
use Illuminate\Database\Eloquent\ModelNotFoundException;
class IdiomasController extends BaseController {

    public function validarIdiomas($input){
        $respuesta = array();
 
        $reglas =  array(
            'idioma'  => 'max:100',
            'certificacion'  => 'max:100',
            'nivel'  => array('numeric', 'max:100')
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
    

//llenado de la informacion idioma
    public function listarIdiomas()
    {
        $idiomas = Idioma::where('id_cvu', '=', Auth::user()->id)->get();
        if($idiomas){
            return View::make('cvu.list.idioma',array('idiomas'=> $idiomas));
        }
        else{
             return View::make('cvu.form.idioma');
        } 
    }
      
    public function agregarIdioma(){
        return View::make('cvu.form.idioma');         
    }
    
    public function crearIdioma(){
         $validar= $this->validarIdiomas(Input::all());
        
        if($validar['error'] == true){
             return Redirect::to('cvu/idiomas/nuevo')->withErrors($validar['mensaje'])->withInput();
        }
        else{
        $idioma = new Idioma;
        $idioma->id_cvu =Auth::user()->id;
        $idioma->idioma = Input::get('idioma');
        $idioma->certificacion = Input::get('certificacion');
        $idioma->nivel = Input::get('nivel');
        $idioma->save();
        return Redirect::to('cvu/idiomas')->with('mensaje', $validar['mensaje']);
        }
 
    }
    
    public function editarIdioma($id){
        $idioma = Idioma::find($id);
        return View::make('cvu.form.idioma',array('idioma'=> $idioma));         
    }
    
    public function guardarIdioma($id){
                 $validar= $this->validarIdiomas(Input::all());
        
        if($validar['error'] == true){
             return Redirect::to('cvu/idiomas/editar/'.$id)->withErrors($validar['mensaje'])->withInput();
        }
        else{
        $idioma = Idioma::find($id);
        $idioma->idioma = Input::get('idioma');
        $idioma->certificacion = Input::get('certificacion');
        $idioma->nivel = Input::get('nivel');
        $idioma->save();
        return Redirect::to('cvu/idiomas');
        }
    }

  
    
     public function borrarIdioma($id){
    // en este método podemos observar como se recibe un parámetro llamado id
    // este es el id del usuario que se desea buscar y se debe declarar en la ruta como un parámetro 
    
        $idioma = Idioma::find($id);
        $idioma->delete();
        // para buscar al usuario utilizamos el metido find que nos proporciona Laravel 
    
    return Redirect::to('cvu/idiomas')->with('info', $info="Se ha borrado la informacion con exito");
    }
 
}