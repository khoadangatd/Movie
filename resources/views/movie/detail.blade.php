
@extends('layout.dash')
@section('css')
    <link rel="stylesheet" href="{{ asset('Doanweb/movie/detail.css')}}?v=<?php echo time(); ?>"> 
@endsection
@section('js')
    <script src="{{ asset('Doanweb/movie/movie.js')}}"></script>
@endsection
@section('title')
Phim
@endsection
@section('section')    
       <div class="details">
        <div class= "background" style="background-image: url('https://image.tmdb.org/t/p/w500/{{$info['poster_path']}}'); background-repeat : no-repeat; background-size : cover;background-position: center">
            <div class="background-detail">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <p class = "location">
                                <a href="{{asset('/')}}">Trang chủ</a>
                                <i class="fas fa-arrow-right"></i>
                                <a href="{{asset('/movie?p=1')}}">Phim</a>
                                <i class="fas fa-arrow-right"></i>
                                <span>{{$info['title']}}</span>
                            </p>
                            <p class="name-film">{{$info['title']}}</p>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-7 film-details">
                                    <div class="row box-info">
                                        <div class="col-4 box-info__img">
                                            <img src="https://image.tmdb.org/t/p/w500/{{$info['poster_path']}}" alt="">
                                            <i class="far fa-play-circle play-film"></i>
                                        </div>
                                        <div class="col-8 box-info__content">
                                            <div class="film-content">
                                                <ul class="film-meta">
                                                    <li>
                                                        <span>Tên gốc:  </span>
                                                        <p class="css-1">{{$info['original_title']}}</p>
                                                    </li>
                                                    <li>
                                                        <span>Thể loại:  </span>
                                                        @foreach($info['genres'] as $genre)
                                                        <p class="css-1">{{$genre['name']}}</p>
                                                        @endforeach
                                                    </li>
                                                    <li>
                                                        <span>Năm phát hành:  </span>
                                                        <p class="css-1">{{$info['release_date']}}</p>
                                                    </li>
                                                    <li>
                                                        <span>Thời lượng:   </span>
                                                        <p class="css-1">{{$info['runtime']}} phút</p>
                                                    </li>
                                                    <li>
                                                        <span>Ngôn ngữ:  </span>
                                                        <p class="css-1">{{$info['spoken_languages'][0]["english_name"]}}</p>
                                                    </li>
                                                    <li>
                                                        <span>Đạo diễn:  </span>
                                                        <p class="css-1"></p>
                                                    </li>
                                                    <li>
                                                        <span>Diễn viên:  </span>
                                                        @for($i=0;$i<5;$i++)
                                                            <p class="css-1">
                                                                {{$info['credits']['cast'][$i]['name']}}
                                                                @if($i!=4)
                                                                ,
                                                                @endif
                                                            </p>
                                                        @endfor
                                                    </li>
                                                    <li>
                                                        <span>Đánh giá phim:  </span>
                                                        <span class="rate">
                                                            <i class="fas fa-star rate-act"></i>
                                                            <i class="fas fa-star rate-act"></i>
                                                            <i class="fas fa-star rate-act"></i>
                                                            <i class="fas fa-star rate-act"></i>
                                                            <i class="fas fa-star rate-act"></i>
                                                        </span>
                                                        <span class="rated">
                                                            (
                                                            <i class="fas fa-star rate-act rate-act__color"></i>
                                                            <span class="rating-score">2.5</span>
                                                            /
                                                            <span class="total_rating">6</span>
                                                            lượt)
                                                        </span>
                                                    </li>
                                                </ul>
                                                <div class = "watch">
                                                    <a href="" class="watch-eps">
                                                        <button class = " select-1"> 
                                                        <i class="fas fa-video"></i> Xem phim
                                                        </button>
                                                    </a>
                                                    <a href="" class="watch-eps">
                                                        <form action="" method="post">
                                                            <button class = " select-1"> 
                                                                <i class="fas fa-heart"></i> Yêu thích
                                                            </button>
                                                        </form>
                                                    </a>
                                                </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-5 trailer d-flex align-items-end">
                                    <div class="support css-2">
                                        <div class = "love">
                                            <button>
                                                <i class="fas fa-thumbs-up "></i>
                                                    Thích
                                            </button>
                                            <button>
                                                Chia sẻ
                                            </button>
                                            <span class = "text-1">Tống Đức Hoàng</span>
                                            <span class = "text-2">và 68k người khác thích nội dung này</span>
                                        </div>
                                        <div class="share">
                                            <span>Share: </span>
                                            <i class="fab fa-facebook-square facebook"></i>
                                            <i class="fab fa-instagram-square insta"></i>
                                            <i class="fab fa-twitter twitter"></i>
                                            <i class="fab fa-youtube youtube"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                    <p class="film-title">Nội dung phim {{$info['title']}}</p>
                    <p class = "film-content-2__text">
                        <strong>Phim {{$info['title']}}</strong>
                        -
                        <strong>{{$info['original_title']}}</strong>
                        {{$info['overview']}}
                    </p>
                    <div class="tag-content">
                        <a href="">
                            <i class="fas fa-tag"></i>
                            Phimnhanh - Xem Phim nhanh - Phim Hay Nhất
                        </a>
                        <a href="">
                            <i class="fas fa-tag"></i>
                             Vuighe - Xem Phim Phim Tình Cảm - Hài Hước
                        </a>
                        <a href=""> 
                            <i class="fas fa-tag"></i>
                            cuộc gọi
                        </a>
                        <a href="">
                            <i class="fas fa-tag"></i>
                            call
                        </a>
                        <a href="">
                            <i class="fas fa-tag"></i>
                            the call
                        </a>
                    </div>
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
                            <li class="nav-item nav-item__comment active" data-value = ".comments">BÌNH LUẬN</li>
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
                                            <form action="" class="form form-comment">
                                                <div class="content-quote"></div>
                                                <textarea name="" id="" cols="30" rows="10" class="form__textarea" placeholder = "Để lại bình luận của bạn..."></textarea>
                                                <button type = "submit" class="form__btn">GỬI</button>
                                            </form>
                                        </div>
                                        <div class="comment-content">
                                            <ul class="comments__list">
                                                <li class="comment">
                                                    <div class="comments__item">
                                                        <div class="comments__autor">
                                                            <img src="https://scontent.fsgn5-3.fna.fbcdn.net/v/t1.0-9/117251156_780671119335149_3490588943834725576_o.jpg?_nc_cat=110&ccb=2&_nc_sid=09cbfe&_nc_ohc=w7TVQWb0pt8AX8PGAJo&_nc_ht=scontent.fsgn5-3.fna&oh=4a755a559aad9f474aab31f662f3effb&oe=5FF117A3" alt="" class="comments__avatar">
                                                            <div class="box-info-1">
                                                                <a href="" class="comments__name">
                                                                    Tống Hoàng
                                                                </a>
                                                                <span class="comments__time">2020-11-30 08:12:45</span>
                                                            </div>
                                                        </div>
                                                        <div class="comments__text">
                                                            <div class="content_of_comment">
                                                                Đĩnh của đĩnh
                                                            </div>
                                                        </div>
                                                        <div class="comments__actions">
                                                            <div class="comments__rate">
                                                                <button>
                                                                    <i class="fas fa-thumbs-up like"></i>
                                                                    0
                                                                </button>
                                                                <button>
                                                                <i class="fas fa-thumbs-down dislike"></i>
                                                                    0
                                                                </button>
                                                            </div>
                                                            <div class="feedback">
                                                                <button class="reply">
                                                                    <i class="fas fa-reply"></i>
                                                                    REPLY
                                                                </button>
                                                                <button class="quote">
                                                                <i class="fas fa-quote-right"></i>
                                                                    QUOTE
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="comment-content">
                                            <ul class="comments__list">
                                                <li class="comment">
                                                    <div class="comments__item">
                                                        <div class="comments__autor">
                                                            <img src="https://scontent.fsgn5-3.fna.fbcdn.net/v/t1.0-9/117251156_780671119335149_3490588943834725576_o.jpg?_nc_cat=110&ccb=2&_nc_sid=09cbfe&_nc_ohc=w7TVQWb0pt8AX8PGAJo&_nc_ht=scontent.fsgn5-3.fna&oh=4a755a559aad9f474aab31f662f3effb&oe=5FF117A3" alt="" class="comments__avatar">
                                                            <div class="box-info-1">
                                                                <a href="" class="comments__name">
                                                                    Tống Hoàng
                                                                </a>
                                                                <span class="comments__time">2020-11-30 08:12:45</span>
                                                            </div>
                                                        </div>
                                                        <div class="comments__text">
                                                            <div class="content_of_comment">
                                                                Đĩnh của đĩnh
                                                            </div>
                                                        </div>
                                                        <div class="comments__actions">
                                                            <div class="comments__rate">
                                                                <button>
                                                                    <i class="fas fa-thumbs-up like"></i>
                                                                    0
                                                                </button>
                                                                <button>
                                                                <i class="fas fa-thumbs-down dislike"></i>
                                                                    0
                                                                </button>
                                                            </div>
                                                            <div class="feedback">
                                                                <button class="reply">
                                                                    <i class="fas fa-reply"></i>
                                                                    REPLY
                                                                </button>
                                                                <button class="quote">
                                                                <i class="fas fa-quote-right"></i>
                                                                    QUOTE
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
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
                        <div class="col-6">
                            <div class="card">
                                <div class="card-cover">
                                    <img src="https://xemphimplus.net/images/img_poster/tim-thay-con.medium.webp" alt="" class="img-film">
                                    <span class="quality-1">HD</span>
                                    <span class="time">102 phút</span>
                                    <a href="" class="card__play">
                                    <i class="far fa-play-circle"></i>
                                    </a>
                                </div>
                                <div class="card__content">
                                    <span class="cart-title">
                                        <a href="">Tìm Thấy Con</a>
                                    </span>
                                    <span class="title_origin">Lost, Found</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card">
                                <div class="card-cover">
                                    <img src="https://xemphimplus.net/images/img_poster/tim-thay-con.medium.webp" alt="" class="img-film">
                                    <span class="quality-1">HD</span>
                                    <span class="time">102 phút</span>
                                    <a href="" class="card__play">
                                        <i class="far fa-play-circle"></i>
                                    </a>
                                </div>
                                <div class="card__content">
                                    <span class="cart-title">
                                        <a href="">Tìm Thấy Con</a>
                                    </span>
                                    <span class="title_origin">Lost, Found</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card">
                                <div class="card-cover">
                                    <img src="https://xemphimplus.net/images/img_poster/tim-thay-con.medium.webp" alt="" class="img-film">
                                    <span class="quality-1">HD</span>
                                    <span class="time">102 phút</span>
                                    <a href="" class="card__play">
                                        <i class="far fa-play-circle"></i>
                                    </a>
                                </div>
                                <div class="card__content">
                                    <span class="cart-title">
                                        <a href="">Tìm Thấy Con</a>
                                    </span>
                                    <span class="title_origin">Lost, Found</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card">
                                <div class="card-cover">
                                    <img src="https://xemphimplus.net/images/img_poster/tim-thay-con.medium.webp" alt="" class="img-film">
                                    <span class="quality-1">HD</span>
                                    <span class="time">102 phút</span>
                                    <a href="" class="card__play">
                                        <i class="far fa-play-circle"></i>
                                    </a>
                                </div>
                                <div class="card__content">
                                    <span class="cart-title">
                                        <a href="">Tìm Thấy Con</a>
                                    </span>
                                    <span class="title_origin">Lost, Found</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card">
                                <div class="card-cover">
                                    <img src="https://xemphimplus.net/images/img_poster/tim-thay-con.medium.webp" alt="" class="img-film">
                                    <span class="quality-1">HD</span>
                                    <span class="time">102 phút</span>
                                    <a href="" class="card__play">
                                        <i class="far fa-play-circle"></i>
                                    </a>
                                </div>
                                <div class="card__content">
                                    <span class="cart-title">
                                        <a href="">Tìm Thấy Con</a>
                                    </span>
                                    <span class="title_origin">Lost, Found</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card">
                                <div class="card-cover">
                                    <img src="https://xemphimplus.net/images/img_poster/tim-thay-con.medium.webp" alt="" class="img-film">
                                    <span class="quality-1">HD</span>
                                    <span class="time">102 phút</span>
                                    <a href="" class="card__play">
                                        <i class="far fa-play-circle"></i>
                                    </a>
                                </div>
                                <div class="card__content">
                                    <span class="cart-title">
                                        <a href="">Tìm Thấy Con</a>
                                    </span>
                                    <span class="title_origin">Lost, Found</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card">
                                <div class="card-cover">
                                    <img src="https://xemphimplus.net/images/img_poster/tim-thay-con.medium.webp" alt="" class="img-film">
                                    <span class="quality-1">HD</span>
                                    <span class="time">102 phút</span>
                                    <a href="" class="card__play">
                                        <i class="far fa-play-circle"></i>
                                    </a>
                                </div>
                                <div class="card__content">
                                    <span class="cart-title">
                                        <a href="">Tìm Thấy Con</a>
                                    </span>
                                    <span class="title_origin">Lost, Found</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card">
                                <div class="card-cover">
                                    <img src="https://xemphimplus.net/images/img_poster/tim-thay-con.medium.webp" alt="" class="img-film">
                                    <span class="quality-1">HD</span>
                                    <span class="time">102 phút</span>
                                    <a href="" class="card__play">
                                        <i class="far fa-play-circle"></i>
                                    </a>
                                </div>
                                <div class="card__content">
                                    <span class="cart-title">
                                        <a href="">Tìm Thấy Con</a>
                                    </span>
                                    <span class="title_origin">Lost, Found</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection