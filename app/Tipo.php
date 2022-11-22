<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    protected $table = 'chamado_tipos';
    protected $fillable = ['ds_tipo_chamado'];
}
