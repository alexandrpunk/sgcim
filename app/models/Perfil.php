<?php 
class Perfil extends Eloquent { //Todos los modelos deben extender la clase Eloquent
    protected $table = 'Perfiles';
    protected $fillable = array('nom_perfil', 'desc_perfil');
}