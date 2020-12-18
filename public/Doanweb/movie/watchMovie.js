$(function(){
    $('.owl-carousel').owlCarousel({
        loop:true,
        margin:30,
        nav:true,
        dots:false,
        navText:['<span class="header-slide-btn header-slide-left"><i class="fas fa-arrow-left"></i></span>','<span class="header-slide-btn header-slide-right"><i class="fas fa-arrow-right"></i></span>'],
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:5
            }
        }
    })

    // filter nội bật
    //initial
    $(".watch-movie-list").html("<div class='loading'><img class='loading__img' src='https://www.bluechipexterminating.com/wp-content/uploads/2020/02/loading-gif-png-5.gif'></div>");
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
    $.post('/ajaxgetmoviepopular',{filter:1},function(data,status){
        $('.watch-movie-list').html(data);
    })

    // when click
    $('.watch-movie-filter-item').click(function(){
        $('.watch-movie-filter-item-active').removeClass('watch-movie-filter-item-active');
        $(this).addClass('watch-movie-filter-item-active');
        $(".watch-movie-list").html("<div class='loading'><img class='loading__img' src='https://www.bluechipexterminating.com/wp-content/uploads/2020/02/loading-gif-png-5.gif'></div>");

        filter = $(this).attr('data');
        $.post('/ajaxgetmoviepopular',{filter},function(data,status){
            $('.watch-movie-list').html(data);
            console.log(data);
        })
    })
})