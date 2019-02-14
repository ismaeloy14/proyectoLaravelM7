<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Movie;

class APICatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json( Movie::all() );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $movies = new Movie;
        $movies->title = $request->input('title');
        $movies->year = $request->input('year');
        $movies->director = $request->input('director');
        $movies->poster = $request->input('poster');
        $movies->synopsis = $request->input('synopsis');
        $movies->rented = false;
        $movies->save();

        return response()->json( ['error' => false,
                                  'msg' => 'La película se ha creado' ] );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json( Movie::findOrFail($id) );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $movies = Movie::findOrFail($id);
        $movies->title = $request->input('title');
        $movies->year = $request->input('year');
        $movies->director = $request->input('director');
        $movies->poster = $request->input('poster');
        $movies->synopsis = $request->input('synopsis');
        $movies->save();

        return response()->json( ['error' => false,
                                  'msg' => 'La película se ha editado' ] );
    }

    public function putRent($id){
        $movies = Movie::findOrFail( $id );
        $movies->rented = false;
        $movies->save();
        return response()->json( ['error' => false,
                                  'msg' => 'La película se ha marcado como alquilada' ] );
    }

    public function putReturn($id){
        $movies = Movie::findOrFail($id);
        $movies->rented = true;
        $movies->save();

        return response()->json( ['error' => false,
                                  'msg' => 'La película se ha marcado como devuelta' ] );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movies = Movie::findOrFail($id);
        $movies->delete();

        
        return response()->json( redirect('api/v1/catalog') );    }
}
