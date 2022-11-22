<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chamado extends Model
{
    protected $table = 'chamados';
    protected $fillable = ['assunto','descricao','arquivo','setor_id','usuario_id','tipo_id','data'];

  public function usuario(){
        return $this->belongsTo('App\User');
  }

  public function setor(){
        return $this->belongsTo('App\Setor');
  }

  public function tipo(){
    return $this->belongsTo('App\Tipo');
  }
    
  public function status(){
    return $this->belongsTo('App\Statu');
    }
}
