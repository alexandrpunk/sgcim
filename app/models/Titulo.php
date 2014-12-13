<?php 
class Titulo extends Eloquent { //Todos los modelos deben extender la clase Eloquent
        
    public function cvu(){
        return $this->belongsTo('CVU', 'id_cvu');
    }
    
    protected $table = 'Titulos';
    protected $fillable = array('id_cvu', 'nom_titulo', 'tipo_titulo', 'desc_titulo');
}