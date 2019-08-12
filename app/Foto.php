<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    protected $fillable = array('album_id', 'descricao', 'foto', 'titulo', 'tamanho');

    public function album()
    {
      return $this->belongsTo('App\Album');
    }
}
