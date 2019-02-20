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

            <h2 style="min-height:45px;margin:2px 0 3px 0;font-size: 2em;">
                Fecha nacmiento: {{$actors->data_naixement}}
            </h2>

            <h1 style="min-height:45px;margin:2px 0 3px 0;font-size: 2em;">
                Nacionalidad: {{$actors->nacionalitat}}
            </h1><br>

            

            <a type="button" href="{{url('/actors/editActor/'.$actors->id)}}" class="btn btn-warning">Editar Actor</a>


            <form action="{{action('ActorsController@deleteActor', $actors->id)}}" 
			    method="POST" style="display:inline">
			    {{ method_field('DELETE') }}
			    {{ csrf_field() }}
			    <button type="submit" class="btn btn-danger" style="display:inline">
			        Eliminar Actor
			    </button>
			</form>



            <a type="button" href="{{url('/actors/indexActors')}}" class="btn btn-default">Volver al listado</a>



	    </div>
	</div>

@stop