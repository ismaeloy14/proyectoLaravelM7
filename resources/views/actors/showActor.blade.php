@extends('layouts.master')

@section('content')

	<div class="row">

	    <div class="col-sm-4">

	        {{-- TODO: Imagen de la película --}}

	       	<img src="{{$actors->retrato}}" style="height:33em"/>


	    </div>
	    <div class="col-sm-8">

	        {{-- TODO: Datos de la película --}}

	        <h1 style="min-height:45px;margin:5px 0 10px 0;font-size: 4em;">
                {{$actors->nom_actor}}
            </h1>

            <p style="font-size: 18px;"><Strong>
                Fecha nacmiento:</Strong> {{$actors->data_naixement}}
            </p>

            <p style="font-size: 18px;"><Strong>
                Nacionalidad:</Strong> {{$actors->nacionalitat}}
            </p>

			<p id="puntFinal"style="font-size: 18px;"><Strong>Peliculas protagonizadas:</Strong>
			@foreach($ActorMovies as $ActorMovie)
					@foreach($movies as $movie)
						<?php
						$idActorPeli = $ActorMovie->id_movie;
						$idPeli = $movie->id
						?>
							@if ($idActorPeli == $idPeli)
								
								<a href="{{ url('/catalog/show/' . $movie->id ) }}">{{$movie->title}}</a>,
							@endif
					@endforeach
				@endforeach</p>
            
			<a class="btn btn-warning" href="{{ url('/actors/editActor/'.$actors->id) }}"><span class="glyphicon glyphicon-pencil"></span>Editar actor</a>
			
			
			


            <form action="{{action('ActorsController@deleteActor', $actors->id)}}" 
			    method="POST" style="display:inline">
			    {{ method_field('DELETE') }}
			    {{ csrf_field() }}
			    <button type="submit" class="btn btn-danger" style="display:inline">
			        Eliminar Actor
			    </button>
			</form>

			<a class="btn btn-default" href="{{ url('/actors/indexActors') }}"><span class="glyphicon glyphicon-chevron-left"></span>Volver al listado</a>



	    </div>
	</div>

	<script>
		
		var llistat = document.getElementById("puntFinal").innerHTML;
		var n = llistat.lastIndexOf(",");

		if (llistat.length > 54) {
			llistat = llistat.substring(0, n) +'.'+ llistat.substring(n + 1);
			document.getElementById("puntFinal").innerHTML = (llistat);
		} else {
			document.getElementById("puntFinal").innerHTML = llistat.substring(0, 55) + 'sin información.';
		}
		

	</script>



@stop