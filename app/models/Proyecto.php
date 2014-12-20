<?php 
class Proyecto extends Eloquent { //Todos los modelos deben extender la clase Eloquent
        
    public function cvu(){
        return $this->belongsTo('CVU', 'id_cvu');
    }
    
    protected $table = 'Histproy';
    protected $fillable = array('id_cvu', 'nom_proy', 'desc_proy');
}