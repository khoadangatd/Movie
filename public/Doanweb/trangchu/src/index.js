$(function(){
    var widthItem=parseFloat($(".slide-item").innerWidth());
    var view=$(".slide-wrap");
    var countI=$(".slide-item").length;
    var slideN=0;
    $(".header-slide-btn:last").click(function(){
        if(slideN==countI-5)
            return;
        view.css("transform",`translateX(-${(slideN+1)*widthItem}px)`)
        slideN++;
        if(slideN!=0){
            $(".header-slide-btn:first").removeClass("btn--disable");
        }
        console.log(slideN,countI)
        if(slideN==countI-5){
            // $(this).hide();
            $(this).addClass("btn--disable");
        }
    });
    $(".header-slide-btn:first").click(function(){
        if(slideN==0){
            return;
        }
        view.css("transform",`translateX(-${(slideN-1)*widthItem}px)`)
        slideN--;
        if(slideN!=countI-5){
            $(".header-slide-btn:last").removeClass("btn--disable");
        }
        if(slideN==0){
            $(this).addClass("btn--disable");
        }   
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
    $(".list-tab-movie").html("<div class='loading'><img class='loading__img' src='https://www.bluechipexterminating.com/wp-content/uploads/2020/02/loading-gif-png-5.gif'></div>");
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
    $.post("/ajaxmovie",{
        theloai:1
    },function(data,status){
        $(".list-tab-movie").html(data);
    }) 
    $('.movie-navigation-item').click(function(){
        $(".list-tab-movie").html("<div class='loading'><img class='loading__img' src='https://www.bluechipexterminating.com/wp-content/uploads/2020/02/loading-gif-png-5.gif'></div>");
        $('.movie-navigation-item').filter('.movie-navigation-active').removeClass('movie-navigation-active');
        $(this).addClass('movie-navigation-active');
        var theloai=parseInt($(this).attr("data-value"));
        $.post("/ajaxmovie",{
            theloai
        },function(data,status){
            $(".list-tab-movie").html(data);
        })
    })
     //set bg when initial
     var src_bg = $('.slide-item').eq(0).find('.card-movie-img').attr('src');
     $('.header-slide').css({   
         "background-image": 'url('+src_bg+')',
     })
     //set bg when translate slide
     $('.header-slide-btn').on('click',function(e){
            var src_bg = $('.slide-item').eq(slideN).find('.card-movie-img').attr('src');
            $('.header-slide').css({
                "background-image": 'url('+src_bg+')',
            })
     })
})
