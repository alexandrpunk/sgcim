<?php 
class Documento extends Eloquent { //Todos los modelos deben extender la clase Eloquent
        
    public function cvu(){
        return $this->belongsTo('CVU', 'id_cvu');
    }
    
    protected $table = 'Documentos';
    protected $fillable = array('id_cvu', 'nom_documento', 'dir_documento');
}