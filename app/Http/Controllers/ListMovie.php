<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ListMovie extends Controller
{
    //
    public function tvshow(Request $request){
        $response = Http::get('https://api.themoviedb.org/3/tv/popular?api_key=12baa83af9302206b6af65913d262a81&language=en-US&page='.$request->p)->json();
        return view("movie.index")->with("movies",$response['results'])->with('page',$request->p)->with('title',"Phim bộ")->with('total',$response['total_pages']);;
    }
    public function toprate(Request $request){
        $response = Http::get("https://api.themoviedb.org/3/movie/top_rated?api_key=12baa83af9302206b6af65913d262a81&language=vi&page=".$request->p)->json();
        return view("movie.index")->with("movies",$response['results'])->with('page',$request->p)->with('title',"Phim kinh điển")->with('total',$response['total_pages']);;
    }
    public function theater(Request $request){
        $response = Http::get('https://api.themoviedb.org/3/movie/now_playing?api_key=12baa83af9302206b6af65913d262a81&language=vi&page='.$request->p)->json();
        return view("movie.index")->with("movies",$response['results'])->with('page',$request->p)->with('title',"Phim chiếu rạp")->with('total',$response['total_pages']);;
    }
}

