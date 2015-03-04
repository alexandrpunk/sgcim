<?php 
use Illuminate\Database\Eloquent\ModelNotFoundException;
class CVUController extends BaseController{
 

    public function editarcvu(){
        
        return View::make('cvu.cvu');
        
    }

    
//llenado de la informacion personal
    public function listarPersonal(){
        if(Personal::find(Auth::user()->id)){
            $personal = Personal::find(Auth::user()->id);
            return View::make('cvu.list.personal',array('personal'=> $personal))->with('perfil', Auth::user()->perfil->nom_perfil);
        }
        else{
             return View::make('cvu.form.personal');
        }
        
    }
    
    public function validarPersonal($input){
        $respuesta = array();
 
        $reglas =  array(
            'fec_nac' => 'date_format:"Y-m-d"',
            'edad' => array('numeric', 'max:99'),
            'curp' => array('alpha_num', 'max:18'),
            'rfc' => array('alpha_num', 'max:13'),
            'disp_horario' => 'max:45',
            'viajar' => array('alpha', 'max:2'),
            'conacyt' => array('alpha', 'max:2')
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

    public function llenarPersonal(){
        $validar= $this->validarPersonal(Input::all());

        if($validar['error'] == true){
             return Redirect::to('cvu/personal/editar')->withErrors($validar['mensaje'])->withInput();
        }
        else{        
        if(Personal::find(Auth::user()->id)){            
        $personal = Personal::find(Auth::user()->id);
        $personal->fec_nac = Input::get('fec_nac');
        $personal->edad = Input::get('edad');
        $personal->curp = Input::get('curp');
        $personal->rfc = Input::get('rfc');
        $personal->disp_horario = Input::get('disp_horario');
        $personal->viajar = Input::get('viajar');
        $personal->conacyt = Input::get('conacyt');
        $personal->save();
           
        }
        else{
        $personal = new Personal;
        $personal->id = Auth::user()->id;
        $personal->fec_nac = Input::get('fec_nac');
        $personal->edad = Input::get('edad');
        $personal->curp = Input::get('curp');
        $personal->rfc = Input::get('rfc');
        $personal->disp_horario = Input::get('disp_horario');
        $personal->viajar = Input::get('viajar');
        $personal->conacyt = Input::get('conacyt');
        $personal->save();          
        }

        return Redirect::to('cvu/personal')->with('mensaje', $validar['mensaje']);
        }
 
    }
    
        public function editarPersonal(){
        if(Personal::find(Auth::user()->id)){
            
        $personal = Personal::find(Auth::user()->id);
        return View::make('cvu.form.personal',array('personal'=> $personal));
           
        }
        else{
            return View::make('cvu.form.personal');
        }
 
    }
 
 
}