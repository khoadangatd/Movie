@extends('layout.dash')
@section('css')
    <link rel="stylesheet" href="{{ asset('Doanweb/admin/admin.css')}}?v=<?php echo time(); ?>"> 
    <link rel="stylesheet" href="{{ asset('Doanweb/profile/style.css')}}" />

@endsection
@section('js')
    <script src="{{ asset('Doanweb/movie/movie.js')}}?v=<?php echo time(); ?>"></script>
    <script src="{{ asset('Doanweb/admin/admin.js')}}?v=<?php echo time(); ?>"></script>
@endsection
@section('title')
    Bảng điều khiển
@endsection
@section('section')    
<div class="main">
    <div class="main__heading main__heading--movie">
        <div class="container">
            <div class="row ">
                <div class="col-lg-12">
                    <div class="main__heading__child">
                        <h1 class="main__heading__child--title">BẢNG ĐIỀU KHIỂN
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
                                    Bảng điều khiển
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
    <div class="admin">
        <div class="container">
            <ul class="admin-menu">
                <li class="admin-item">
                    NGƯỜI DÙNG
                </li>
            </ul>
            <div class="admin-main">
                <div class="row">
                  @foreach($users as $user)
                    <div class="col-3">
                        <div class="admin-user">
                            <div class="admin-user-img">
                                <img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxQHBg0QEBIPEA4QEBEQFRgQDRcQExAaFhUWFiATFRUYHSggGB4lGxgWITEhJSkrLi4uFx8zODMsNygtLisBCgoKDQ0NFQ0NDy0ZFRkrLSs3Ky0tLisrKzctNy0rNystLS0rKysrKy0rLSsrKysrKysrKysrKysrKysrKysrK//AABEIAOEA4QMBIgACEQEDEQH/xAAbAAEAAwEBAQEAAAAAAAAAAAAAAwQFAgYBB//EADQQAQACAAMFBQcCBwEAAAAAAAABAgMEEQUSITFhQVFxgbETIlKRocHRFDQyQnKCkuHxJP/EABYBAQEBAAAAAAAAAAAAAAAAAAABAv/EABYRAQEBAAAAAAAAAAAAAAAAAAABEf/aAAwDAQACEQMRAD8A/TAGkAAAAAAAAAAAAAAAAAAAAAAAAAAAAABAAAAAAAHVKTiW0iJmegOX2I1nSOM9F2mzL25zWv1lo5fLVy9eEce2Z5yauMzC2de8cdKx15/KE9dld9p8qtITVZ07Kj4p/wAUd9l2jlaJ8Y0aoaMHFyl8LnWdO+OMIHpVTNZGuNEzHu2747fGDUxijvFwpwbzW0aT69YcKgAAAAAAAAAAAAAAAAAA3Mjl/YYMfFPGfwx8vTfzFI77Q9ClWACKAAAAAAgzmXjMYWn80cpYUxuzMTzjg9IyNq4W5jxaOVo+sLEqiAqAAAAAAAAAAAAAAAALOz41zlPP0luMPZv7yvn6S3EqwARQAAAAABS2rTeyuvwzE/b7rqttGf8Ax316esAwwGmQAAAAAAAAAAAAAAAFrZ37ynn6S22FkJ0zlPH7S3UqwARQAAAAABibStM5u0azpGmnHlwhtsHPTrnL+P2WCABWQAAAAAAAAAAAAAAAE+SiZzNJiJmItHZybyHJ03MtSI7on5pkrQAgAAAAAAMDNxP6m+sTGtp5xz4t9U2nTeylp7Y0mPmsGKArIAAAAAAAAAAAAAAADc2fffylOnD5LLN2PicL1/uj0/DSZaAAAAAAAAFLa193LafFMR8uK6ydr4m9jVr8MeqwUAFZAAAAAAAAABQAAAAAEmXxpwMWLR/1t5XH/UYMW005xprrowGnsfE4Xr/d9vwlGkAigAAAAAIM3mP02Frprx056MPExJxMSbTzmdWhti/GlfGft+Wa1EAAAAAAAAAAABAAAAAABNlMb2GPW3ZynwlCA9LE6wKWysSb5eYn+WdIXWWgAAAAFbaN5plLadI+YMrOYvtszaezlHhCAGkABAAAAAAAAAAAAAAAAAAGxsmNMtPW0+kLqts+m5k6ddZ+c6rLLQAAAArbRjXJ38p+sLKPMU38C8d9Zj6A88A0yAAAAAAAAAAAAAAAAAAOqV37xEc5nQpSb20iJmejVyGS9jO9b+L0FXaxu1iO6NH0GVAAAAAAefzWH7LMWjrrHhKJt57KfqK6xwtHLr0lj4mHOFbS0TEtRHAAgAAAAAAAAAAAAPsRvTpHGei9l9mzfjf3Y7o5/wChVGtd+2kRMz0X8vsybcbzpHdHP5tHBwK4NdKxEes+aRNMR4WDXBrpWIhICKAAAAAAAAOcTDjErpaImOroBmZjZnbSfKftLPxMOcO2lomJ6vRuMTDjFrpaImOq6jzo0cxszTjSdek/aVC9JpbSYmJ6qOQBAAAAAH2OMg+LeVyNsbjPu1+s+ELeSyG5EWvxt2R2R+ZX01cRYGXrgR7sce+eMz5pQRQAAAAAAAAAAAAAAABHjYNcaulo19Y80gDIzOzpw+Nfej6x+VF6VTzmRjHiZrwv9J8VlTGMOrVmlpieEw5VAABpbKy2vvz4V/LOrG9aIjnM6PRYVPZ4cVjlEaFWOgGVAAAAAAAAAAAAAAAAAAAAAAUdqZffw9+P4q8+sMh6WY1h57Hw/ZY1q90rEqMBUTZX9zh/1R6t8EqwARQAAAAAAAAAAAAAAAAAAAAABibS/eW8vSAWJVUBUf/Z" alt="">
                            </div>
                            <div class="admin-user-desc">
                                <p class="admin-user-desc-name">
                                    {{$user['tenuser']}}
                                </p>
                                <p class="admin-user-desc-time">
                                   Ngày tạo {{$user['created_at']}}
                                </p>
                            </div>
                                <button class='btn-admin' id={{$user['id']}}>
                                Xóa
                                </button>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection