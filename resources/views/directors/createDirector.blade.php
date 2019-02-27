@extends('layouts.master')

@section('content')

    <div class="row" style="margin-top:40px">
   <div class="offset-md-3 col-md-6">
      <div class="card">
         <div class="card-header text-center">
            Añadir director
         </div>
         <div class="card-body" style="padding:30px">

            <form method="POST" action="{{url('/directors/createDirector')}}">

	            {{ csrf_field() }}
	            
				<div class="form-group">
	               <label for="nom_director">Nombre</label>
	               <input type="text" name="nom_director" id="nom_director" class="form-control">
	            </div>

	            <div class="form-group">
	               <label for="nacionalitat">Nacionalidad</label>
	               <input type="text" name="nacionalitat" id="nacionalitat" class="form-control">
	            </div>

	            <div class="form-group">
	               <label for="imagenDirector">Retrato</label>
	               <input type="text" name="imagenDirector" id="imagenDirector" class="form-control">
	            </div>

					<div class="form-group">
	               <label for="data_naixement">Fecha de nacimiento</label>
	               <input type="date" name="data_naixement" id="data_naixement" class="form-control">
	            </div>

					{{--
					<div class="form-group">
						<label for="participa">Pel·licules on participa</label><br/>
						@foreach( $arrayDirectors as $director )
							<label><input type="checkbox" name="check_list[]" value=""> {{$director->title}}</label><br/>
						@endforeach
					</div> --}}

	            <div class="form-group text-center">
	               <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
	                   Añadir director
	               </button>
	            </div>
					
        	</form>
         </div>
      </div>
   </div>
</div>
@stop