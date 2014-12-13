<?php 
class Curso extends Eloquent { //Todos los modelos deben extender la clase Eloquent
        
    public function cvu(){
        return $this->belongsTo('CVU', 'id_cvu');
    }
    
    protected $table = 'Cursos';
    protected $fillable = array('id_cvu', 'nom_curso', 'desc_curso');
}