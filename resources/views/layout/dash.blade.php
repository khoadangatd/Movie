@extends('layout.plan')
@section('body')
<header>
    <nav>
        <a href="{{route('home')}}" class="nav-logo-wrap">
            <img src="{{asset('/homelogo.png')}}" alt="" class="nav-logo">
        </a>
        <ul class="navigation">
            <li class="navigation-item">
                <a href="" class="navigation-link">
                    PHIM MỚI        
                </a>
            </li>
            <li class="navigation-item">
                <a href="" class="navigation-link">
                    PHIM BỘ
                </a>
                </li>

            <li class="navigation-item">
                <a href="" class="navigation-link">
                PHIM LẺ
                </a>
            </li>

            <li class="navigation-item">
                <a href="" class="navigation-link">
                    PHIM CHIẾU RẠP
                    </a>

            </li>
            <li class="navigation-item">
            <a href="" class="navigation-link">
                THỂ LOẠI
                </a>
            </li>

            <li class="navigation-item">
            <a href="" class="navigation-link">
                QUỐC GIA
                </a>
            </li>

            <li class="navigation-item">
                <a href="" class="navigation-link">
                    SẮP CHIẾU
                </a>
            </li>

        </ul>
        <div class="nav-user">
            <div class="nav-search">
                <i class="fas fa-search"></i>
                <div class="dropdown-search">
                        <form action="GET" class="form-search">
                            <input type="text" class="form-search-input" placeholder='Tìm kiếm phim theo tên, diễn viên, đạo diễn, thể loại, ...'>
                            <input type="submit" class="form-search-submit" value='TÌM KIẾM'>
                        </form>
        
                    </div>   
            </div>
            <p class="nav-language">
                VI
            </p>
            @if(session()->has('user'))
                <div class='Log-in'>
                    <span class='Log-in__text'>
                        {{session('user')->tenuser}}
                    </span> 
                    <div class='Log-in__notify'>
                    <a href="/profile/{{session('user')->id}}"> <div class='Log-in__notify__item'>Hồ Sơ</div></a>
                    <a href='{{route("logout")}}'><div class='Log-in__notify__item'>Đăng Xuất</div></a>
                    </div>
                </div>
            @else
                <div class='NotLog-in'>
                    <a href="{{asset('form')}}">
                        <div class='nav-login'>
                            <span style='text-overflow: ellipsis;'>
                                ĐĂNG NHẬP
                            </span> 
                        </div>
                    </a>
                </div>
            @endif    
        </div>
    </nav>
</header>
@yield('section')
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-3">
                <h3 class="foote_title">
                XemPhimPlus
                </h3>
                <ul class="footer-list">
                    <li class="footer-item">
                        <a href="#" class="footer-item-link">
                            Phim mới
                        </a>
                    </li>
                    <li class="footer-item">
                        <a href="#" class="footer-item-link">
                        Phim lẻ mới
                        </a>
                    </li>
                    <li class="footer-item">
                        <a href="#" class="footer-item-link">
                        Phim bộ mới
                        </a>
                    </li>
                    <li class="footer-item">
                        <a href="#" class="footer-item-link">
                        Phim chiếu rạp
                        </a>
                    </li>
                    <li class="footer-item">
                        <a href="#" class="footer-item-link">
                        Tin tức
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-3">
                <h3 class="foote_title">
                Phim Hay
                </h3>
                <ul class="footer-list">
                    <li class="footer-item">
                        <a href="#" class="footer-item-link">
                        Phim hay Việt Nam
                        </a>
                    </li>
                    <li class="footer-item">
                        <a href="#" class="footer-item-link">
                        Phim hay Trung Quốc
                        </a>
                    </li>
                    <li class="footer-item">
                        <a href="#" class="footer-item-link">
                        Phim hay Hàn Quốc
                        </a>
                    </li>
                    <li class="footer-item">
                        <a href="#" class="footer-item-link">
                        Phim hay Ấn Độ
                        </a>
                    </li>
                    <li class="footer-item">
                        <a href="#" class="footer-item-link">
                        Phim hay Thái Lan
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col">
                    <h3 class="foote_title">
                        Phim Hay
                    </h3>
                    <ul class="footer-list">
                        <li class="footer-item">
                            <a href="#" class="footer-item-link">
                            Phim3s
                            </a>
                        </li>
                        <li class="footer-item">
                            <a href="#" class="footer-item-link">
                            VTV16
                            </a>
                        </li>
                        <li class="footer-item">
                            <a href="#" class="footer-item-link">
                            YeuPhimMoi
                            </a>
                        </li>
                        <li class="footer-item">
                            <a href="#" class="footer-item-link">
                            KhoaiTV
                            </a>
                        </li>
                        <li class="footer-item">
                            <a href="#" class="footer-item-link">
                            HDonline
                            </a>
                        </li>
                        <li class="footer-item">
                            <a href="#" class="footer-item-link">
                            Bongngo
                            </a>
                        </li>
                        <li class="footer-item">
                            <a href="#" class="footer-item-link">
                            Motphim
                            </a>
                        </li>
                        <li class="footer-item">
                            <a href="#" class="footer-item-link">
                            Kphim
                            </a>
                        </li>
                        
                    </ul>
            </div>
            <div class="col">
                    <h3 class="foote_title">
                        Phim Hay
                    </h3>
                    <ul class="footer-list">
                        <li class="footer-item">
                            <a href="#" class="footer-item-link">
                            BiluTV
                            </a>
                        </li>
                        <li class="footer-item">
                            <a href="#" class="footer-item-link">
                            Vuviphim
                            </a>
                        </li>
                        <li class="footer-item">
                            <a href="#" class="footer-item-link">
                            Vkool
                            </a>
                        </li>
                        <li class="footer-item">
                            <a href="#" class="footer-item-link">
                            PhimNhanh
                            </a>
                        </li>
                        <li class="footer-item">
                            <a href="#" class="footer-item-link">
                            Phim4400
                            </a>
                        </li>
                        <li class="footer-item">
                            <a href="#" class="footer-item-link">
                            BanhTV
                            </a>
                        </li>
                        <li class="footer-item">
                            <a href="#" class="footer-item-link">
                            TVhay
                            </a>
                        </li>
                        <li class="footer-item">
                            <a href="#" class="footer-item-link">
                            DongPhim
                            </a>
                        </li>
                        
                    </ul>
            </div>
            <div class="col-3">
                    <h3 class="foote_title">
                            Phim Hay
                    </h3>
                    <ul class="footer-list">
                        <li class="footer-item">
                            <a href="#" class="footer-item-link">
                            Góp ý: xemphimplus.net@gmail.com
                            </a>
                        </li>
                        <li class="footer-item">
                            <a href="#" class="footer-item-link">
                            Quảng cáo: Ads.movies888@gmail.com
                            </a>
                        </li>
                    
                    </ul>
                    <div class="footer-social">
                    <i class="fab fa-facebook-square"></i>
                    <i class="fab fa-instagram-square"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-youtube"></i>
                    </div> 
                    <h3 class="foote_title">
                    Download Our App

                    </h3>
                    <div class="footer-download">
                        <img src="https://xemphimplus.net/assets/theme/v1/img/App_Store_Badge.svg" alt="">
                        <img src="https://xemphimplus.net/assets/theme/v1/img/google-play-badge.svg" alt="">
                        </div>
            </div>
            <div class="col-12">
                <div class="footer-copyright">
                    <p class="footer-copyright-right">
                    © 2016 XemPhimPlus. Create by 3S Team
                    </p>
                    <ul class="footer-copyright-list">
                        <li class="footer-copy-right-item">
                            Góp ý
                        </li>
                        <li class="footer-copy-right-item">
                            Chính sách
                        </li>
                        <li class="footer-copy-right-item">
                        Điều khoản
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
@stop

