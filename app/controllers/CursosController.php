<?php 
use Illuminate\Database\Eloquent\ModelNotFoundException;
class CursosController extends BaseController{
    
//validador de cursos
    public function validarCursos($input){
        $respuesta = array();
 
        $reglas =  array(
            'nom_curso'  => array('alpha','max:150'),
            'desc_curso'  => 'alpha_num'
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
    
    
     //llenado de la informacion curso
    public function listarCursos(){
        $id = Auth::user()->id;
        $cursos = Curso::where('id_cvu', '=', $id)->get();
        if($cursos){
            return View::make('cvu.list.curso',array('cursos'=> $cursos));
        }
        else{
             return View::make('cvu.form.curso');
        } 
    }
      
    public function agregarCurso(){
        return View::make('cvu.form.curso');         
    }
    
    public function crearCurso(){
        $validar= $this->validarCursos(Input::all());
        
        if($validar['error'] == true){
             return Redirect::to('cvu/cursos/nuevo')->withErrors($validar['mensaje'])->withInput();
        }
        else{
        $id_cvu = Auth::user()->id;
        $curso = new Curso;
        $curso->id_cvu = $id_cvu;
        $curso->nom_curso = Input::get('nom_curso');
        $curso->desc_curso = Input::get('desc_curso');
        $curso->save();
        return Redirect::to('cvu/cursos')->with('mensaje', $validar['mensaje']);
        }
 
    }
    
    public function editarCurso($id){
        $curso = Curso::find($id);
        return View::make('cvu.form.curso',array('curso'=> $curso));         
    }
    
    public function guardarCurso($id){
        $validar= $this->validarCursos(Input::all());
        
        if($validar['error'] == true){
             return Redirect::to('cvu/cursos/editar/'.$id)->withErrors($validar['mensaje'])->withInput();
        }
        else{ 
        $id_cvu = Auth::user()->id;
        $curso = Curso::find($id);
        $curso->id_cvu = $id_cvu;
        $curso->nom_curso = Input::get('nom_curso');
        $curso->desc_curso = Input::get('desc_curso');
        $curso->save();
        return Redirect::to('cvu/cursos')->with('mensaje', $validar['mensaje']);
        }

        }

  
    
     public function borrarCurso($id){
    // en este método podemos observar como se recibe un parámetro llamado id
    // este es el id del usuario que se desea buscar y se debe declarar en la ruta como un parámetro 
    
        $curso = Curso::find($id);
        $curso->delete();
        // para buscar al usuario utilizamos el metido find que nos proporciona Laravel 
    
    return Redirect::to('cvu/cursos');
    }    
    
}