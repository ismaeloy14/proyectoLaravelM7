<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Notification;
use App\Actor;
use App\Movie;
use App\ActorMovie;

class ActorsController extends Controller
{

	/* Esta función nos redirige al "index" de los actores*/
    public function getIndex(){
			$actors = Actor::all();
			return view('actors.indexActors', array('arrayActors'=>$actors));
    }

    /*Con el show mostramos toda la información de los actores. Lo que hemos implementado es que en esta vista salen todas las peliculas que ha participado cada actor*/
    public function getShow($id){
			$actors = Actor::findOrFail($id);
			$ActorMovies = ActorMovie::where('id_actor', '=', $id)->get();
			$movies = Movie::All();
			
			return view('actors.showActor', compact('actors', 'ActorMovies', 'movies'));
    }


    public function getCreate(){
			$pelicula = Movie::All();
    	return view('actors.createActor', array('arrayPeliculas'=>$pelicula));
    }

    public function getEdit($id){
    	$actors = Actor::findOrFail($id);
    	return view('actors.editActor', array('actors'=>$actors));
		}
		
	/*Aqui creamos el actor. Le hemos puesto un array de checkbox para que se guarde odas las peliculas que ha participado.*/
    public function postCreate(Request $request){
    	$actors = new Actor;
    	
    	$actors->nom_actor = $request->input('nom_actor');
    	$actors->nacionalitat = $request->input('nacionalitat');
    	$actors->retrato = $request->input('retrato');
    	$actors->data_naixement = $request->input('data_naixement');
    	$actors->save();


			$ultimActor = Actor::max("id");

    	foreach ($request->checkbox_movie as $checkbox_movie) {
    		$actorMovies = new ActorMovie;
    		$actorMovies->id_actor = $ultimActor;
    		$actorMovies->id_movie = $checkbox_movie;
    		$actorMovies->save();
    	}

    	
    	Notification::success('Actor añadido');
    	return redirect('/actors/indexActors');
    }

    public function putEdit(Request $request, $id){
    	$actors = Actor::findOrFail($id);
    	$actors->nom_actor = $request->input('nom_actor');
    	$actors->nacionalitat = $request->input('nacionalitat');
    	$actors->retrato = $request->input('retrato');
    	$actors->data_naixement = $request->input('data_naixement');
    	$actors->save();

    	Notification::success('Actor modificado');
    	return redirect('/actors/showActor/'.$id);
    }

    public function deleteActor($id){
			$actorMovies = ActorMovie::where('id_actor', '='	, $id); //Elimina les relacions de ActorMovies
			$actorMovies->delete();

			$actors = Actor::findOrFail($id); //Elimina el Actor un cop eliminat les relacions de ActorMovies
			$actors->delete();
			
    	Notification::success('Actor eliminado');
    	return redirect('/actors/indexActors');
    }


}
