@extends('layouts.app')

@section('content')
  <h3>Carregar Foto</h3>
  {!!Form::open(['action' => 'FotosController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data'])!!}
    {{Form::text('titulo', '', ['placeholder' => "Título da Foto"])}}
    {{Form::textarea('descricao', '', ['placeholder' => "Descrição da Foto"])}}
    {{Form::hidden('album_id', $album_id)}}
    {{Form::file('foto')}}
    {{Form::submit('submit')}}
  {!! Form::close() !!}
@endsection
