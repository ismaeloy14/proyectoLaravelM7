@extends('layouts.master')

@section('content')

<div class="row" style="margin-top:40px">
   <div class="offset-md-3 col-md-6">
      <div class="card">
         <div class="card-header text-center">
            Modificar director
         </div>
         <div class="card-body" style="padding:30px">

            <form method="POST" action="{{url('/directors/editDirector/'.$directors->id)}}">

            	{{method_field('PUT')}}

	            {{ csrf_field() }}

	            <div class="form-group">
	               <label for="nom_director">Nombre</label>
	               <input type="text" name="nom_director" id="nom_director" class="form-control" value="{{$directors->nom_director}}" required>
	            </div>

	            <div class="form-group">
	               <label for="nacionalitat">Nacionalidad</label>
	               <input type="text" name="nacionalitat" id="nacionalitat" class="form-control" value="{{$directors->nacionalitat}}" required>
	            </div>

	            <div class="form-group">
	               <label for="imagenDirector">Retrato</label>
	               <input type="text" name="imagenDirector" id="imagenDirector" class="form-control" value="{{$directors->imagenDirector}}">
	            </div>

				<div class="form-group">
	               <label for="data_naixement">Fecha de nacimiento</label>
	               <input type="date" name="data_naixement" id="data_naixement" class="form-control" value="{{$directors->data_naixement}}" required>
	            </div>

	            <div class="form-group text-center">
	               <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
	                   Modificar director
	               </button>
	            </div>

	            {{-- TODO: Cerrar formulario --}}
        	</form>
         </div>
      </div>
   </div>
</div>
@stop