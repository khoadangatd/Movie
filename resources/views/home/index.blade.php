@extends('layout.dash')
@section('title')
Trang Chủ
@endsection
@section('section')
<div class="header-slide">
    <div class="header-slide-wrap">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="header-slide-title">
                        PHIM ĐỀ CỬ
                    </h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <!-- <div class="owl-carousel owl-theme custom-owl">
                        <div class="item">
                            <a href='#' class="card-movie">
                                <img src="https://xemphimplus.net/images/img_poster/co-gai-nhim-cua-toi.medium.webp" alt="" class="card-movie-img">
                                <div class="card-movie-icon">
                                    <i class="fas fa-play"></i>
                                </div>
                            </a>   
                            <p class="slide-movie-title">
                             Ly Nhân Tâm Thượng
                            </p>
                            <p class="slide-movie-title-engl">
                             Closer to You (2020)
                            </p>
                        </div>
                        <div class="item">
                            <a href='#' class="card-movie">
                                <img src="https://xemphimplus.net/images/img_poster/sac-dep-doi-tra.medium.webp" alt="" class="card-movie-img">
                                <div class="card-movie-icon">
                                    <i class="fas fa-play"></i>
                                </div>
                            </a>   
                            <p class="slide-movie-title">
                             Ly Nhân Tâm Thượng
                            </p>
                            <p class="slide-movie-title-engl">
                             Closer to You (2020)
                            </p>
                        </div>
                        <div class="item">
                            <a href='#' class="card-movie">
                                <img src="https://xemphimplus.net/images/img_poster/ban-trai-toi-la-ho-ly.medium.webp" alt="" class="card-movie-img">
                                <div class="card-movie-icon">
                                    <i class="fas fa-play"></i>
                                </div>
                                <span class="quality">FullHD</span>
                            </a>   
                            <p class="slide-movie-title">
                             Ly Nhân Tâm Thượng
                            </p>
                            <p class="slide-movie-title-engl">
                             Closer to You (2020)
                            </p>
                        </div>
                        <div class="item">
                            <a href='#' class="card-movie">
                                <img src="https://xemphimplus.net/images/img_poster/ly-nhan-tam-thuong.medium.webp" alt="" class="card-movie-img">
                                <div class="card-movie-icon">
                                    <i class="fas fa-play"></i>
                                </div>
                                <span class="quality">FullHD</span>
                            </a>   
                            <p class="slide-movie-title">
                             Ly Nhân Tâm Thượng
                            </p>
                            <p class="slide-movie-title-engl">
                             Closer to You (2020)
                            </p>
                        </div>   
                        <div class="item">
                            <a href='#' class="card-movie">
                                <img src="https://xemphimplus.net/images/img_poster/luu-ly-my-nhan-sat.medium.webp" alt="" class="card-movie-img">
                                <div class="card-movie-icon">
                                    <i class="fas fa-play"></i>
                                </div>
                                <span class="quality">FullHD</span>
                            </a>   
                            <p class="slide-movie-title">
                             Ly Nhân Tâm Thượng
                            </p>
                            <p class="slide-movie-title-engl">
                             Closer to You (2020)
                            </p>
                        </div>   
                        <div class="item">
                            <a href='#' class="card-movie">
                                <img src="https://xemphimplus.net/images/img_poster/nu-than-chien-binh-1984.medium.webp" alt="" class="card-movie-img">
                                <div class="card-movie-icon">
                                    <i class="fas fa-play"></i>
                                </div>
                            </a>   
                            <p class="slide-movie-title">
                             Ly Nhân Tâm Thượng
                            </p>
                            <p class="slide-movie-title-engl">
                             Closer to You (2020)
                            </p>
                        </div>    
                    </div> -->
                    <div class="slide-view">
                        <div class="slide-wrap">
                            @for($i=0;$i<10;$i++)                           
                            <div class="slide-item">
                                <a href="/movie/{{$popular[$i]['id']}}" class="card-movie">
                                    <img src="https://image.tmdb.org/t/p/w500{{$popular[$i]['poster_path']}}" alt="" class="card-movie-img">
                                    <div class="card-movie-icon">
                                        <i class="fas fa-play"></i>
                                    </div>
                                </a>
                                <p class="slide-movie-title">
                                    {{$popular[$i]['title']}}
                                </p>
                                <p class="slide-movie-title-engl">
                                {{$popular[$i]['title']}}
                                </p>
                            </div>
                            @endfor
                        </div>
                        <span class="header-slide-btn header-slide-left"><i class="fas fa-arrow-left"></i></span>
                        <span class="header-slide-btn header-slide-right"><i class="fas fa-arrow-right"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="movie-tab">
    <div class="movie-nav">
        <div class="container">
            <h3 class="movie-title">
                Nổi bật
            </h3>
            <ul class="movie-navigation">
                <li class="movie-navigation-item movie-navigation-active" data-value='1'>
                    Phim Mới Nhất
                </li>
                <li class="movie-navigation-item" data-value='2'>
                    Phim Lẻ
                </li>
                <li class="movie-navigation-item" data-value='3'>
                    Phim bộ
                </li>
                <li class="movie-navigation-item" data-value='4'>
                    Phim chiếu rạp
                </li>
            </ul>
        </div>
    </div>
    <div class="container">
        <div class="movie-news movie-list movie-list-active">
            <div class="row list-tab-movie">

            </div>
        </div>
    </div>
    <!-- <div class="container">
            <div class="movie-theater movie-list">
                <div class="row">
                <div class="col-6 mt-5 d-flex">
                        <div class="movie-img">
                            <img src="https://xemphimplus.net/images/img_poster/the-gioi-khung-long-3-thong-tri.medium.webp" alt="" class="movie-img-item">
                            <span class="quality">FullHD</span>
                        </div>
                        <div class="movie-content">
                            <h3 class="movie-content-title">
                             Fast & Furious 9
                            </h3>
                            <p class="movie-content-title-engl">
                             The Fast and the Furious 9
                            </p>
                            <p class="movie-content-category">
                             Hình Sự Tình, CảmTâm Lý     
                          </p>
                          <p class="movie-content-country">
                              Phim Mỹ
                          </p>
                          <p class="movie-content-imbd">
                                iMDb 9.2
                          </p>
                          <p class="movie-content-desc">
                              Công Lý Bị Trì Hoãn - Delayed Justice kể về Park Tae Yong (Kwon Sang-woo thủ vai) là một luật sư công, xuất thân từ gia cảnh bình thường trên một hòn đảo nhỏ tại Hàn Quốc, dù thiếu thốn điều kiện sống
                          </p>
                        </div>
                    </div>
                    <div class="col-6 mt-5 d-flex">
                        <div class="movie-img">
                            <img src="https://xemphimplus.net/images/img_poster/fast-furious-9.medium.webp" alt="" class="movie-img-item">
                            <span class="quality">FullHD</span>
                        </div>
                        <div class="movie-content">
                            <h3 class="movie-content-title">
                             Fast & Furious 9
                            </h3>
                            <p class="movie-content-title-engl">
                             The Fast and the Furious 9
                            </p>
                            <p class="movie-content-category">
                             Hình Sự Tình, CảmTâm Lý     
                          </p>
                          <p class="movie-content-country">
                              Phim Mỹ
                          </p>
                          <p class="movie-content-imbd">
                                iMDb 9.2
                          </p>
                          <p class="movie-content-desc">
                              Công Lý Bị Trì Hoãn - Delayed Justice kể về Park Tae Yong (Kwon Sang-woo thủ vai) là một luật sư công, xuất thân từ gia cảnh bình thường trên một hòn đảo nhỏ tại Hàn Quốc, dù thiếu thốn điều kiện sống
                          </p>
                        </div>
                    </div>
                    <div class="col-6 mt-5 d-flex">
                        <div class="movie-img">
                            <img src="https://xemphimplus.net/images/img_poster/fast-furious-9.medium.webp" alt="" class="movie-img-item">
                            <span class="quality">FullHD</span>
                        </div>
                        <div class="movie-content">
                            <h3 class="movie-content-title">
                             Fast & Furious 9
                            </h3>
                            <p class="movie-content-title-engl">
                             The Fast and the Furious 9
                            </p>
                            <p class="movie-content-category">
                             Hình Sự Tình, CảmTâm Lý     
                          </p>
                          <p class="movie-content-country">
                              Phim Mỹ
                          </p>
                          <p class="movie-content-imbd">
                                iMDb 9.2
                          </p>
                          <p class="movie-content-desc">
                              Công Lý Bị Trì Hoãn - Delayed Justice kể về Park Tae Yong (Kwon Sang-woo thủ vai) là một luật sư công, xuất thân từ gia cảnh bình thường trên một hòn đảo nhỏ tại Hàn Quốc, dù thiếu thốn điều kiện sống
                          </p>
                        </div>
                    </div>
                    <div class="col-6 mt-5 d-flex">
                        <div class="movie-img">
                            <img src="https://xemphimplus.net/images/img_poster/fast-furious-9.medium.webp" alt="" class="movie-img-item">
                            <span class="quality">FullHD</span>
                        </div>
                        <div class="movie-content">
                            <h3 class="movie-content-title">
                             Fast & Furious 9
                            </h3>
                            <p class="movie-content-title-engl">
                             The Fast and the Furious 9
                            </p>
                            <p class="movie-content-category">
                             Hình Sự Tình, CảmTâm Lý     
                          </p>
                          <p class="movie-content-country">
                              Phim Mỹ
                          </p>
                          <p class="movie-content-imbd">
                                iMDb 9.2
                          </p>
                          <p class="movie-content-desc">
                              Công Lý Bị Trì Hoãn - Delayed Justice kể về Park Tae Yong (Kwon Sang-woo thủ vai) là một luật sư công, xuất thân từ gia cảnh bình thường trên một hòn đảo nhỏ tại Hàn Quốc, dù thiếu thốn điều kiện sống
                          </p>
                        </div>
                    </div>
                    <div class="col-6 mt-5 d-flex">
                        <div class="movie-img">
                            <img src="https://xemphimplus.net/images/img_poster/fast-furious-9.medium.webp" alt="" class="movie-img-item">
                            <span class="quality">FullHD</span>
                        </div>
                        <div class="movie-content">
                            <h3 class="movie-content-title">
                             Fast & Furious 9
                            </h3>
                            <p class="movie-content-title-engl">
                             The Fast and the Furious 9
                            </p>
                            <p class="movie-content-category">
                             Hình Sự Tình, CảmTâm Lý     
                          </p>
                          <p class="movie-content-country">
                              Phim Mỹ
                          </p>
                          <p class="movie-content-imbd">
                                iMDb 9.2
                          </p>
                          <p class="movie-content-desc">
                              Công Lý Bị Trì Hoãn - Delayed Justice kể về Park Tae Yong (Kwon Sang-woo thủ vai) là một luật sư công, xuất thân từ gia cảnh bình thường trên một hòn đảo nhỏ tại Hàn Quốc, dù thiếu thốn điều kiện sống
                          </p>
                        </div>
                    </div>
                    <div class="col-6 mt-5 d-flex">
                        <div class="movie-img">
                            <img src="https://xemphimplus.net/images/img_poster/fast-furious-9.medium.webp" alt="" class="movie-img-item">
                            <span class="quality">FullHD</span>
                        </div>
                        <div class="movie-content">
                            <h3 class="movie-content-title">
                             Fast & Furious 9
                            </h3>
                            <p class="movie-content-title-engl">
                             The Fast and the Furious 9
                            </p>
                            <p class="movie-content-category">
                             Hình Sự Tình, CảmTâm Lý     
                          </p>
                          <p class="movie-content-country">
                              Phim Mỹ
                          </p>
                          <p class="movie-content-imbd">
                                iMDb 9.2
                          </p>
                          <p class="movie-content-desc">
                              Công Lý Bị Trì Hoãn - Delayed Justice kể về Park Tae Yong (Kwon Sang-woo thủ vai) là một luật sư công, xuất thân từ gia cảnh bình thường trên một hòn đảo nhỏ tại Hàn Quốc, dù thiếu thốn điều kiện sống
                          </p>
                        </div>
                    </div>
                  
                </div>
            </div>
        </div>
        <div class="container">
            <div class="movie-single movie-list">
                <div class="row">
                <div class="col-6 mt-5 d-flex">
                        <div class="movie-img">
                            <img src="https://xemphimplus.net/images/img_poster/fast-furious-9.medium.webp" alt="" class="movie-img-item">
                            <span class="quality">FullHD</span>
                        </div>
                        <div class="movie-content">
                            <h3 class="movie-content-title">
                             Fast & Furious 9
                            </h3>
                            <p class="movie-content-title-engl">
                             The Fast and the Furious 9
                            </p>
                            <p class="movie-content-category">
                             Hình Sự Tình, CảmTâm Lý     
                          </p>
                          <p class="movie-content-country">
                              Phim Mỹ
                          </p>
                          <p class="movie-content-imbd">
                                iMDb 9.2
                          </p>
                          <p class="movie-content-desc">
                              Công Lý Bị Trì Hoãn - Delayed Justice kể về Park Tae Yong (Kwon Sang-woo thủ vai) là một luật sư công, xuất thân từ gia cảnh bình thường trên một hòn đảo nhỏ tại Hàn Quốc, dù thiếu thốn điều kiện sống
                          </p>
                        </div>
                    </div>
                    <div class="col-6 mt-5 d-flex">
                        <div class="movie-img">
                            <img src="https://xemphimplus.net/images/img_poster/fast-furious-9.medium.webp" alt="" class="movie-img-item">
                            <span class="quality">FullHD</span>
                        </div>
                        <div class="movie-content">
                            <h3 class="movie-content-title">
                             Fast & Furious 9
                            </h3>
                            <p class="movie-content-title-engl">
                             The Fast and the Furious 9
                            </p>
                            <p class="movie-content-category">
                             Hình Sự Tình, CảmTâm Lý     
                          </p>
                          <p class="movie-content-country">
                              Phim Mỹ
                          </p>
                          <p class="movie-content-imbd">
                                iMDb 9.2
                          </p>
                          <p class="movie-content-desc">
                              Công Lý Bị Trì Hoãn - Delayed Justice kể về Park Tae Yong (Kwon Sang-woo thủ vai) là một luật sư công, xuất thân từ gia cảnh bình thường trên một hòn đảo nhỏ tại Hàn Quốc, dù thiếu thốn điều kiện sống
                          </p>
                        </div>
                    </div>
                    <div class="col-6 mt-5 d-flex">
                        <div class="movie-img">
                            <img src="https://xemphimplus.net/images/img_poster/fast-furious-9.medium.webp" alt="" class="movie-img-item">
                            <span class="quality">FullHD</span>
                        </div>
                        <div class="movie-content">
                            <h3 class="movie-content-title">
                             Fast & Furious 9
                            </h3>
                            <p class="movie-content-title-engl">
                             The Fast and the Furious 9
                            </p>
                            <p class="movie-content-category">
                             Hình Sự Tình, CảmTâm Lý     
                          </p>
                          <p class="movie-content-country">
                              Phim Mỹ
                          </p>
                          <p class="movie-content-imbd">
                                iMDb 9.2
                          </p>
                          <p class="movie-content-desc">
                              Công Lý Bị Trì Hoãn - Delayed Justice kể về Park Tae Yong (Kwon Sang-woo thủ vai) là một luật sư công, xuất thân từ gia cảnh bình thường trên một hòn đảo nhỏ tại Hàn Quốc, dù thiếu thốn điều kiện sống
                          </p>
                        </div>
                    </div>
                    <div class="col-6 mt-5 d-flex">
                        <div class="movie-img">
                            <img src="https://xemphimplus.net/images/img_poster/fast-furious-9.medium.webp" alt="" class="movie-img-item">
                            <span class="quality">FullHD</span>
                        </div>
                        <div class="movie-content">
                            <h3 class="movie-content-title">
                             Fast & Furious 9
                            </h3>
                            <p class="movie-content-title-engl">
                             The Fast and the Furious 9
                            </p>
                            <p class="movie-content-category">
                             Hình Sự Tình, CảmTâm Lý     
                          </p>
                          <p class="movie-content-country">
                              Phim Mỹ
                          </p>
                          <p class="movie-content-imbd">
                                iMDb 9.2
                          </p>
                          <p class="movie-content-desc">
                              Công Lý Bị Trì Hoãn - Delayed Justice kể về Park Tae Yong (Kwon Sang-woo thủ vai) là một luật sư công, xuất thân từ gia cảnh bình thường trên một hòn đảo nhỏ tại Hàn Quốc, dù thiếu thốn điều kiện sống
                          </p>
                        </div>
                    </div>
                    <div class="col-6 mt-5 d-flex">
                        <div class="movie-img">
                            <img src="https://xemphimplus.net/images/img_poster/fast-furious-9.medium.webp" alt="" class="movie-img-item">
                            <span class="quality">FullHD</span>
                        </div>
                        <div class="movie-content">
                            <h3 class="movie-content-title">
                             Fast & Furious 9
                            </h3>
                            <p class="movie-content-title-engl">
                             The Fast and the Furious 9
                            </p>
                            <p class="movie-content-category">
                             Hình Sự Tình, CảmTâm Lý     
                          </p>
                          <p class="movie-content-country">
                              Phim Mỹ
                          </p>
                          <p class="movie-content-imbd">
                                iMDb 9.2
                          </p>
                          <p class="movie-content-desc">
                              Công Lý Bị Trì Hoãn - Delayed Justice kể về Park Tae Yong (Kwon Sang-woo thủ vai) là một luật sư công, xuất thân từ gia cảnh bình thường trên một hòn đảo nhỏ tại Hàn Quốc, dù thiếu thốn điều kiện sống
                          </p>
                        </div>
                    </div>
                    <div class="col-6 mt-5 d-flex">
                        <div class="movie-img">
                            <img src="https://xemphimplus.net/images/img_poster/fast-furious-9.medium.webp" alt="" class="movie-img-item">
                            <span class="quality">FullHD</span>
                        </div>
                        <div class="movie-content">
                            <h3 class="movie-content-title">
                             Fast & Furious 9
                            </h3>
                            <p class="movie-content-title-engl">
                             The Fast and the Furious 9
                            </p>
                            <p class="movie-content-category">
                             Hình Sự Tình, CảmTâm Lý     
                          </p>
                          <p class="movie-content-country">
                              Phim Mỹ
                          </p>
                          <p class="movie-content-imbd">
                                iMDb 9.2
                          </p>
                          <p class="movie-content-desc">
                              Công Lý Bị Trì Hoãn - Delayed Justice kể về Park Tae Yong (Kwon Sang-woo thủ vai) là một luật sư công, xuất thân từ gia cảnh bình thường trên một hòn đảo nhỏ tại Hàn Quốc, dù thiếu thốn điều kiện sống
                          </p>
                        </div>
                    </div>
                  
                </div>
            </div>
        </div>
        <div class="container">
            <div class="movie-series movie-list">
                <div class="row">
                <div class="col-6 mt-5 d-flex">
                        <div class="movie-img">
                            <img src="https://xemphimplus.net/images/img_poster/fast-furious-9.medium.webp" alt="" class="movie-img-item">
                            <span class="quality">FullHD</span>
                        </div>
                        <div class="movie-content">
                            <h3 class="movie-content-title">
                             Fast & Furious 9
                            </h3>
                            <p class="movie-content-title-engl">
                             The Fast and the Furious 9
                            </p>
                            <p class="movie-content-category">
                             Hình Sự Tình, CảmTâm Lý     
                          </p>
                          <p class="movie-content-country">
                              Phim Mỹ
                          </p>
                          <p class="movie-content-imbd">
                                iMDb 9.2
                          </p>
                          <p class="movie-content-desc">
                              Công Lý Bị Trì Hoãn - Delayed Justice kể về Park Tae Yong (Kwon Sang-woo thủ vai) là một luật sư công, xuất thân từ gia cảnh bình thường trên một hòn đảo nhỏ tại Hàn Quốc, dù thiếu thốn điều kiện sống
                          </p>
                        </div>
                    </div>
                    <div class="col-6 mt-5 d-flex">
                        <div class="movie-img">
                            <img src="https://xemphimplus.net/images/img_poster/fast-furious-9.medium.webp" alt="" class="movie-img-item">
                            <span class="quality">FullHD</span>
                        </div>
                        <div class="movie-content">
                            <h3 class="movie-content-title">
                             Fast & Furious 9
                            </h3>
                            <p class="movie-content-title-engl">
                             The Fast and the Furious 9
                            </p>
                            <p class="movie-content-category">
                             Hình Sự Tình, CảmTâm Lý     
                          </p>
                          <p class="movie-content-country">
                              Phim Mỹ
                          </p>
                          <p class="movie-content-imbd">
                                iMDb 9.2
                          </p>
                          <p class="movie-content-desc">
                              Công Lý Bị Trì Hoãn - Delayed Justice kể về Park Tae Yong (Kwon Sang-woo thủ vai) là một luật sư công, xuất thân từ gia cảnh bình thường trên một hòn đảo nhỏ tại Hàn Quốc, dù thiếu thốn điều kiện sống
                          </p>
                        </div>
                    </div>
                    <div class="col-6 mt-5 d-flex">
                        <div class="movie-img">
                            <img src="https://xemphimplus.net/images/img_poster/fast-furious-9.medium.webp" alt="" class="movie-img-item">
                            <span class="quality">FullHD</span>
                        </div>
                        <div class="movie-content">
                            <h3 class="movie-content-title">
                             Fast & Furious 9
                            </h3>
                            <p class="movie-content-title-engl">
                             The Fast and the Furious 9
                            </p>
                            <p class="movie-content-category">
                             Hình Sự Tình, CảmTâm Lý     
                          </p>
                          <p class="movie-content-country">
                              Phim Mỹ
                          </p>
                          <p class="movie-content-imbd">
                                iMDb 9.2
                          </p>
                          <p class="movie-content-desc">
                              Công Lý Bị Trì Hoãn - Delayed Justice kể về Park Tae Yong (Kwon Sang-woo thủ vai) là một luật sư công, xuất thân từ gia cảnh bình thường trên một hòn đảo nhỏ tại Hàn Quốc, dù thiếu thốn điều kiện sống
                          </p>
                        </div>
                    </div>
                    <div class="col-6 mt-5 d-flex">
                        <div class="movie-img">
                            <img src="https://xemphimplus.net/images/img_poster/fast-furious-9.medium.webp" alt="" class="movie-img-item">
                            <span class="quality">FullHD</span>
                        </div>
                        <div class="movie-content">
                            <h3 class="movie-content-title">
                             Fast & Furious 9
                            </h3>
                            <p class="movie-content-title-engl">
                             The Fast and the Furious 9
                            </p>
                            <p class="movie-content-category">
                             Hình Sự Tình, CảmTâm Lý     
                          </p>
                          <p class="movie-content-country">
                              Phim Mỹ
                          </p>
                          <p class="movie-content-imbd">
                                iMDb 9.2
                          </p>
                          <p class="movie-content-desc">
                              Công Lý Bị Trì Hoãn - Delayed Justice kể về Park Tae Yong (Kwon Sang-woo thủ vai) là một luật sư công, xuất thân từ gia cảnh bình thường trên một hòn đảo nhỏ tại Hàn Quốc, dù thiếu thốn điều kiện sống
                          </p>
                        </div>
                    </div>
                    <div class="col-6 mt-5 d-flex">
                        <div class="movie-img">
                            <img src="https://xemphimplus.net/images/img_poster/fast-furious-9.medium.webp" alt="" class="movie-img-item">
                            <span class="quality">FullHD</span>
                        </div>
                        <div class="movie-content">
                            <h3 class="movie-content-title">
                             Fast & Furious 9
                            </h3>
                            <p class="movie-content-title-engl">
                             The Fast and the Furious 9
                            </p>
                            <p class="movie-content-category">
                             Hình Sự Tình, CảmTâm Lý     
                          </p>
                          <p class="movie-content-country">
                              Phim Mỹ
                          </p>
                          <p class="movie-content-imbd">
                                iMDb 9.2
                          </p>
                          <p class="movie-content-desc">
                              Công Lý Bị Trì Hoãn - Delayed Justice kể về Park Tae Yong (Kwon Sang-woo thủ vai) là một luật sư công, xuất thân từ gia cảnh bình thường trên một hòn đảo nhỏ tại Hàn Quốc, dù thiếu thốn điều kiện sống
                          </p>
                        </div>
                    </div>
                    <div class="col-6 mt-5 d-flex">
                        <div class="movie-img">
                            <img src="https://xemphimplus.net/images/img_poster/fast-furious-9.medium.webp" alt="" class="movie-img-item">
                            <span class="quality">FullHD</span>
                        </div>
                        <div class="movie-content">
                            <h3 class="movie-content-title">
                             Fast & Furious 9
                            </h3>
                            <p class="movie-content-title-engl">
                             The Fast and the Furious 9
                            </p>
                            <p class="movie-content-category">
                             Hình Sự Tình, CảmTâm Lý     
                          </p>
                          <p class="movie-content-country">
                              Phim Mỹ
                          </p>
                          <p class="movie-content-imbd">
                                iMDb 9.2
                          </p>
                          <p class="movie-content-desc">
                              Công Lý Bị Trì Hoãn - Delayed Justice kể về Park Tae Yong (Kwon Sang-woo thủ vai) là một luật sư công, xuất thân từ gia cảnh bình thường trên một hòn đảo nhỏ tại Hàn Quốc, dù thiếu thốn điều kiện sống
                          </p>
                        </div>
                    </div>
                  
                </div>
            </div>
        </div> -->

</div>
<div class="movie-new-update">
    <div class="container">
        <h3 class="movie-title">
            Nổi bật
        </h3>
        <div class="row mt-5">
            @for($i=0;$i<18;$i++)
                <div class="col-2">
                    <div class="movie-new-update-item">
                        <a href='#' class="card-movie">
                            <img src="https://image.tmdb.org/t/p/w500{{$popular[$i]['poster_path']}}" alt="" class="card-movie-img">
                            <div class="card-movie-icon">
                                <i class="fas fa-play"></i>
                            </div>
                        </a>
                        <div class="movie-new-update-item-des">
                            <p class="movie-new-update-item-des-title">
                                {{$popular[$i]['title']}}
                            </p>
                            <p class="movie-new-update-item-des-title-engl">
                                {{$popular[$i]['title']}}
                            </p>
                        </div>
                    </div>
                </div>
            @endfor
            <!-- <div class="col-2">
                <div class="movie-new-update-item">
                    <a href='#' class="card-movie">
                        <img src="https://xemphimplus.net/images/img_poster/co-gai-nhim-cua-toi.medium.webp" alt="" class="card-movie-img">
                        <div class="card-movie-icon">
                            <i class="fas fa-play"></i>
                        </div>
                    </a>
                    <div class="movie-new-update-item-des">
                        <p class="movie-new-update-item-des-title">
                            Xem phim Phi Vụ Triệu Đô (Phần 3) - La Casa de Papel 3 / money heist season 3
                        </p>
                        <p class="movie-new-update-item-des-title-engl">
                            La Casa de Papel 3 / money heist season 3
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-2">
                <div class="movie-new-update-item">
                    <a href='#' class="card-movie">
                        <img src="https://xemphimplus.net/images/img_poster/co-gai-nhim-cua-toi.medium.webp" alt="" class="card-movie-img">
                        <div class="card-movie-icon">
                            <i class="fas fa-play"></i>
                        </div>
                    </a>
                    <div class="movie-new-update-item-des">
                        <p class="movie-new-update-item-des-title">
                            Xem phim Phi Vụ Triệu Đô (Phần 3) - La Casa de Papel 3 / money heist season 3
                        </p>
                        <p class="movie-new-update-item-des-title-engl">
                            La Casa de Papel 3 / money heist season 3
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-2">
                <div class="movie-new-update-item">
                    <a href='#' class="card-movie">
                        <img src="https://xemphimplus.net/images/img_poster/co-gai-nhim-cua-toi.medium.webp" alt="" class="card-movie-img">
                        <div class="card-movie-icon">
                            <i class="fas fa-play"></i>
                        </div>
                    </a>
                    <div class="movie-new-update-item-des">
                        <p class="movie-new-update-item-des-title">
                            Xem phim Phi Vụ Triệu Đô (Phần 3) - La Casa de Papel 3 / money heist season 3
                        </p>
                        <p class="movie-new-update-item-des-title-engl">
                            La Casa de Papel 3 / money heist season 3
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-2">
                <div class="movie-new-update-item">
                    <a href='#' class="card-movie">
                        <img src="https://xemphimplus.net/images/img_poster/co-gai-nhim-cua-toi.medium.webp" alt="" class="card-movie-img">
                        <div class="card-movie-icon">
                            <i class="fas fa-play"></i>
                        </div>
                    </a>
                    <div class="movie-new-update-item-des">
                        <p class="movie-new-update-item-des-title">
                            Xem phim Phi Vụ Triệu Đô (Phần 3) - La Casa de Papel 3 / money heist season 3
                        </p>
                        <p class="movie-new-update-item-des-title-engl">
                            La Casa de Papel 3 / money heist season 3
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-2">
                <div class="movie-new-update-item">
                    <a href='#' class="card-movie">
                        <img src="https://xemphimplus.net/images/img_poster/co-gai-nhim-cua-toi.medium.webp" alt="" class="card-movie-img">
                        <div class="card-movie-icon">
                            <i class="fas fa-play"></i>
                        </div>
                    </a>
                    <div class="movie-new-update-item-des">
                        <p class="movie-new-update-item-des-title">
                            Xem phim Phi Vụ Triệu Đô (Phần 3) - La Casa de Papel 3 / money heist season 3
                        </p>
                        <p class="movie-new-update-item-des-title-engl">
                            La Casa de Papel 3 / money heist season 3
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-2">
                <div class="movie-new-update-item">
                    <a href='#' class="card-movie">
                        <img src="https://xemphimplus.net/images/img_poster/co-gai-nhim-cua-toi.medium.webp" alt="" class="card-movie-img">
                        <div class="card-movie-icon">
                            <i class="fas fa-play"></i>
                        </div>
                    </a>
                    <div class="movie-new-update-item-des">
                        <p class="movie-new-update-item-des-title">
                            Xem phim Phi Vụ Triệu Đô (Phần 3) - La Casa de Papel 3 / money heist season 3
                        </p>
                        <p class="movie-new-update-item-des-title-engl">
                            La Casa de Papel 3 / money heist season 3
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-2">
                <div class="movie-new-update-item">
                    <a href='#' class="card-movie">
                        <img src="https://xemphimplus.net/images/img_poster/co-gai-nhim-cua-toi.medium.webp" alt="" class="card-movie-img">
                        <div class="card-movie-icon">
                            <i class="fas fa-play"></i>
                        </div>
                    </a>
                    <div class="movie-new-update-item-des">
                        <p class="movie-new-update-item-des-title">
                            Xem phim Phi Vụ Triệu Đô (Phần 3) - La Casa de Papel 3 / money heist season 3
                        </p>
                        <p class="movie-new-update-item-des-title-engl">
                            La Casa de Papel 3 / money heist season 3
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-2">
                <div class="movie-new-update-item">
                    <a href='#' class="card-movie">
                        <img src="https://xemphimplus.net/images/img_poster/co-gai-nhim-cua-toi.medium.webp" alt="" class="card-movie-img">
                        <div class="card-movie-icon">
                            <i class="fas fa-play"></i>
                        </div>
                    </a>
                    <div class="movie-new-update-item-des">
                        <p class="movie-new-update-item-des-title">
                            Xem phim Phi Vụ Triệu Đô (Phần 3) - La Casa de Papel 3 / money heist season 3
                        </p>
                        <p class="movie-new-update-item-des-title-engl">
                            La Casa de Papel 3 / money heist season 3
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-2">
                <div class="movie-new-update-item">
                    <a href='#' class="card-movie">
                        <img src="https://xemphimplus.net/images/img_poster/co-gai-nhim-cua-toi.medium.webp" alt="" class="card-movie-img">
                        <div class="card-movie-icon">
                            <i class="fas fa-play"></i>
                        </div>
                    </a>
                    <div class="movie-new-update-item-des">
                        <p class="movie-new-update-item-des-title">
                            Xem phim Phi Vụ Triệu Đô (Phần 3) - La Casa de Papel 3 / money heist season 3
                        </p>
                        <p class="movie-new-update-item-des-title-engl">
                            La Casa de Papel 3 / money heist season 3
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-2">
                <div class="movie-new-update-item">
                    <a href='#' class="card-movie">
                        <img src="https://xemphimplus.net/images/img_poster/co-gai-nhim-cua-toi.medium.webp" alt="" class="card-movie-img">
                        <div class="card-movie-icon">
                            <i class="fas fa-play"></i>
                        </div>
                    </a>
                    <div class="movie-new-update-item-des">
                        <p class="movie-new-update-item-des-title">
                            Xem phim Phi Vụ Triệu Đô (Phần 3) - La Casa de Papel 3 / money heist season 3
                        </p>
                        <p class="movie-new-update-item-des-title-engl">
                            La Casa de Papel 3 / money heist season 3
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-2">
                <div class="movie-new-update-item">
                    <a href='#' class="card-movie">
                        <img src="https://xemphimplus.net/images/img_poster/co-gai-nhim-cua-toi.medium.webp" alt="" class="card-movie-img">
                        <div class="card-movie-icon">
                            <i class="fas fa-play"></i>
                        </div>
                    </a>
                    <div class="movie-new-update-item-des">
                        <p class="movie-new-update-item-des-title">
                            Xem phim Phi Vụ Triệu Đô (Phần 3) - La Casa de Papel 3 / money heist season 3
                        </p>
                        <p class="movie-new-update-item-des-title-engl">
                            La Casa de Papel 3 / money heist season 3
                        </p>
                    </div>
                </div>
            </div> -->
        </div>
        <div class="movie-new-update-btn">
            <a href="#" class="nav-login">Xem thêm</a>
        </div>
    </div>
</div>
@endsection