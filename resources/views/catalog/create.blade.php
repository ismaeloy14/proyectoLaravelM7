@extends('layouts.master')

@section('content')

    <div class="row" style="margin-top:40px">
   <div class="offset-md-3 col-md-6">
      <div class="card">
         <div class="card-header text-center">
            Añadir película
         </div>
         <div class="card-body" style="padding:30px">

            {{-- TODO: Abrir el formulario e indicar el método POST --}}
            <form method="POST" action="{{url('/catalog/create')}}">

	            {{-- TODO: Protección contra CSRF --}}

	            {{ csrf_field() }}
	            
	            <div class="form-group">
	               <label for="title">Título</label>
	               <input type="text" name="title" id="title" class="form-control" required>
	            </div>

	            <div class="form-group">
	               <label for="year">Año</label>
	               <input type="text" name="year" id="year" class="form-control" required>
	            </div>


					<div class="form-group">
						<label for="director">Director</label>
						<br>
						<select name="director" class="form-control">
	               		@foreach( $directors as $dire )
	               				<option id="director" class="form-control" value="{{$dire->id}}" required>{{$dire->nom_director}}</option>
	               		@endforeach
	               </select>

					</div>

					

	            <div class="form-group">
	               <label for="poster">Poster</label>
	               <input type="text" name="poster" id="poster" class="form-control">
	            </div>

	            <div class="form-group">
	               <label for="synopsis" required>Resumen</label>
	               <textarea name="synopsis" id="synopsis" class="form-control" rows="3"></textarea>
	            </div>

	            <div class="form-group text-center">
	               <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
	                   Añadir película
	               </button>
	            </div>

	            {{-- TODO: Cerrar formulario --}}
        	</form>
         </div>
      </div>
   </div>
</div>


    

@stop
