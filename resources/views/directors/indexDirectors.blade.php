@extends('layouts.master')

@section('content')

    <div class="row">

    @foreach( $arrayDirectors as $directors )
    <div class="col-xs-6 col-sm-4 col-md-3 text-center">

        <a href="{{ url('/directors/showDirector/' . $directors->id ) }}">
            <img src="{{$directors->imagenDirector}}" style="height:200px"/>
            <h4 style="min-height:45px;margin:5px 0 10px 0">
                {{$directors->nom_director}}
            </h4>
        </a>

    </div>
    @endforeach

</div>

<a href="{{ url('/directors/createDirector') }}" class="anadir"><button type="button" class="btn btn-success float-right"><span>&#43;</span> Añadir director</button></a>

@stop