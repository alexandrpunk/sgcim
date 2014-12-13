<?php 
class Publicacion extends Eloquent { //Todos los modelos deben extender la clase Eloquent
        
    public function cvu(){
        return $this->belongsTo('CVU', 'id_cvu');
    }
    
    protected $table = 'Publicaciones';
    protected $fillable = array('id_cvu', 'nom_pub', 'tipo_pub', 'desc_pub');
}