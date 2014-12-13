<?php 
class Domicilio extends Eloquent { //Todos los modelos deben extender la clase Eloquent
        
    public function cvu(){
        return $this->belongsTo('CVU', 'id_cvu');
    }
    
    protected $table = 'Domicilios';
    protected $fillable = array('id_cvu', 'domicilio', 'ciudad', 'municipio', 'estado', 'pais',);
}