<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statu extends Model
{
    protected $table = 'chamado_status';
    protected $fillable = ['ds_status_chamado'];
}
