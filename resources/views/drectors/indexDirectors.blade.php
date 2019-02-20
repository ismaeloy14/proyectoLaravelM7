@extends('layouts.master')

@section('content')

    <div class="row">

    @foreach( $arrayDirectrs as $directors )
    <div class="col-xs-6 col-sm-4 col-md-3 text-center">

        <a href="{{ url('/directors/showDirector/' . $directors->id ) }}">
            <img src="{{$directors->retrato}}" style="height:200px"/>
            <h4 style="min-height:45px;margin:5px 0 10px 0">
                {{$actors->nom_actor}}
            </h4>
        </a>

    </div>
    @endforeach

</div>
<a type="button" href="{{url('/actors/createActor')}}" class="btn btn-success" style="font-size: 20px"><span>&#43;</span> Añadir actor</a>

@stop