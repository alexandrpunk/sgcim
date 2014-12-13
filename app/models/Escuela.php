<?php 
class Escuela extends Eloquent { //Todos los modelos deben extender la clase Eloquent
        
    public function cvu(){
        return $this->belongsTo('CVU', 'id_cvu');
    }
    
    protected $table = 'Escuelas';
    protected $fillable = array('id_cvu', 'nom_esc', 'nivel_esc');
}