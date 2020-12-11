<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Comment;
use App\Models\Liking;

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
        $bl= new comment;
        $bl->iduser=session('user')->id;
        $bl->idphim=$request->idphim;
        $bl->comment=$request->contentC;
        $bl->like=0;
        $bl->dislike=0;
        $bl->save();
    }
    public function ajaxcomment(Request $request){
        if ($request->ajax())
        {
            $comments=Comment::join('users',"users.id","=","comments.iduser")->where("idphim","=",$request->idphim)->orderBy('comments.created_at', 'DESC')->get();
            $main="";
            foreach($comments as $comment)
            {
                $main.="<div class='comment-content' idcmt='$comment->id'>
                            <ul class='comments__list'>
                                <li class='comment'>
                                    <div class='comments__item'>
                                        <div class='comments__autor'>
                                            <a href='/profile/$comment->iduser' class='comments__name'>
                                            <img src='https://st.quantrimang.com/photos/image/2017/04/08/anh-dai-dien-FB-200.jpg' alt='' class='comments__avatar'>
                                            <div class='box-info-1'>                                               
                                                $comment->tenuser                                               
                                                <span class='comments__time'>$comment->created_at</span>
                                            </div>
                                            </a>
                                        </div>
                                        <div class='comments__text'>
                                            <div class='content_of_comment'>
                                                $comment->comment
                                            </div>
                                        </div>
                                        <div class='comments__actions'>
                                            <div class='comments__rate'>
                                                <button id='cmt-like' like=$comment->like>
                                                    <i class='fas fa-thumbs-up like'></i>
                                                    $comment->like
                                                </button>
                                                <button id='cmt-dislike' dislike=$comment->dislike>
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
        return;
    }
    public function ajaxinteract(Request $request){
        if(isset($request->like)){
            Comment::where('id','=',$request->idcmt)->update(array('like'=>$request->like+1));
        }
        else if(isset($request->dislike)){
            Comment::where('id','=',$request->idcmt)->update(array('dislike'=>$request->dislike+1));
        }
    }
    public function favorite(Request $request){
        $lk= new liking;    
        $lk->iduser=session('user')->id;
        $lk->poster=$request->poster;
        $lk->idmovie=$request->idphim;
        $lk->title=$request->nameP;
        $lk->save();    
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
        if(isset(session('user')->id))
        {
            $count=Liking::join('users',"users.id","=","likings.iduser")->where('likings.idmovie',"=",$id,"and")->where('users.id',"=",session('user')->id)->count();
            if($count>0){
                return view('movie.detail')->with('info',$response)->with('idphim',$id)->with('liking',"liked");
            }
            return view('movie.detail')->with('info',$response)->with('idphim',$id);
        }
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
