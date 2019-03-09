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


    public function getIndex(){
			$actors = Actor::all();
			return view('actors.indexActors', array('arrayActors'=>$actors));
    }

    public function getShow($id){
			$actors = Actor::findOrFail($id);
			$ActorMovies = ActorMovie::where('id_actor', '=', $id)->get();
			$movies = Movie::All();
			
			//return view('actors.showActor', array('actors'=>$actors), array('ActorMovies'=>$ActorMovies));
			
			return view('actors.showActor', compact('actors', 'ActorMovies', 'movies'));
    }


    public function getCreate(){
			$pelicula = Movie::All();
    	return view('actors.createActor', array('arrayPeliculas'=>$pelicula));
    }

    public function getEdit($id){
			$actors = Actor::findOrFail($id);
			$arrayPeliculas = Movie::All();
			$ActorMovies = ActorMovie::where('id_actor', '=', $id)->get();

			//dd($ActorMovies);
			return view('actors.editActor',compact('actors', 'arrayPeliculas', 'ActorMovies'));
		}
		

    public function postCreate(Request $request){
    	$actors = new Actor;
    	
    	$actors->nom_actor = $request->input('nom_actor');
    	$actors->nacionalitat = $request->input('nacionalitat');
    	$actors->retrato = $request->input('retrato');
    	$actors->data_naixement = $request->input('data_naixement');
    	$actors->save();


			$ultimActor = Actor::max("id"); //Obtenim el "id" més alt de l'actor que justament em insertat anteriorment en aquesta mateixa funció postCreate.

    	foreach ($request->checkbox_movie as $checkbox_movie) { //Per cada 
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

			$relacioActorMovies = ActorMovie::where('id_actor', '='	, $id); //Elimina les relacions de ActorMovies
			$relacioActorMovies->delete();
			
			foreach ($request->checkbox_movie as $checkbox_movie) { //Per cada 
				$actorMovies = new ActorMovie;
    		$actorMovies->id_actor = $id;
				$actorMovies->id_movie = $checkbox_movie;
    		$actorMovies->save();
			}

			

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
