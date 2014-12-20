<?php 
use Illuminate\Database\Eloquent\ModelNotFoundException;
class CursosController extends BaseController {

//llenado de la informacion curso
    public function listarCursos()
    {
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
        $id_cvu = Auth::user()->id;
        $curso = new Curso;
        $curso->id_cvu = $id_cvu;
        $curso->nom_curso = Input::get('nom_curso');
        $curso->desc_curso = Input::get('desc_curso');
        $curso->save();
        return Redirect::to('cvu/cursos');
 
    }
    
    public function editarCurso($id){
        $curso = Curso::find($id);
        return View::make('cvu.form.curso',array('curso'=> $curso));         
    }
    
    public function guardarCurso($id){
        $id_cvu = Auth::user()->id;
        $curso = Curso::find($id);
        $curso->id_cvu = $id_cvu;
        $curso->nom_curso = Input::get('nom_curso');
        $curso->desc_curso = Input::get('desc_curso');
        $curso->save();
        return Redirect::to('cvu/cursos');
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