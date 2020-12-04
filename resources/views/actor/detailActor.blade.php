@extends('layout.dash')
@section('css')
<link rel="stylesheet" href="{{ asset('Doanweb/profile/style.css')}}" />
<link rel="stylesheet" href="{{ asset('Doanweb/actor/detailActor.css')}}?v=<?php echo time(); ?>" />
@endsection
@section('js')
@endsection
@section('title')
{{$actor['name']}}
@endsection
@section('section')
<div class="main__heading">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="main__heading__child">
                    <h1 class="main__heading__child--title">HỒ SƠ DIỄN VIÊN
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
                                Diễn viên
                            </p>
                        </div>
                        <div class="main__heading__child__breadcrumb__item">
                            <i class="fas fa-long-arrow-alt-right"></i>
                        </div>
                        <div class="main__heading__child__breadcrumb__item">
                            <p>
                                {{$actor['name']}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="actor-profile">
    <div class="container">
        <div class="row">
            <div class="col-4">
                <div class="actor-profile-img-wrap">
                    <img src="https://image.tmdb.org/t/p/w500/{{$actor['profile_path']}}" alt="" class="actor-profile-img">
                    <div class="actor-profile-social">
                        <i class="fab fa-facebook-square"></i>
                        <i class="fab fa-instagram-square"></i>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="actor-detail">
                    <p class="actor-detail-name">
                        {{$actor['name']}}
                    </p>
                    <p class="actor-detail-date">
                        {{$actor['birthday']}} In {{$actor['place_of_birth']}}
                    </p>
                    <p class="actor-detail-sumary">
                        {{$actor['biography']}}
                    </p>
                    <div class="actor-detail-related">
                        <h3 class="actor-detail-related-title">
                            Known For
                        </h3>
                        <ul class="actor-detail-related-img-list">
                            @for ($i=1;$i<6;$i++) <li class="actor-detail-related-img-item">
                                @if(!isset($actor['movie_credits']['cast'][$i]['poster_path']))
                                <a href="/movie/{{$actor['movie_credits']['cast'][$i]['id']}}">
                                    <img src="https://titanliner.com/wp-content/uploads/2019/02/empty-img.jpg" alt="" class="actor-detail-related-img">
                                </a>
                                <p class="actor-detail-related-img-name">
                                    {{($actor['movie_credits']['cast'][$i]['original_title'])}}
                                </p>
                                @else
                                <a href="/movie/{{$actor['movie_credits']['cast'][$i]['id']}}">
                                    <img src="https://image.tmdb.org/t/p/w500/{{($actor['movie_credits']['cast'][$i]['poster_path'])}}" alt="" class="actor-detail-related-img">
                                </a>
                                <p class="actor-detail-related-img-name">
                                    {{($actor['movie_credits']['cast'][$i]['original_title'])}}
                                </p>
                                </li>
                                @endif
                                @endfor
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="actor-credits">
    <div class="container">
        <h3 class="actor-credits-title">
            Credits
        </h3>
        <ul class="actor-credits-list">
            @foreach($actor['movie_credits']['cast'] as $value)
            <li class="actor-credits-item">
                <span class="actor-credits-item-year">
                    @if(isset($value['release_date']))
                    @if($value['release_date']=="")
                    Không Xác Định :
                    @else
                    {{$value['release_date']}} :
                    @endif
                    @else
                    Không Xác Định :
                    @endif
                </span>
                <span class="actor-credits-item-content">
                    {{$value['title']}}
                </span>
                <span class="actor-credits-item-character">
                    as {{$value['character']}}
                </span>
            </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection