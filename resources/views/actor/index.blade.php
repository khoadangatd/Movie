@extends('layout.dash')
@section('css')
    <link rel="stylesheet" href="{{ asset('Doanweb/actor/actor.css')}}?v=<?php echo time(); ?>"/>
    <link rel="stylesheet" href="{{ asset('Doanweb/profile/style.css')}}?v=<?php echo time(); ?>"/>
@endsection
@section('js')
    <script src="{{ asset('Doanweb/actor/actor.js')}}"></script>
@endsection
@section('title')
Diễn viên
@endsection
@section('section')
<div class="main">
    <div class="main__heading">
        <div class="container">
            <div class="row ">
                <div class="col-lg-12">
                    <div class="main__heading__child">
                        <h1 class="main__heading__child--title">Danh Sách Diễn Viên
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main__actor">
        <div class="container">
            <div class="row ">
                @foreach($actors as $actor) 
                <div class="col-lg-3 main__actor__item">
                    <a href="/actor/{{$actor['id']}}">
                        <img src="https://image.tmdb.org/t/p/w500/{{$actor['profile_path']}}" alt="" class="main__actor__img">
                    </a>
                    <div class="main__actor__name">{{$actor['name']}}</div>
                    <div class="main__actor__film">
                        @foreach($actor['known_for'] as $film)
                            @if(isset($film['title']))
                                {{$film['title']}}.
                            @elseif(isset($film['original_name']))
                                {{$film['original_name']}}.
                            @endif
                        @endforeach
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