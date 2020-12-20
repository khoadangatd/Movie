
@extends('layout.dash')
@section('css')
    <link rel="stylesheet" href="{{ asset('Doanweb/movie/detail.css')}}?v=<?php echo time(); ?>"> 
    <link rel="stylesheet" href="{{ asset('Doanweb/movie/watchMovie.css')}}?v=<?php echo time(); ?>"> 
    @endsection
@section('js')
    <script src="{{ asset('Doanweb/movie/watchMovie.js')}}?v=<?php echo time(); ?>"></script>
@endsection
@section('title')
Xem phim {{$info['title']}}
@endsection
@section('section')    
    <div class="details">
        <div class= "background" style="background-image: url('https://image.tmdb.org/t/p/w500/{{$info['poster_path']}}'); background-repeat: no-repeat; background-size : cover;background-position: center">
            <div class="background-detail">
                <div class="container">
                    <div class="row">
                       <div class="col-9">
                           <div class="watch-movie-play">
                               <iframe style='width:100%;height:600px' src="https://www.youtube.com/embed/{{$info['videos']['results'][0]['key']}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                           </div>
                           <div class="watch-movie-play-menu">
                               <h3 class="watch-movie-play-menu-title">
                                   Chọn tập phim
                               </h3>
                               <ul class="watch-movie-play-menu-list">
                                   <li class="watch-movie-play-menu-item">
                                       1
                                   </li>
                                   <li class="watch-movie-play-menu-item">
                                       2
                                   </li>
                               </ul>
                               <div class="watch-movie-play-menu-category">
                                   <span>
                                       Thuyết Minh
                                   </span>
                                   <span>
                                        Éng
                                   </span>
                               </div>
                           </div>
                        </div>
                       <div class="col-3">
                            <div class="watch-movie-menu">
                                <h3 class="movie-movie-title">
                                    Nổi Bật
                                </h3>
                                <ul class="watch-movie-filter">
                                    <li class="watch-movie-filter-item watch-movie-filter-item-active" data=1>
                                        Ngày
                                    </li>
                                    <li class="watch-movie-filter-item" data=2>
                                       Tuần 
                                    </li>
                                    <li class="watch-movie-filter-item" data=3>
                                        Tháng
                                    </li>

                                </ul>
                            </div>
                            <ul class="watch-movie-list">
                               
                            </ul>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="film-content-2">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p class="film-title">Diễn viên phim {{$info['title']}}</p>
                </div>
                <div class="col-12">
                    <div class="owl-carousel owl-theme">
                        @foreach($info['credits']['cast'] as $actor)                    
                            <div class="item">
                                <a href="/actor/{{$actor['id']}}" class="card-movie">
                                    @if(isset($actor['profile_path']))
                                        <img src="https://image.tmdb.org/t/p/w500/{{$actor['profile_path']}}" alt="" class="card-movie-img">
                                    @else  
                                        <img src=" https://titanliner.com/wp-content/uploads/2019/02/empty-img.jpg  " alt="" class="card-movie-img">                 
                                    @endif
                                </a>
                                <p class="actor-name slide-movie-title">
                                    {{$actor['original_name']}}
                                </p>
                                <p class="actor-name slide-movie-title-engl">
                                    {{$actor['character']}}
                                </p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="film-content-2">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p class="film-title">Nội dung phim {{$info['title']}}</p>
                    <p class = "film-content-2__text">
                        <strong>Phim {{$info['title']}}</strong>
                        -
                        <strong>{{$info['original_title']}}</strong>
                        {{$info['overview']}}
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="content-head">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <p class="content__title">Để lại đánh giá của bạn</p>
                        <ul class="nav">
                            <li class="nav-item nav-item__comment nav-active" data-value = ".comments">BÌNH LUẬN</li>
                            <li class="nav-item nav-item__review" data-value = ".reviews">REVIEWS</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <div class="tab-content">
                        <div class="tab-pane">
                            <div class="row">
                                <div class="col-12">
                                    <div class="comments active-1">
                                        <div class="comment-form">
                                            <div class="form form-comment">
                                                <div class="content-quote"></div>
                                                <textarea name="comment--content" cols="30" rows="10" class="form__textarea" id="comment-content" placeholder = "Để lại bình luận của bạn..."></textarea>
                                                <button class="form__btn" id="post--comment">GỬI</button>
                                                <span class="cmt-noti"></span>
                                            </div>
                                        </div>
                                        <div class="comment__main" idphim="{{$idphim}}">                                         
                                        </div>                                     
                                    </div>
                                    <div class="reviews">
                                        <div class="comment-content">
                                            <ul class="comments__list">
                                                <li class="comment">
                                                    <div class="comments__item">
                                                        <div class="comments__autor">
                                                            <div class = "box-info-3">
                                                                <img src="https://scontent.fsgn5-3.fna.fbcdn.net/v/t1.0-9/117251156_780671119335149_3490588943834725576_o.jpg?_nc_cat=110&ccb=2&_nc_sid=09cbfe&_nc_ohc=w7TVQWb0pt8AX8PGAJo&_nc_ht=scontent.fsgn5-3.fna&oh=4a755a559aad9f474aab31f662f3effb&oe=5FF117A3" alt="" class="comments__avatar">
                                                                <div class="box-info-1">
                                                                    <a href="" class="comments__name">
                                                                        Tống Hoàng
                                                                    </a>
                                                                    <span class="comments__time">2020-11-30 08:12:45</span>
                                                                </div>
                                                            </div>
                                                            <div class="rate-score">
                                                                <i class="fas fa-star"></i>
                                                                8.7
                                                            </div>
                                                        </div>
                                                        <div class="comments__text">
                                                            <div class="content_of_comment">
                                                                Phim xem bánh cuốn <3
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="comments__item">
                                                        <div class="comments__autor">
                                                            <div class = "box-info-3">
                                                                <img src="https://scontent.fsgn5-3.fna.fbcdn.net/v/t1.0-9/117251156_780671119335149_3490588943834725576_o.jpg?_nc_cat=110&ccb=2&_nc_sid=09cbfe&_nc_ohc=w7TVQWb0pt8AX8PGAJo&_nc_ht=scontent.fsgn5-3.fna&oh=4a755a559aad9f474aab31f662f3effb&oe=5FF117A3" alt="" class="comments__avatar">
                                                                <div class="box-info-1">
                                                                    <a href="" class="comments__name">
                                                                        Tống Hoàng
                                                                    </a>
                                                                    <span class="comments__time">2020-11-30 08:12:45</span>
                                                                </div>
                                                            </div>
                                                            <div class="rate-score">
                                                                <i class="fas fa-star"></i>
                                                                8.7
                                                            </div>
                                                        </div>
                                                        <div class="comments__text">
                                                            <div class="content_of_comment">
                                                                Phim xem bánh cuốn <3
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="comment-form">
                                            <form action="" class="form form-comment">
                                                <div class="content-quote"></div>
                                                <textarea name="" id="" cols="30" rows="10" class="form__textarea" placeholder = "Review..."></textarea>
                                                <button type = "submit" class="form__btn">GỬI</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="row">
                        <div class="col-12">
                            <p class="section__title">Có thể bạn thích...</p>
                        </div>
                        @if(count($info['similar']['results'])>8)
                            @for($i=0;$i<8;$i++)
                                <div class="col-6">
                                    <div class="card">
                                        <div class="card-cover">
                                            @if(isset($info['similar']['results'][$i]['poster_path']))
                                                <img src="https://image.tmdb.org/t/p/w500/{{$info['similar']['results'][$i]['poster_path']}}" alt="" class="img-film">
                                            @else
                                                <img src="https://titanliner.com/wp-content/uploads/2019/02/empty-img.jpg" alt="" class="img-film">
                                            @endif
                                            <span class="quality-1">HD</span>
                                            <a href="/movie/{{$info['similar']['results'][$i]['id']}}" class="card__play">
                                            <i class="far fa-play-circle"></i>
                                            </a>
                                        </div>
                                        <div class="card__content">
                                            <span class="cart-title">
                                                <a href="">{{$info['similar']['results'][$i]['title']}}</a>
                                            </span>
                                            <span class="title_origin">{{$info['similar']['results'][$i]['release_date']}}</span>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection