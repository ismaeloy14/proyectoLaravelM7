@extends('layouts.master')

@section('content')

<div class="row" style="margin-top:40px">
   <div class="offset-md-3 col-md-6">
      <div class="card">
         <div class="card-header text-center">
            Modificar actor
         </div>
         <div class="card-body" style="padding:30px">

            <form method="POST" action="{{url('/actor/editActor/'.$actors->id)}}">

            	{{method_field('PUT')}}

	            {{ csrf_field() }}

	            <div class="form-group">
	               <label for="nom_actor">Nombre</label>
	               <input type="text" name="nom_actor" id="nom_actor" class="form-control" value="{{$actors->nom_actor}}">
	            </div>

	            <div class="form-group">
	               <label for="nacionalitat">Nacionalidad</label>
	               <input type="text" name="nacionalitat" id="nacionalitat" class="form-control" value="{{$actors->nacionalitat}}">
	            </div>

	            <div class="form-group">
	               <label for="retrato">Retrato</label>
	               <input type="text" name="retrato" id="retrato" class="form-control" value="{{$actors->retrato}}">
	            </div>

					<div class="form-group">
	               <label for="data_naixement">Retrato</label>
	               <input type="date" name="data_naixement" id="data_naixement" class="form-control" value="{{$actors->data_naixement}}">
	            </div>

	            <div class="form-group text-center">
	               <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
	                   Modificar película
	               </button>
	            </div>

	            {{-- TODO: Cerrar formulario --}}
        	</form>
         </div>
      </div>
   </div>
</div>
@stop