<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
  protected $fillable = array('nome', 'descricao', 'cover_image');

    public function fotos()
    {
      return $this->hasMany('App\Foto');
    }
}
