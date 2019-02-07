@extends('layouts.master')

@section('content')

	<div class="row">

	    <div class="col-sm-4">

	        {{-- TODO: Imagen de la película --}}

	       	<img src="{{$pelicula->poster}}" style="height:33em"/>


	    </div>
	    <div class="col-sm-8">

	        {{-- TODO: Datos de la película --}}

	        <h1 style="min-height:45px;margin:5px 0 10px 0;font-size: 4em;">
                {{$pelicula->title}}
            </h1>

            <h2 style="min-height:45px;margin:2px 0 3px 0;font-size: 2em;">
                Año: {{$pelicula->year}}
            </h2>

            <h1 style="min-height:45px;margin:2px 0 3px 0;font-size: 2em;">
                Director: {{$pelicula->director}}
            </h1><br>

            <p style="font-size: 18px;"><Strong>Resumen</Strong>: {{$pelicula->synopsis}}</p>

            @if($pelicula->rented==true)
            <p style="font-size: 18px;"><Strong>Estado</Strong>: Película disponible</p>
            @else
            <p style="font-size: 18px;"><Strong>Estado</Strong>: Película actualmente alquilada</p>
            @endif



            @if($pelicula->rented==1)
            

            <form action="{{action('CatalogController@putRent', $pelicula->id)}}" 
			    method="POST" style="display:inline">
			    {{ method_field('PUT') }}
			    {{ csrf_field() }}
			    <button type="submit" class="btn btn-primary" style="display:inline">
			        Alquilar película
			    </button>
			</form>


            

            @else

            <form action="{{action('CatalogController@putReturn', $pelicula->id)}}" 
			    method="POST" style="display:inline">
			    {{ method_field('PUT') }}
			    {{ csrf_field() }}
			    <button type="submit" class="btn btn-danger" style="display:inline">
			        Devolver película
			    </button>
			</form>

           

            @endif

            <a type="button" href="{{url('/catalog/edit/'.$pelicula->id)}}" class="btn btn-warning">Editar Pelicula</a>


            <form action="{{action('CatalogController@deleteMovie', $pelicula->id)}}" 
			    method="POST" style="display:inline">
			    {{ method_field('DELETE') }}
			    {{ csrf_field() }}
			    <button type="submit" class="btn btn-danger" style="display:inline">
			        Elminar película
			    </button>
			</form>



            <a type="button" href="{{url('/catalog')}}" class="btn btn-default">Volver al listado</a>



	    </div>
	</div>

@stop