@extends('layouts.master')

@section('content')

	<div class="row">

	    <div class="col-sm-4">

	        {{-- TODO: Imagen de la película --}}

	       	<img src="{{$directors->imagenDirector}}" style="height:33em;width: 23em"/>


	    </div>
	    <div class="col-sm-8">

	        {{-- TODO: Datos de la película --}}

	        <h1 style="min-height:45px;margin:5px 0 10px 0;font-size: 4em;">
                {{$directors->nom_director}}
            </h1>

            <h2 style="min-height:45px;margin:2px 0 3px 0;font-size: 2em;">
                Fecha nacmiento: {{$directors->data_naixement}}
            </h2>

            <h1 style="min-height:45px;margin:2px 0 3px 0;font-size: 2em;">
                Nacionalidad: {{$directors->nacionalitat}}
            </h1><br>

            

            <a type="button" href="{{url('/directors/editDirector/'.$directors->id)}}" class="btn btn-warning">Editar Drector</a>


            <form action="{{action('DirectorsController@deleteDirector', $directors->id)}}" 
			    method="POST" style="display:inline">
			    {{ method_field('DELETE') }}
			    {{ csrf_field() }}
			    <button type="submit" class="btn btn-danger" style="display:inline">
			        Elminar Director
			    </button>
			</form>



            <a type="button" href="{{url('/directors/indexDirectors')}}" class="btn btn-default">Volver al listado</a>



	    </div>
	</div>

@stop