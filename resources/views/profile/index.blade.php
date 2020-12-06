@extends('layout.dash')
@section('css')
    <link rel="stylesheet" href="{{ asset('Doanweb/profile/style.css')}}"/>
@endsection
@section('js')
    <script src="{{ asset('Doanweb/profile/index.js')}}"></script>
@endsection
@section('title')
    Hồ Sơ
@endsection
@section('section')
    <div class="main">
        <div class="main__heading">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="main__heading__child">
                            <h1 class="main__heading__child--title">HỒ SƠ : {{$Nuser->tenuser}}
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
                                    {{$Nuser->tenuser}}
                                    </p> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if(isset(session('user')->id)&&session('user')->id==$Nuser->id)
        <div class="main__profile">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="main__profile__child">
                            <div class="main__profile__child__item">
                                <img src="{{asset('/Doanweb/avatarmember.jpg')}}" alt="avatar" class="main__profile__child__img__main">
                                <h3 class="main__profile__child__item__name"> {{$Nuser->tenuser}}</h3>
                                <h3 class="main__profile__child__item__category active__category"> Hồ sơ</h3>
                                <h3 class="main__profile__child__item__category"> Yêu thích</h3>
                            </div>
                            <div class="main__profile__child__item">
                                <a href="{{asset('logout')}}">
                                    <button class="nav-login">ĐĂNG XUẤT</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main__detail resume">
            <div class="container">
                <div class="main__detail__child row">
                    <div class="col-lg-6">
                        <div class="main__detail__child__contain">
                            <form action="{{asset('updateuser')}}" class="main__detail__child__item" METHOD="POST" id="update-user">
                                @csrf
                                <div class="row main__detail__child__item__small">
                                    <div class="col-lg-6">
                                        <h3>Chi tiết hồ sơ</h3>
                                    </div>
                                </div>
                                <div class="row main__detail__child__item__small">
                                    <div class="col-lg-6">
                                        <label for="main__detail__child__item__name" class="input--label">Tên tài khoản</label>
                                        <input type="text" id="main__detail__child__item__name" class="input" value="{{$Nuser->tenuser}}" name="nametk">
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="main__detail__child__item__username" class="input--label">Username</label>
                                        <input type="text" id="main__detail__child__item__username" class="input" value="{{$Nuser->username}}" name="username">
                                    </div>
                                </div>
                                <!-- <div class="row main__detail__child__item__small">
                                    <div class="col-lg-6">
                                        <label for="main__detail__child__item__username" class="input--label">Tên user</label>
                                        <input type="text" id="main__detail__child__item__username" class="input" value="{{session('user')->tenuser}}" name="username">
                                    </div>
                                </div> -->
                                <div class="row main__detail__child__item__small">
                                    <div class="col-lg-3">
                                        <input type="submit" name="update1" class="nav-login input" value="Lưu">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="main__detail__child__contain">
                            <form action="{{asset('updatepassword')}}" class="main__detail__child__item" METHOD="POST" id="update-password">
                                @csrf
                                <div class="row main__detail__child__item__small">
                                    <div class="col-lg-6">
                                        <h3>Thay đổi mật khẩu</h3>
                                    </div>
                                </div>
                                <div class="row main__detail__child__item__small">
                                    <div class="col-lg-6">
                                        <label for="main__detail__child__item__name" class="input--label">Mật khẩu cũ</label>
                                        <input type="password" class="input" value="" name="passwordold">
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="main__detail__child__item__email" class="input--label">Mật khẩu mới</label>
                                        <input type="password" id="passwordnew" class="input" value="" name="passwordnew">
                                    </div>
                                </div>
                                <div class="row main__detail__child__item__small">
                                    <div class="col-lg-6">
                                        <label for="main__detail__child__item__username" class="input--label">Xác nhận mật khẩu mới</label>
                                        <input type="password" id="main__detail__child__item__username" class="input" value="" name="passwordnew1">
                                    </div>
                                </div>
                                <div class="row main__detail__child__item__small">
                                    <div class="col-lg-3">
                                        <input type="submit" name="update2" class="nav-login input" value="Lưu">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main__detail favorite">
            <div class="container">
                <div class="main__detail__child__contain">
                    <h2 class="main__detail__title">Phim yêu thích của bạn</h2>
                    <div class="row">
                        <div class="main__film col-lg-2">
                            <a href="">
                                <img src="https://image.tmdb.org/t/p/w500//h8Rb9gBr48ODIwYUttZNYeMWeUU.jpg" alt="" class="main__film__img">
                            </a>
                            <p class="main__detail__namefilm">
                                Joker
                            </p>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
        @else
        <div class="main__profile">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="main__profile__child">
                            <div class="main__profile__child__item">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR-mHFh8u6UvSXY3spw5oHgyZHKNmNOdgFJ9w&usqp=CAU" alt="avatar" class="main__profile__child__img__main">
                                <h3 class="main__profile__child__item__name">{{$Nuser->tenuser}}</h3>
                                <h3 class="main__profile__child__item__category active__category"> Yêu thích</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main__detail">
            <div class="container">
                <div class="main__detail__child__contain">
                    <h2 class="main__detail__title">Phim yêu thích của {{$Nuser->tenuser}}</h2>
                    <div class="row">
                        <div class="main__film col-lg-2">
                            <a href="">
                                <img src="https://image.tmdb.org/t/p/w500//h8Rb9gBr48ODIwYUttZNYeMWeUU.jpg" alt="" class="main__film__img">
                            </a>
                            <p class="main__detail__namefilm">
                                Joker
                            </p>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
        @endif
    </div>
@endsection