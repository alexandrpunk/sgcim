<?php 
class Personal extends Eloquent { //Todos los modelos deben extender la clase Eloquent
        
    public function usuario(){
        return $this->belongsTo('Usuario', 'id');
    }
    
    protected $table = 'CVU';
    protected $fillable = array('fec_nac', 'edad', 'curp', 'rfc', 'disp_horario', 'viajar');
}