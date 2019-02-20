<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Notification;
use App\Actor;
use App\Movie;

class ActorsController extends Controller
{


    public function getIndex(){
		
		$actors = Actor::all();
		return view('actors.indexActors', array('arrayActors'=>$actors));

    }

    public function getShow($id){
    	$actors = Actor::findOrFail($id);
    	return view('actors.showActor', array('actors'=>$actors));
    }


    public function getCreate(){

			$pelicula = Movie::All();
    	return view('actors.createActor', array('arrayPeliculas'=>$pelicula));
    }

    public function getEdit($id){
    	$actors = Actor::findOrFail($id);
    	return view('actors.editActor', array('actors'=>$actors));
    }

    public function postCreate(Request $request){
    	$actors = new Actor;
    	$actors->nom_actor = $request->input('nom_actor');
    	$actors->nacionalitat = $request->input('nacionalitat');
    	$actors->retrato = $request->input('retrato');
    	$actors->data_naixement = $request->input('data_naixement');
    	$actors->save();

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
    	$actors = Actor::findOrFail($id);
    	$actors->delete();

    	Notification::success('Actor eliminado');
    	return redirect('/actors/indexActors');
    }


}
