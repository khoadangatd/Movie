@extends('layout.dash')
@section('css')
<link rel="stylesheet" href="{{ asset('Doanweb/profile/style.css')}}" />
<link rel="stylesheet" href="{{ asset('Doanweb/movie/movie.css')}}?v=<?php echo time(); ?>" />
@endsection
@section('js')
    <script src="{{ asset('Doanweb/movie/movie.js')}}"></script>
@endsection
@section('title')
Phim
@endsection
@section('section')
<div class="main">
    <div class="main__heading main__heading--movie">
        <div class="container">
            <div class="row ">
                <div class="col-lg-12">
                    <div class="main__heading__child">
                        <h1 class="main__heading__child--title">Phim Mới Nhất
                        </h1>
                        <div class="main__heading__child__breadcrumb">
                            <div class="main__heading__child__breadcrumb__item">
                                <p><a href="{{route('home')}}" class="home--tag-a">Trang chủ</a></p>
                            </div>
                            <div class="main__heading__child__breadcrumb__item">
                                <i class="fas fa-long-arrow-alt-right"></i>
                            </div>
                            <div class="main__heading__child__breadcrumb__item">
                                <p>
                                    Phim mới nhất
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main__profile">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="movie-filter d-flex">
                        <div class="movie-filter__item">
                            <p class="movie-filter__item__title">Chuyên mục</p>
                            <div class="movie-filter__item__content">
                                Tất cả
                            </div>
                        </div>
                        <div class="movie-filter__item">
                            <p class="movie-filter__item__title">Quốc Gia</p>
                            <div class="movie-filter__item__content">
                                Tất cả
                            </div>
                        </div>
                        <div class="movie-filter__item">
                            <p class="movie-filter__item__title">IMBd</p>
                            <div class="movie-filter__item__content">
                                0.0 - 8.6
                            </div>
                        </div>
                        <div class="movie-filter__item">
                            <p class="movie-filter__item__title">Năm</p>
                            <div class="movie-filter__item__content">
                                1999 - 2020
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 " style='text-align:right'>
                    <div class="nav-login custom-filter-btn">Lọc</div>
                </div>
            </div>
        </div>
    </div>
    <div class="main__movie">
        <div class="container">
            <div class="row">
                @foreach($movies as $movie)
                <?php
                    $ten=""; 
                    $urlD="https://api.themoviedb.org/3/movie/".$movie['id']."?api_key=12baa83af9302206b6af65913d262a81&language=en-US";
                    $curl = curl_init();
                    curl_setopt_array($curl, array(
                      CURLOPT_URL => $urlD,
                      CURLOPT_RETURNTRANSFER => true,
                      CURLOPT_TIMEOUT => 30,
                      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                      CURLOPT_CUSTOMREQUEST => "GET",
                      CURLOPT_HTTPHEADER => array(
                        "cache-control: no-cache"
                      ),
                    ));
                    $detail = curl_exec($curl);
                    curl_close($curl);
                    $detail=json_decode($detail);
                    if(isset($detail->spoken_languages[0]))
                        $qg=$detail->spoken_languages[0]->english_name;
                    else
                        $qg="Chưa xác định";
                    if($detail->runtime==0)
                        $detail->runtime="Sắp ra mắt";
                    else
                        $detail->runtime="Thời gian : ".$detail->runtime." phút";
                    foreach($detail->genres as $genres)
                    {
                        $ten=$ten.$genres->name." ";
                    }
                ?>
                <div class='col-6 mt-5 d-flex'>
                    <a href='/movie/{{$movie["id"]}}'>
                        <div class='movie-img'>
                            <img src='https://image.tmdb.org/t/p/w500/{{$movie["poster_path"]}}' alt='' class='movie-img-item'>
                            <span class='quality'>FullHD</span>
                        </div>
                    </a>
                    <div class='movie-content'>
                        <h3 class='movie-content-title'>
                            {{$movie["title"]}}
                        </h3>
                        <p class="movie-content-title-engl">
                            <?php echo $detail->runtime?>
                        </p>
                        <p class='movie-content-category'>
                            Thể loại : <?php echo $ten;?>
                        </p>
                        <p class="movie-content-country">
                            Ngôn ngữ : <?php echo $qg?>
                        </p>
                        <p class='movie-content-imbd'>
                            iMDb {{$movie["vote_average"]}}
                        </p>
                        <p class='movie-content-title-engl'>
                            {{$movie["release_date"]}}
                        </p>
                        <p class='movie-content-desc'>
                            {{$movie["overview"]}}
                        </p>
                    </div>
                </div>
                @endforeach
                
                <div class="col-12" style='text-align:center'>
                    <div class="pagination" page={{$page}}>
                        <span class="pagination__btn pagination__btn-left"><i class="fas fa-angle-left"></i></span>
                        <div class="pagination-custom">
                            
                        </div>
                        <span class="pagination__btn pagination__btn-right"><i class="fas fa-angle-right"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection