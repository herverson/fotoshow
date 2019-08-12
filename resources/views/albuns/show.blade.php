@extends('layouts.app')

@section('content')
  <h1>{{$album->nome}}</h1>
  <a class="button secondary" href="/">Voltar</a>
  <a class="button" href="/fotos/create/{{$album->id}}">Carregar foto para o Album</a>
  <hr>
  @if(count($album->fotos) > 0)
    <?php
      $colcount = count($album->fotos);
  	  $i = 1;
    ?>
    <div id="fotos">
      <div class="row text-center">
        @foreach($album->fotos as $foto)
          @if($i == $colcount)
             <div class='small-4 columns end'>
               <a href="/fotos/{{$foto->id}}">
                  <img class="thumbnail" src="/storage/fotos/{{$foto->album_id}}/{{$foto->foto}}" alt="{{$foto->titulo}}">
                </a>
               <br>
               <h4>{{$foto->titulo}}</h4>
          @else
          <a href="/fotos/{{$foto->id}}">
             <img class="thumbnail" src="/storage/fotos/{{$foto->album_id}}/{{$foto->foto}}" alt="{{$foto->titulo}}">
           </a>
          <br>
          <h4>{{$foto->titulo}}</h4>
          @endif
        	@if($i % 3 == 0)
          </div></div><div class="row text-center">
        	@else
            </div>
          @endif
        	<?php $i++; ?>
        @endforeach
      </div>
    </div>
  @else
    <p>Nenhuma Foto</p>
  @endif
@endsection
