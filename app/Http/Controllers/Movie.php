<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Comment;

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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function ajaxpost(Request $request)
    {
        //
        // $content=$request->contentC;
        // $bl= new comment;
        // $bl->iduser=session('user')->id;
        // $bl->idphim=$request->idphim;
        // $bl->comment=$content;
        // $bl->like=0;
        // $bl->dislike=0;
        // $bl->save();
        return 123;
    }
    public function ajaxcomment(Request $request){
        $comments=Comment::join('users',"users.id","=","comments.iduser")->where("idphim","=",$request->idphim)->get();
        $main="";
        foreach($comments as $comment)
        {
            $create=$comment->create_at;
            $main.="<div class='comment-content'>
                        <ul class='comments__list'>
                            <li class='comment'>
                                <div class='comments__item'>
                                    <div class='comments__autor'>
                                        <img src='https://scontent.fsgn5-3.fna.fbcdn.net/v/t1.0-9/117251156_780671119335149_3490588943834725576_o.jpg?_nc_cat=110&ccb=2&_nc_sid=09cbfe&_nc_ohc=w7TVQWb0pt8AX8PGAJo&_nc_ht=scontent.fsgn5-3.fna&oh=4a755a559aad9f474aab31f662f3effb&oe=5FF117A3' alt='' class='comments__avatar'>
                                        <div class='box-info-1'>
                                            <a href='' class='comments__name'>
                                                $comment->tenuser
                                            </a>
                                            <span class='comments__time'>$comment->created_at</span>
                                        </div>
                                    </div>
                                    <div class='comments__text'>
                                        <div class='content_of_comment'>
                                            $comment->comment
                                        </div>
                                    </div>
                                    <div class='comments__actions'>
                                        <div class='comments__rate'>
                                            <button>
                                                <i class='fas fa-thumbs-up like'></i>
                                                $comment->like
                                            </button>
                                            <button>
                                            <i class='fas fa-thumbs-down dislike'></i>
                                                $comment->dislike
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>";
        }
        return $main;
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
        return view('movie.detail')->with('info',$response)->with('idphim',$id);
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
