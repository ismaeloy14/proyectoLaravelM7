<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Notification;
use App\Director;
use App\Movie;
use App\ActorMovie;

class DirectorsController extends Controller
{

    public function getIndex(){
			$directors = Director::all();
			return view('directors.indexDirectors', array('arrayDirectors'=>$directors));
    }

    public function getShow($id){
			$director = Director::findOrFail($id);
			$movies = Movie::where('id_director', '=', $id)->get();
			
			return view('directors.showDirector', array('director'=>$director), array('movies'=>$movies));
			//return view('directors.showDirector', compact('director', 'directors', 'movies'));
    }


    public function getCreate(){
			$director = Movie::All();
    	return view('directors.createDirector', array('arrayDrectors'=>$director));
    }

    public function getEdit($id){
		$directors = Director::findOrFail($id);
    	return view('directors.editDirector', array('directors'=>$directors));
    }

    public function postCreate(Request $request){
    	$directors = new Director;
    	$directors->nom_director = $request->input('nom_director');
		$directors->nacionalitat = $request->input('nacionalitat');
		$directors->data_naixement = $request->input('data_naixement');
    	$directors->imagenDirector = $request->input('imagenDirector');
    	$directors->save();

    	Notification::success('Director añadido');
    	return redirect('/directors/indexDirectors');
    }

    public function putEdit(Request $request, $id){
    	$directors = Director::findOrFail($id);
    	$directors->nom_director = $request->input('nom_director');
    	$directors->nacionalitat = $request->input('nacionalitat');
		$directors->data_naixement = $request->input('data_naixement');
		$directors->imagenDirector = $request->input('imagenDirector');
    	$directors->save();

    	Notification::success('Director modificado');
    	return redirect('/directors/showDirector/'.$id);
    }

    public function deleteDirector($id){
    	$directors = Director::findOrFail($id);
    	$directors->delete();

    	Notification::success('Director eliminado');
    	return redirect('/directors/indexDirectors');
    }


}
