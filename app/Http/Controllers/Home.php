<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Home extends Controller
{
    //
    public function index(){
        $response = Http::get('https://api.themoviedb.org/3/movie/popular?api_key=12baa83af9302206b6af65913d262a81&language=en-US&page=1')->json()['results'];
        return view('home.index')->with('popular',$response);
    }
}
