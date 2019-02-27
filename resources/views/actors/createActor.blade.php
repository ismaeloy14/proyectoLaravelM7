@extends('layouts.master')

@section('content')

    <div class="row" style="margin-top:40px">
   <div class="offset-md-3 col-md-6">
      <div class="card">
         <div class="card-header text-center">
            Añadir actor
         </div>
         <div class="card-body" style="padding:30px">

            <form method="POST" action="{{url('/actors/createActor')}}">

	            {{ csrf_field() }}
	            
					<div class="form-group">
	               <label for="nom_actor">Nombre</label>
	               <input type="text" name="nom_actor" id="nom_actor" class="form-control">
	            </div>

	            <div class="form-group">
	               <label for="nacionalitat">Nacionalidad</label>
	               <input type="text" name="nacionalitat" id="nacionalitat" class="form-control">
	            </div>

	            <div class="form-group">
	               <label for="retrato">Retrato</label>
	               <input type="text" name="retrato" id="retrato" class="form-control">
	            </div>

					<div class="form-group">
	               <label for="data_naixement">Data de naixement</label>
	               <input type="date" name="data_naixement" id="data_naixement" class="form-control">
	            </div>

					
					<div class="form-group">
						<label for="participa">Pel·licules on participa</label><br/>
						@foreach( $arrayPeliculas as $pelicula )
							<label><input type="checkbox" name="check_list[]" value="{{$pelicula->id}}"> {{$pelicula->title}}</label><br/>
						@endforeach
					</div>

	            <div class="form-group text-center">
	               <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
	                   Añadir actor
	               </button>
	            </div>
					
        	</form>
         </div>
      </div>
   </div>
</div>
@stop