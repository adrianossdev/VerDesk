<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setor extends Model
{
    protected $table = 'chamado_setores';
    protected $fillable = ['ds_setor_chamado'];
}
