@extends('layouts.app')

@section('content')
  <h1>{{$album->nome}}</h1>
  <a class="button secondary" href="/">Voltar</a>
  <a class="button" href="/fotos/create/{{$album->id}}">Carregar foto para o Album</a>
  <hr>
@endsection
