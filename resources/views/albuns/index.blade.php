@extends('layouts.app')

@section('content')
  @if(count($albuns) > 0)
    <?php
      $colcount = count($albuns);
  	  $i = 1;
    ?>
    <div id="albums">
      <div class="row text-center">
        @foreach($albuns as $album)
          @if($i == $colcount)
             <div class='small-4 columns end'>
               <a href="/albuns/{{$album->id}}">
                  <img class="thumbnail" src="storage/albuns_covers/{{$album->cover_image}}" alt="{{$album->nome}}">
                </a>
               <br>
               <h4>{{$album->nome}}</h4>
          @else
            <div class='medium-4 columns'>
              <a href="/albuns/{{$album->id}}">
                <img class="thumbnail" src="storage/albuns_covers/{{$album->cover_image}}" alt="{{$album->nome}}">
              </a>
              <br>
              <h4>{{$album->nome}}</h4>
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
    <p>Nenhum Album</p>
  @endif

@endsection
