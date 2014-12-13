<?php 
class Perfil extends Eloquent { //Todos los modelos deben extender la clase Eloquent
        
    public function usuarios(){
        return $this->hasMany('Usuario', 'id_perfil');
    }
    
    protected $table = 'Perfiles';
    protected $fillable = array('nom_perfil', 'desc_perfil');
}