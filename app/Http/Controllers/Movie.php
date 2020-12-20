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
        $url = 'https://api.themoviedb.org/3/movie/popular?api_key=12baa83af9302206b6af65913d262a81&language=vi&page=';
        $urlS = 'https://api.themoviedb.org/3/search/movie?api_key=04c35731a5ee918f014970082a0088b1&language=vi&include_adult=false';
        if(isset($request->p)&&!isset($request->k)){            
            $response = Http::get($url.$request->p)->json();            
            return view('movie.index')->with('movies',$response['results'])->with('page',$request->p)->with('title',"Phim mới nhất")->with('total',$response['total_pages']);
        }
        else if(isset($request->k)&&isset($request->p)&&$request->p<11){
            $response = Http::get($urlS."&query=".$request->k."&page=".$request->p)->json();
            return view('movie.index')->with('movies',$response['results'])->with('page',$request->p)->with('keyword',$request->k)->with('total',$response['total_pages']);
        }
        // else
        //     return redirect("");
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
                $main.="<div class='comment-content'>
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
                                        <div class='comments__actions' idcmt='$comment->idcmt'>
                                            <div class='comments__rate'>
                                                <button class='cmt-like' like=$comment->like>
                                                    <i class='fas fa-thumbs-up like'></i>
                                                    <span class='like-main'>$comment->like</span>
                                                </button>
                                                <button class='cmt-dislike' dislike=$comment->dislike>
                                                    <i class='fas fa-thumbs-down dislike'></i>
                                                    <span class='dislike-main'>$comment->dislike</span>
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
            Comment::where('idcmt','=',$request->idcmt)->update(array('like'=>$request->like+1));
        }
        else if(isset($request->dislike)){
            Comment::where('idcmt','=',$request->idcmt)->update(array('dislike'=>$request->dislike+1));
        }
        return $request->idcmt;
    }
    public function favorite(Request $request){
        $lk= new liking;    
        $lk->iduser=session('user')->id;
        $lk->poster=$request->poster;
        $lk->idtv=0;
        $lk->idmovie=$request->idphim;
        $lk->title=$request->nameP;
        $lk->save();    
    }
    public function favoriteTV(Request $request){
        $lk= new liking;    
        $lk->iduser=session('user')->id;
        $lk->poster=$request->poster;
        $lk->idtv=$request->idphim;
        $lk->idmovie=0;
        $lk->title=$request->nameP;
        $lk->save();    
    }
    // Watch movie
    public function playMovie(Request $request)
    {
        //
        if(isset($request->TV))
            $url="https://api.themoviedb.org/3/tv/$request->idphim?api_key=12baa83af9302206b6af65913d262a81&language=en-US&append_to_response=similar,videos,credits";
        else
            $url="https://api.themoviedb.org/3/movie/$request->idphim?api_key=12baa83af9302206b6af65913d262a81&language=en-US&append_to_response=similar,videos,credits";
        $response=Http::get($url)->json();
        $content="<div class='background-detail'>
                    <div class='container'>
                        <div class='row'>
                        <div class='col-9'>
                            <div class='watch-movie-play'>";
                            $temp=1;
                            $count=0;
                            foreach($response['videos']['results'] as $videokey)
                            {
                                $count++;
                                $video=$videokey['key'];
                                if($temp==1){
                                    $content.="<iframe style='width:100%;height:600px;' class='main-video-watch main-video-watch--active' src='https://www.youtube.com/embed/$video' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>"; 
                                    $temp=0;
                                }
                                else
                                    $content.="<iframe style='width:100%;height:600px' class='main-video-watch' src='https://www.youtube.com/embed/$video' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>";                                        
                            }
                            $content.="</div>
                            <div class='watch-movie-play-menu'>
                                <h3 class='watch-movie-play-menu-title'>
                                    Chọn tập phim
                                </h3>
                                <ul class='watch-movie-play-menu-list'>";
                                for($i=1;$i<=$count;$i++){
                                    if($i==1){
                                        $content.="
                                            <li class='watch-movie-play-menu-item watch-movie-play-menu-item--active'>
                                                $i
                                            </li>
                                        ";
                                    }
                                    else{
                                        $content.="
                                        <li class='watch-movie-play-menu-item'>
                                            $i
                                        </li>
                                        ";
                                    }
                                }
                                $content.="
                                </ul>
                                <div class='watch-movie-play-menu-category'>
                                    <span>
                                        Trailer
                                    </span>
                                    <span>
                                        Engsub
                                    </span>
                                </div>
                            </div>
                            </div>
                        <div class='col-3'>
                                <div class='watch-movie-menu'>
                                    <h3 class='movie-movie-title'>
                                        Nổi Bật
                                    </h3>
                                    <ul class='watch-movie-filter'>
                                        <li class='watch-movie-filter-item watch-movie-filter-item-active' data='day'>
                                            Ngày
                                        </li>
                                        <li class='watch-movie-filter-item' data='week'>
                                            Tuần 
                                        </li>
                                    </ul>
                                </div>
                                <ul class='watch-movie-list'>
                                
                                </ul>
                        </div>
                        </div>
                    </div>
                </div>";
        return $content;
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function ajaxGetMoviePopular(Request $request){
        $filter = $request->filter;
        $url= "https://api.themoviedb.org/3/trending/movie/$filter?api_key=12baa83af9302206b6af65913d262a81";
        $response=Http::get($url)->json();
        $data ='';
        for($i=0;$i<5;$i++){
            $link = $response['results'][$i]['id'];
            if(isset($response['results'][$i]['poster_path'])){
                $poster_path = "https://image.tmdb.org/t/p/w500/".$response['results'][$i]['poster_path'];
            }
            else{
                $poster_path='https://titanliner.com/wp-content/uploads/2019/02/empty-img.jpg';
            }
            $title = $response['results'][$i]['title'];
            $view = $response['results'][$i]['popularity'];
            $IMDb = $response['results'][$i]['vote_average'];
            $data.="<li class='watch-movie-item'>
            <a href='/movie/$link' class='watch-movie-item-link'>
                <div class='watch-movie-item-img-wrap'>
                
                        <img src='$poster_path' class='img-watch-film'>
                   
                 </div>
                <div class='watch-movie-item-desc'>
                    <h3 class='watch-movie-item-desc-title'>
                           $title
                    </h3>
                    <h3 class='watch-movie-item-desc-view'>
                        $view lượt xem
                    </h3>
                    <h3 class='movie-content-imbd'>
                        Điểm IMDb
                        <span>
                          $IMDb
                        </span>
                    </h3>
                </div>
            </a> 
            </li>'";
     };
     return $data;
    }

    public function show($id)
    {
        //

        $url="https://api.themoviedb.org/3/movie/$id?api_key=12baa83af9302206b6af65913d262a81&language=vi&append_to_response=credits,similar,images&include_image_language=en";
        if(Http::get($url)->json())
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
    public function tvshow($id)
    {
        //
        $url="https://api.themoviedb.org/3/tv/$id?api_key=12baa83af9302206b6af65913d262a81&language=vi&append_to_response=credits,similar,images&include_image_language=en";
        if(Http::get($url)->json())
        $response=Http::get($url)->json();
        if(isset(session('user')->id))
        {
            $count=Liking::join('users',"users.id","=","likings.iduser")->where('likings.idmovie',"=",$id,"and")->where('users.id',"=",session('user')->id)->count();
            if($count>0){
                return view('movie.detailTV')->with('info',$response)->with('idphim',$id)->with('liking',"liked");
            }
            return view('movie.detailTV')->with('info',$response)->with('idphim',$id);
        }
        return view('movie.detailTV')->with('info',$response)->with('idphim',$id);
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
