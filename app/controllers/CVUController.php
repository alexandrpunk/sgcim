<?php 
use Illuminate\Database\Eloquent\ModelNotFoundException;
class CVUController extends BaseController {
 

    public function editarcvu()
    {
        
        return View::make('cvu.editar');
        
    }

    
//llenado de la informacion personal
    public function listarPersonal()
    {
        $id = Auth::user()->id;
        $perfil = Auth::user()->perfil->nom_perfil;
        if(Personal::find($id)){
            $personal = Personal::find($id);
            return View::make('cvu.list.personal',array('personal'=> $personal))->with('perfil', $perfil);
        }
        else{
             return View::make('cvu.form.personal');
        }
        
    }
 

    public function llenarPersonal()
    {
        $id = Auth::user()->id;
        if(Personal::find($id)){
            
        $personal = Personal::find($id);
        $personal->fec_nac = Input::get('fec_nac');
        $personal->edad = Input::get('edad');
        $personal->curp = Input::get('curp');
        $personal->rfc = Input::get('rfc');
        $personal->disp_horario = Input::get('disp_horario');
        $personal->viajar = Input::get('viajar');
        $personal->save();
           
        }
        else{
        $personal = new Personal;
        $personal->id = $id;
        $personal->fec_nac = Input::get('fec_nac');
        $personal->edad = Input::get('edad');
        $personal->curp = Input::get('curp');
        $personal->rfc = Input::get('rfc');
        $personal->disp_horario = Input::get('disp_horario');
        $personal->viajar = Input::get('viajar');
        $personal->save();          
        }

        return Redirect::to('cvu/personal');
 
    }
    
        public function editarPersonal()
    {
        $id = Auth::user()->id;
        if(Personal::find($id)){
            
        $personal = Personal::find($id);
        return View::make('cvu.form.personal',array('personal'=> $personal));
           
        }
        else{
            return View::make('cvu.form.personal');
        }
 
    }
 
 
}