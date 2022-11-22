<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'cadastros';
    protected $fillable = ['id','nome', 'email', 'senha','usuario_tipo_id'];
    
    public function usuario(){
        return $this->hasOne('App\Usuario_Tipos','id', 'usuario_tipo_id');
    }
}
