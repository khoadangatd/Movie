<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Movie extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //\
        $url = 'https://api.themoviedb.org/3/movie/popular?api_key=12baa83af9302206b6af65913d262a81&language=en-US&page=';
        $urlS = 'https://api.themoviedb.org/3/search/movie?api_key=04c35731a5ee918f014970082a0088b1&language=en-US&include_adult=false';
        if(isset($request->p)&&$request->p<11&&!isset($request->k)){            
            $response = Http::get($url.$request->p)->json()['results'];            
            return view('movie.index')->with('movies',$response)->with('page',$request->p);
        }
        else if(isset($request->k)&&isset($request->p)&&$request->p<11){
            $response = Http::get($urlS."&query=".$request->k."&page=".$request->p)->json();
            return view('movie.index')->with('movies',$response['results'])->with('page',$request->p)->with('keyword',$request->k)->with('total',$response['total_pages']);
        }
        else
            return redirect("");
    }
    /**p
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $url="https://api.themoviedb.org/3/movie/$id?api_key=12baa83af9302206b6af65913d262a81&language=en-US&append_to_response=credits,similar,images&include_image_language=en";
        $response=Http::get($url)->json();
        return view('movie.detail')->with('info',$response);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
