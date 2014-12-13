<?php 
class Especialidad extends Eloquent { //Todos los modelos deben extender la clase Eloquent
        
    public function cvu(){
        return $this->belongsTo('CVU', 'id_cvu');
    }
    
    protected $table = 'Especialidades';
    protected $fillable = array('id_cvu', 'nom_esp', 'desc_esp');
}