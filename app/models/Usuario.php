<?php 

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Usuario extends Eloquent implements UserInterface, RemindableInterface { //Todos los modelos deben extender la clase Eloquent
    
    use UserTrait, RemindableTrait;
        
    public function perfil(){
        return $this->belongsTo('Perfil', 'id_perfil');
    }
    
    protected $table = 'Usuarios';
    protected $hidden = array('password', 'remember_token');
    protected $fillable = array('nombre', 'apellidos', 'sexo', 'email', 'password', 'id_perfil');
    
    
}