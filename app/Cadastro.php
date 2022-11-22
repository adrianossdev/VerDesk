<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cadastro extends Model
{
    protected $table = 'cadastros';
    protected $fillable = ['id','nome', 'email', 'senha','usuario_tipo_id'];

}
