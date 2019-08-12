<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;
class AlbunsController extends Controller
{
    public function index()
    {
      $albuns = Album::with('Fotos')->get();
      return view('albuns.index')->with('albuns', $albuns);
    }

    public function create()
    {
      return view('albuns.create');
    }

    public function store(Request $request)
    {
      $this->validate($request, [
        'nome' => 'required',
        'cover_image' => 'image|max:1999'
      ]);
      // nome do arquivo com a extensão
      $nomearquivoComExt = $request->file('cover_image')->getClientOriginalName();
      // apenas o nome do arquivo
      $nomearquivo = pathinfo($nomearquivoComExt, PATHINFO_FILENAME);
      // extensão
      $extensao = $request->file('cover_image')->getClientOriginalExtension();
      // criar um novo Nome
      $nomearquivoParaSalvar = $nomearquivo.'_'.time().'.'.$extensao;
      // upload imagem
      $path = $request->file('cover_image')->storeAs('public/albuns_covers', $nomearquivoParaSalvar);

      // criar Album
      $album = new Album;
      $album->nome = $request->input('nome');
      $album->descricao = $request->input('descricao');
      $album->cover_image = $nomearquivoParaSalvar;

      $album->save();

      return redirect('/albuns')->with('success', 'Album Criado');
    }

    public function show($id)
    {
      $album = Album::with('Fotos')->find($id);
      return view('albuns.show')->with('album', $album);
    }
}
