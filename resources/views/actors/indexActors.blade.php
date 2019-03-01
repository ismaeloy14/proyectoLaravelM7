@extends('layouts.master')

@section('content')

    <div class="row files">

    @foreach( $arrayActors as $actors )
    <div class="col-xs-6 col-sm-4 col-md-3 text-center">

        <a href="{{ url('/actors/showActor/' . $actors->id ) }}">
            <img src="{{$actors->retrato}}" style="height:200px"/>
            <h4 style="min-height:45px;margin:5px 0 10px 0">
                {{$actors->nom_actor}}
            </h4>
        </a>

    </div>
    @endforeach

</div>

<a href="{{ url('/actors/createActor') }}"><button type="button" class="btn btn-success float-right"><span>&#43;</span> Añadir actor</button></a>

@stop