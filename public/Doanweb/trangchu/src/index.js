$(function(){
    //Own-carousel slide
    // $('.owl-carousel').owlCarousel({
    //     loop:true,
    //     margin:10,
    //     nav:true,
    //     dots:false,
    //     navText:['<span class="header-slide-btn header-slide-left"><i class="fas fa-arrow-left"></i></span>','<span class="header-slide-btn header-slide-right"><i class="fas fa-arrow-right"></i></span>'],
    //     responsive:{
    //         0:{
    //             items:1
    //         },
    //         600:{
    //             items:3
    //         },
    //         1000:{
    //             items:5
    //         }
    //     }
    // })
    var widthItem=parseFloat($(".slide-item").innerWidth());
    var view=$(".slide-wrap");
    var countI=$(".slide-item").length;
    var slideN=0;
    $(".header-slide-btn:last").click(function(){
        view.css("transform",`translateX(-${(slideN+1)*widthItem}px)`)
        slideN++;
        if(slideN==countI-5){
            $(this).hide();
        }
        if(slideN!=0){
            $(".header-slide-btn:first").show();
        }
    });
    $(".header-slide-btn:first").click(function(){
        view.css("transform",`translateX(-${(slideN-1)*widthItem}px)`)
        slideN--;
        if(slideN!=countI-5){
            $(".header-slide-btn:last").show();
        }
        if(slideN==0){
            $(this).hide();
        }
    })
    //set bg when initial
    var src_bg = $('.active').eq(1).find('.card-movie-img').attr('src');
    $('.header-slide').css({
        "background-image": 'url('+src_bg+')',
    })
    //set bg when translate slide
    $('.custom-owl').on('translate.owl.carousel',function(e){
           var src_bg = $('.active').eq(1).find('.card-movie-img').attr('src');
           $('.header-slide').css({
               "background-image": 'url('+src_bg+')',
           })
    })
     // toggle seach
    $('.nav-search i').click(function(){
        console.log(this);
        $('.dropdown-search').slideToggle('1000');
    })
    // notify login
    $('.Log-in').click(function(){
        $('.Log-in__notify').slideToggle('1000');
    })
    //switch-movie-list
    // khoi tao
    $.post("http://localhost:8000/Doanweb/trangchu/fetchMovie.php",{
        theloai:1
    },function(data,status){
        $(".list-tab-movie").html(data);
    }) 
    $('.movie-navigation-item').click(function(){
        $('.movie-navigation-item').filter('.movie-navigation-active').removeClass('movie-navigation-active');
        $(this).addClass('movie-navigation-active');
        var theloai=parseInt($(this).attr("data-value"));
        $.post("http://localhost:8000/Doanweb/trangchu/fetchMovie.php",{
            theloai
        },function(data,status){
            $(".list-tab-movie").html(data);
        })
    })
})
