<?php 
class Tecnologia extends Eloquent { //Todos los modelos deben extender la clase Eloquent
        
    public function cvu(){
        return $this->belongsTo('CVU', 'id_cvu');
    }
    
    protected $table = 'Domtec';
    protected $fillable = array('id_cvu', 'nom_tec', 'desc_tec');
}