<?php 
use Illuminate\Database\Eloquent\ModelNotFoundException;
class ValidacionController extends BaseController{
        
protected $reglas =  array();
    
    public function validar($input){
    $respuesta = array();

    $validator = Validator::make($input, $this->reglas);   
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
  
}