<?php 
class Telefono extends Eloquent { //Todos los modelos deben extender la clase Eloquent
        
    public function cvu(){
        return $this->belongsTo('CVU', 'id_cvu');
    }
    
    protected $table = 'Telefonos';
    protected $fillable = array('id_cvu', 'lada', 'telefono', 'tipo');
}