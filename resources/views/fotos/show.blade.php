@extends('layouts.app')

@section('content')
  <h3>{{$foto->titulo}}</h3>
  <p>{{$foto->descricao}}</p>
  <a href="/albuns/{{$foto->album_id}}">Voltar para a Galeria</a>
  <hr>
  <img src="/storage/fotos/{{$foto->album_id}}/{{$foto->foto}}" alt="{{$foto->titulo}}">
  <br><br>
  {!!Form::open(['action' => ['FotosController@destroy', $foto->id], 'method' => 'POST'])!!}
    {{Form::hidden('_method', 'DELETE')}}
    {{Form::submit('Excluir Foto', ['class' => 'button alert'])}}
  {!!Form::close()!!}
  <hr>
  <small>Tamanho: {{$foto->tamanho}}</small>
@endsection
