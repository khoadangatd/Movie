<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use Illuminate\Support\Facades\Http;

class Home extends Controller
{
    //
    public function index(){
        $response = Http::get('https://api.themoviedb.org/3/movie/popular?api_key=12baa83af9302206b6af65913d262a81&language=en-US&page=1')->json()['results'];
        return view('home.index')->with('popular',$response);
    }
    public function ajax(Request $request){
        $tl=$request->theloai;  
        $data=Http::get("https://api.themoviedb.org/3/movie/popular?api_key=12baa83af9302206b6af65913d262a81&language=en-US&page=$tl")->json()['results'];
        $response="";
        for($i=0;$i<6;$i++){
            $value=$data[$i];
            $id=$value['id'];
            $detail=Http::get("https://api.themoviedb.org/3/movie/$id?api_key=12baa83af9302206b6af65913d262a81&language=en-US")->json();
            $qg=$detail['spoken_languages'][0];
            $ten="";
            $tl="";
            if($detail['runtime']==0)
                $detail['runtime']="Sắp ra mắt";
            else
                $detail['runtime']="Thời gian : ".$detail['runtime']." phút";
            foreach($detail['genres'] as $genres)
                $ten=$ten.$genres['name']." ";
            $poster=$value['poster_path'];
            $title=$value['title'];
            $runtime=$detail['runtime'];
            $tenqg=$qg['english_name'];
            $imdb=$value['vote_average'];
            $rd=$value['release_date'];
            $ov=$value['overview'];
            $response.="<div class='col-6 mt-5 d-flex'>
                            <a href='/movie/$id'>
                                <div class='movie-img'>
                                    <img src='https://image.tmdb.org/t/p/w500/$poster' alt='' class='movie-img-item'>
                                    <span class='quality'>FullHD</span>
                                </div>
                            </a>
                            <div class='movie-content'>
                                <h3 class='movie-content-title'>
                                    $title
                                </h3>
                                <p class='movie-content-title-engl'>
                                    $runtime
                                </p>
                                <p class='movie-content-category'>
                                    Thể loại : $ten    
                                </p>
                                <p class='movie-content-country'>
                                    Ngôn ngữ : $tenqg
                                </p>
                                <p class='movie-content-imbd'>
                                    iMDb $imdb
                                </p>
                                <p class='movie-content-date'>
                                    $rd
                                </p>
                                <p class='movie-content-desc'>
                                    $ov
                                </p>
                            </div>
                        </div>";
            }
        return $response;
    }
}
