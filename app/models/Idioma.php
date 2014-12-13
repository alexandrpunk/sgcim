<?php 
class Idioma extends Eloquent { //Todos los modelos deben extender la clase Eloquent
        
    public function cvu(){
        return $this->belongsTo('CVU', 'id_cvu');
    }
    
    protected $table = 'Domidioma';
    protected $fillable = array('id_cvu', 'idioma', 'certificion', 'nivel');
}