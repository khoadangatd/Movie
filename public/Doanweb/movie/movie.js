$(function(){
     //Own-carousel slide
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
    //initial pagination
    var i;
    var page=parseInt($(".pagination").attr("page"));
    let content='';
    var url='';
    for(i=0;i<window.location.href.length;i++)
    {
        if(window.location.href[i]=="=")
            url=window.location.href.slice(0,i+1);
    }
    var total=parseInt($(".pagination").attr("totalP"));
    var bd,kt;
    if(page%5==0){
        bd=page-1;
        kt=bd+5;
    }
    else{
        var temp=page%5;
        bd=page-temp;
        kt=bd+5;
    }
    if($(".pagination").attr("keyword")==null){
        for(i=bd;i<=kt;i++){           
            if(i==page)
                content+=`<a href="${url}${i}" class="pagination__btn pagination__btn--active">${i}</a>`;
            else if(i==0)
                continue;
            else if(i>total)
                break;
            else
                content+=`<a href="${url}${i}" class="pagination__btn">${i}</a>`;
        }
        $(".pagination-custom").append(content);
    
        // next page 
    
        $('.pagination__btn-right').click(function(){
            if(page==total)
                return;
            window.location.href=window.location.href.replace(page,page+1);
        })
        $('.pagination__btn-left').click(function(){
            if(page==1)
                return;
            window.location.href=window.location.href.replace(page,page-1);
        })  
    }
    else{
        var keyword=$(".pagination").attr("keyword");
        if(total<5)
            kt=total;
        for(i=bd;i<=kt;i++){
            if(i==page)
                content+=`<a href="/movie?p=${i}&k=${keyword}" class="pagination__btn pagination__btn--active">${i}</a>`;
            else if(i==0)
                continue;
            else if(i>total)
                break;
            else
                content+=`<a href="/movie?p=${i}&k=${keyword}" class="pagination__btn">${i}</a>`;
        }
        $(".pagination-custom").append(content);
    
        // next page 
    
        $('.pagination__btn-right').click(function(){
            if(page==total)
                return;
            window.location.href=`/movie?p=${page+1}&k=${keyword}`;
        })
        $('.pagination__btn-left').click(function(){
            if(page==1)
                return;
            window.location.href=`/movie?p=${page-1}&k=${keyword}`;
        })  
    }
    $('.nav-item__comment').click(function(){
        $(this).addClass('nav-active');
        $('.nav-item__review').removeClass('nav-active');
        $('.comments').addClass('active-1');
        $('.reviews').removeClass('active-1');
    })
    $('.nav-item__review').click(function(){
        $(this).addClass('nav-active');
        $('.nav-item__comment').removeClass('nav-active');
        $('.reviews').addClass('active-1');
        $('.comments').removeClass('active-1');
    })
    var idphim=$(".comment__main").attr("idphim");
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    function interact(){
        $(".cmt-like").click(function(){
            var idcmt=$(this).parent().parent().attr('idcmt');
            console.log(idcmt);
            var like=parseInt($(this).attr('like')); 
            var crr=parseInt($(this).children().eq(1).html()); 
            $(this).children().eq(1).html(crr+1);
            $.post("/ajaxinteract",{idcmt,like},function(data,status){
                console.log(data);
            })
            $(this).unbind();
        })
        $(".cmt-dislike").click(function(){
            var idcmt=$(this).parent().parent().attr('idcmt');
            console.log(idcmt);
            var crr=parseInt($(this).children().eq(1).html());
            console.log(crr);
            $(this).children().eq(1).html(crr+1);
            var dislike=parseInt($(this).attr('dislike'));    
            $.post("/ajaxinteract",{idcmt,dislike},function(data,status){
                console.log(data);
            }) 
            $(this).unbind();
        })
    }
    $.post("/ajaxcomment",{idphim},function(data,status){
        $(".comment__main").html(data);
        interact();
    })
    $("#post--comment").click(function(){
        var contentC=$("#comment-content").val();
        if(contentC=="")
        {
            $(".cmt-noti").html("Bạn chưa nhập bình luận!!");
        }
        else{
            $("#comment-content").val("");
            $.post("/ajaxpost",{idphim,contentC},function(data,status){
                $.post("/ajaxcomment",{idphim},function(data,status){
                    $(".comment__main").html(data);
                    interact();
                })
            })
        }
    })
    $(".favorite").click(function(){
        var poster = $("#movie-poster").attr('src');
        var nameP= $(".name-film").html();
        $.post("/favorite",{idphim,poster,nameP},function(data,status){
            console.log("123");
        })
        $(this).html("<i class='fas fa-heart'></i> Đã yêu thích")
        $(this).removeClass("favorite");
        $(this).unbind();
    })
    $(".favoriteTV").click(function(){
        var poster = $("#movie-poster").attr('src');
        var nameP= $(".name-film").html();
        $.post("/favoriteTV",{idphim,poster,nameP},function(data,status){
        })
        $(this).html("<i class='fas fa-heart'></i> Đã yêu thích")
        $(this).removeClass("favoriteTV");
        $(this).unbind();
    })
    
   
    // use REPLY
    // <div class='feedback'>
    //     <button class='reply'>
    //         <i class='fas fa-reply'></i>
    //         REPLY
    //     </button>
    //     <button class='quote'>
    //     <i class='fas fa-quote-right'></i>
    //         QUOTE
    //     </button>
    // </div>


    // MODAL IMAGE
    if($(window).click(function(e){
        if(e.target==document.querySelector('.modal')){
            e.target.style.display='none';
        }
    }))
    $(".card-movie-img2").click(function(){
        $(".modal").css('display','block');
        $img=$(this).attr('src').replace("/w500","/original")
        $(".modal-img__main").attr('src',$img);
    })
    $('#quit').click(function(){
        $('.modal').css('display','none');
    })



    // watchmovie



    $("#watchmovie").click(function(){
        var TV=$(".details").attr("tv");
        $(".background").html("<div class='loading-bg'><img class='loading__img-bg' src='https://www.bluechipexterminating.com/wp-content/uploads/2020/02/loading-gif-png-5.gif'></div>")
        $.post('/playmovie',{idphim,TV},function(data,status){
            $(".background").html(data);
            $(".watch-movie-play-menu-item").click(function(){
                vt=$(this).html();
                $(".watch-movie-play-menu-item").removeClass("watch-movie-play-menu-item--active");
                $(this).addClass("watch-movie-play-menu-item--active");
                $(".main-video-watch").removeClass("main-video-watch--active");
                $(".main-video-watch").eq(vt-1).addClass("main-video-watch--active");
            });
            $(".watch-movie-list").html("<div class='loading'><img class='loading__img' src='https://www.bluechipexterminating.com/wp-content/uploads/2020/02/loading-gif-png-5.gif'></div>");
            $.post('/ajaxgetmoviepopular',{filter:"day"},function(data,status){
                $('.watch-movie-list').html(data);
            })
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
    })
    // when click  
    //Show star feedback
    
    var startNumber = parseInt($('.rate').attr('feedback'));
    function showStartNumber(startNumber){
        var content='';
        for(var i=0;i<startNumber;i++){
            content+='<i class="fas fa-star rate-act yellow"></i>';
        }
        for(var i=0;i<5-startNumber;i++){
            content+='<i class="fas fa-star rate-act"></i>';
        }
        $('.rate').html(content);
    }
    showStartNumber(startNumber);
})



