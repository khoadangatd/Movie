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
@if(isset($keyword))
<div class="main">
    <div class="main__heading main__heading--movie">
        <div class="container">
            <div class="row ">
                <div class="col-lg-12">
                    <div class="main__heading__child">
                        <h1 class="main__heading__child--title">Từ khóa :{{$keyword}}
                        </h1>
                        <div class="main__heading__child__breadcrumb">
                            <div class="main__heading__child__breadcrumb__item">
                                <p><a href="{{route('home')}}" class="home--tag-a">Trang chủ</a></p>
                            </div>
                            <div class="main__heading__child__breadcrumb__item">
                                <i class="fas fa-long-arrow-alt-right"></i>
                            </div>
                            <div class="main__heading__child__breadcrumb__item">
                                <p><a href="{{route('home')}}" class="home--tag-a">Tìm kiếm</a></p>
                            </div>
                            <div class="main__heading__child__breadcrumb__item">
                                <i class="fas fa-long-arrow-alt-right"></i>
                            </div>
                            <div class="main__heading__child__breadcrumb__item">
                                <p>
                                    {{$keyword}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@else
<div class="main">
    <div class="main__heading main__heading--movie">
        <div class="container">
            <div class="row ">
                <div class="col-lg-12">
                    <div class="main__heading__child">
                        <h1 class="main__heading__child--title">{{$title}}
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
                                    {{$title}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
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
                @if(isset($title)&&$title=="Phim bộ")
                    @foreach($movies as $movie)
                        <?php
                            $ten=""; 
                            $urlD="https://api.themoviedb.org/3/tv/".$movie['id']."?api_key=12baa83af9302206b6af65913d262a81&language=en-US";
                            $detail=file_get_contents($urlD);
                            $detail=json_decode($detail);
                            if(isset($detail->spoken_languages[0]))
                                $qg=$detail->spoken_languages[0]->english_name;
                            else
                                $qg="Chưa xác định";
                            if($detail->episode_run_time[0]==0)
                                $detail->episode_run_time[0]="Sắp ra mắt";
                            else
                                $detail->episode_run_time[0]="Thời gian : ".$detail->episode_run_time[0]." phút";
                            foreach($detail->genres as $genres)
                            {
                                $genres->name=str_replace("Phim","",$genres->name);
                                $ten=$ten.$genres->name." ";
                            }
                        ?>
                        <div class='col-6 mt-5 d-flex'>
                            <a href='/tvshow/{{$movie["id"]}}'>
                                <div class='movie-img'>
                                    @if(isset($movie["poster_path"]))
                                        <img src='https://image.tmdb.org/t/p/w500/{{$movie["poster_path"]}}' alt='' class='movie-img-item'>
                                    @else
                                        <img src='https://titanliner.com/wp-content/uploads/2019/02/empty-img.jpg' alt='' class='movie-img-item'>
                                    @endif
                                    <span class='quality'>FullHD</span>
                                    <span class='episode'><?php echo $detail->number_of_episodes ?> tập</span>
                                </div>
                            </a>
                            <div class='movie-content'>
                                <h3 class='movie-content-title'>
                                    {{$movie["original_name"]}}
                                </h3>
                                <p class="movie-content-title-engl">
                                    <?php echo $detail->episode_run_time[0];?>
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
                                    @if(isset($movie["first_air_date"]))
                                        {{$movie["first_air_date"]}}
                                    @else
                                        Chưa xác định
                                    @endif
                                </p>
                                <p class='movie-content-desc'>
                                    {{$movie["overview"]}}
                                </p>
                            </div>
                        </div>
                    @endforeach
                @else
                    @foreach($movies as $movie)
                        <?php
                            $ten=""; 
                            $urlD="https://api.themoviedb.org/3/movie/".$movie['id']."?api_key=12baa83af9302206b6af65913d262a81&language=vi";
                            $detail=file_get_contents($urlD);
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
                                $genres->name=str_replace("Phim","",$genres->name);
                                $ten=$ten.$genres->name." ";
                            }
                        ?>
                        <div class='col-6 mt-5 d-flex'>
                            <a href='/movie/{{$movie["id"]}}'>
                                <div class='movie-img'>
                                    @if(isset($movie["poster_path"]))
                                        <img src='https://image.tmdb.org/t/p/w500/{{$movie["poster_path"]}}' alt='' class='movie-img-item'>
                                    @else
                                        <img src='https://titanliner.com/wp-content/uploads/2019/02/empty-img.jpg' alt='' class='movie-img-item'>
                                    @endif
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
                                    @if(isset($movie["release_date"]))
                                        {{$movie["release_date"]}}
                                    @else
                                        Chưa xác định
                                    @endif
                                </p>
                                <p class='movie-content-desc'>
                                    {{$movie["overview"]}}
                                </p>
                            </div>
                        </div>
                    @endforeach
                @endif            
                <div class="col-12" style='text-align:center'>
                    @if(isset($keyword))
                    <div class="pagination" page={{$page}} keyword='{{$keyword}}' totalP={{$total}}>
                        <a href="/movie?p=1&k={{$keyword}}" class="pagination__btn">
                            <i class="fas fa-angle-double-left"></i></span>
                        </a>
                        <span class="pagination__btn pagination__btn-left"><i class="fas fa-angle-left"></i></span>
                        <div class="pagination-custom">
                        </div>
                        <span class="pagination__btn pagination__btn-right"><i class="fas fa-angle-right"></i></span>
                        <a href="/movie?p={{$total}}&k={{$keyword}}" class="pagination__btn">
                            <i class="fas fa-angle-double-right"></i></span>
                        </a>
                    </div>
                    @else
                    <div class="pagination" page={{$page}} totalP={{$total}}>
                        <a href="/movie?p=1" class="pagination__btn">
                            <i class="fas fa-angle-double-left"></i></span>
                        </a>
                        <span class="pagination__btn pagination__btn-left"><i class="fas fa-angle-left"></i></span>
                        <div class="pagination-custom">
                        </div>
                        <span class="pagination__btn pagination__btn-right"><i class="fas fa-angle-right"></i></span>
                        <a href="/movie?p={{$total}}" class="pagination__btn">
                            <i class="fas fa-angle-double-right"></i></span>
                        </a>
                    </div>
                    @endif
                </div>
            </div>
            <div style="text-align:center; margin-bottom:30px">Có {{$total}} trang tìm thấy</div>
        </div>
    </div>
</div>
@endsection