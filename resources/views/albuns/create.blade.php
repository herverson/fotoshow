@extends('layouts.app')

@section('content')
  <h3>Criar Album</h3>
  {!!Form::open(['action' => 'AlbunsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data'])!!}
    {{Form::text('nome', '', ['placeholder' => "Nome do Album"])}}
    {{Form::textarea('descricao', '', ['placeholder' => "Descrição do Album"])}}
    {{Form::file('cover_image')}}
    {{Form::submit('submit')}}
  {!! Form::close() !!}
@endsection
