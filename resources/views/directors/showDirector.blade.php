@extends('layouts.master')

@section('content')

	<div class="row">

	    <div class="col-sm-4">

	       	<img src="{{$director->imagenDirector}}" style="height:33em;width: 23em"/>


	    </div>
	    <div class="col-sm-8">

	        <h1 style="min-height:45px;margin:5px 0 10px 0;font-size: 4em;">
                {{$director->nom_director}}
            </h1>

            <p style="font-size: 18px;"><strong>
                Fecha nacimiento:</strong> {{$director->data_naixement}}
            </p>

            <p style="font-size: 18px;"><strong>
                Nacionalidad:</strong> {{$director->nacionalitat}}
			</p>

			<p id="puntFinal"style="font-size: 18px;"><Strong>Peliculas dirigidas:</Strong>

					@foreach($movies as $movie)

						<?php
						$idDirector = $director->id;
						$idDire = $movie->id_director;
						?>
							@if ($idDirector == $idDire)
								
							<a href="{{ url('/catalog/show/' . $movie->id ) }}">{{$movie->title}}</a>,

							@endif
					@endforeach
			</p>

            
			<a class="btn btn-warning" href="{{ url('/directors/editDirector/'.$director->id) }}"><span class="glyphicon glyphicon-pencil"></span>Editar Director</a>

            <form action="{{action('DirectorsController@deleteDirector', $director->id)}}" 
			    method="POST" style="display:inline">
			    {{ method_field('DELETE') }}
			    {{ csrf_field() }}
			    <button type="submit" class="btn btn-danger" style="display:inline">
			        Eliminar Director
			    </button>
			</form>

			<a class="btn btn-default" href="{{ url('/directors/indexDirectors') }}"><span class="glyphicon glyphicon-chevron-left"></span>Volver al listado</a>

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