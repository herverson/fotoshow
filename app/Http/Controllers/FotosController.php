<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Foto;

class FotosController extends Controller
{
    public function create($album_id)
    {
      return view('fotos.create')->with('album_id', $album_id);
    }

    public function store(Request $request)
    {
      $this->validate($request, [
        'titulo' => 'required',
        'foto' => 'image|max:1999'
      ]);
      // nome do arquivo com a extensão
      $nomearquivoComExt = $request->file('foto')->getClientOriginalName();
      // apenas o nome do arquivo
      $nomearquivo = pathinfo($nomearquivoComExt, PATHINFO_FILENAME);
      // extensão
      $extensao = $request->file('foto')->getClientOriginalExtension();
      // criar um novo Nome
      $nomearquivoParaSalvar = $nomearquivo.'_'.time().'.'.$extensao;
      // upload imagem
      $path = $request->file('foto')->storeAs('public/fotos/'.$request->input('album_id'), $nomearquivoParaSalvar);

      // criar imagem
      $foto = new Foto;
      $foto->album_id = $request->input('album_id');
      $foto->titulo = $request->input('titulo');
      $foto->descricao = $request->input('descricao');
      $foto->tamanho = $request->file('foto')->getClientSize();
      $foto->foto = $nomearquivoParaSalvar;

      $foto->save();

      return redirect('/albuns/'.$request->input('album_id'))->with('success', 'Foto Criada');
    }

    public function show($id)
    {
      $foto = Foto::find($id);
      return view('fotos.show')->with('foto', $foto);
    }

    public function destroy($id)
    {
      $foto = Foto::find($id);

      if (Storage::delete('public/fotos/'.$foto->album_id.'/'.$foto->foto))
      {
        $foto->delete();

        return redirect('/')->with('success', 'Foto excluída');
      }
    }
}
