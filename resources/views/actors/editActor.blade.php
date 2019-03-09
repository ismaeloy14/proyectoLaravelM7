@extends('layouts.master')

@section('content')

<div class="row" style="margin-top:40px">
   <div class="offset-md-3 col-md-6">
      <div class="card">
         <div class="card-header text-center">
            Modificar actor
         </div>
         <div class="card-body" style="padding:30px">

            <form method="POST" action="{{url('/actors/editActor/'.$actors->id)}}">

            	{{method_field('PUT')}}

	            {{ csrf_field() }}

	            <div class="form-group">
	               <label for="nom_actor">Nombre</label>
	               <input type="text" name="nom_actor" id="nom_actor" class="form-control" value="{{$actors->nom_actor}}" required>
	            </div>

	            <div class="form-group">
	               <label for="nacionalitat">Nacionalidad</label>
	               <input type="text" name="nacionalitat" id="nacionalitat" class="form-control" value="{{$actors->nacionalitat}}" required>
	            </div>

	            <div class="form-group">
	               <label for="retrato">Retrato</label>
	               <input type="text" name="retrato" id="retrato" class="form-control" value="{{$actors->retrato}}">
	            </div>

				<div class="form-group">
	               <label for="data_naixement">Fecha nacimiento</label>
	               <input type="date" name="data_naixement" id="data_naixement" class="form-control" value="{{$actors->data_naixement}}" required>
	            </div>

	            

	            <div class="form-group text-center">
	               <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
	                   Modificar actor
	               </button>
	            </div>

	            {{-- TODO: Cerrar formulario --}}
        	</form>
         </div>
      </div>
   </div>
</div>
@stop