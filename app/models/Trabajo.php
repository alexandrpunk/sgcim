<?php 
class Trabajo extends Eloquent { //Todos los modelos deben extender la clase Eloquent
        
    public function cvu(){
        return $this->belongsTo('CVU', 'id_cvu');
    }
    
    protected $table = 'Trabajos';
    protected $fillable = array('id_cvu', 'nom_trabajo', 'jefe_trabajo', 'sigue_trabajo', 'tiempo_trabajo', 'desc_trabajo');
}