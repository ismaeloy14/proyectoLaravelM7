<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Notification;
use App\Actor;

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




}
