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
    console.log(page);
    var temp;
    let content='';
    if($(".pagination").attr("keyword")==null){
        for(i=1;i<=10;i++){
            if(i==page)
                content+=`<a href="/movie?p=${i}" class="pagination__btn pagination__btn--active">${i}</a>`;
            else
                content+=`<a href="/movie?p=${i}" class="pagination__btn">${i}</a>`;
        }
        $(".pagination-custom").append(content);
    
        // next page 
    
        $('.pagination__btn-right').click(function(){
            if(page==10)
                return;
            window.location.href=`/movie?p=${page+1}`;
        })
        $('.pagination__btn-left').click(function(){
            if(page==1)
                return;
            window.location.href=`/movie?p=${page-1}`;
        })  
    }
    else{
        var keyword=$(".pagination").attr("keyword");
        var total=parseInt($(".pagination").attr("totalP"));
        if(total>10)
        {
            total=10;
        }
        for(i=1;i<=total;i++){
            if(i==page)
                content+=`<a href="/movie?p=${i}&k=${keyword}" class="pagination__btn pagination__btn--active">${i}</a>`;
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
    var idcmt=$('.comment-content').attr('idcmt');
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
    $.post("/ajaxcomment",{idphim},function(data,status){
        $(".comment__main").html(data);
    })
    $("#post--comment").click(function(){
        var contentC=$("#comment-content").val();
        if(contentC=="")
        {
            $(".cmt-noti").html("Bạn chưa nhập bình luận!!");
        }
        $.post("/ajaxpost",{idphim,contentC},function(data,status){
            $.post("/ajaxcomment",{idphim},function(data,status){
                $(".comment__main").html(data);

            })
        })
    })
    $(".favorite").click(function(){
        var poster = $("#movie-poster").attr('src');
        var nameP= $(".name-film").html();
        $.post("/favorite",{idphim,poster,nameP},function(data,status){
        })
        $(this).html("<i class='fas fa-heart'></i> Đã yêu thích")
        $(this).removeClass("favorite");
        $(this).unbind();
    })
    
    // $("#cmt-like").click(function(){
    //     var like=$(this).attr('like');
    //     console.log("123");
    //     $.post("/ajaxinteract",{idcmt,like},function(data,status){
    //         $.post("/ajaxcomment",{idphim},function(data,status){
    //             $(".comment__main").html(data);
    //         })
    //     })
    // })
    // $("#cmt-dislike").click(function(){
    //     var dislike=$(this).attr('dislike');    
    //     $.post("/ajaxinteract",{idcmt,dislike},function(data,status){
    //         $.post("/ajaxcomment",{idphim},function(data,status){
    //             $(".comment__main").html(data);
    //         })
    //     })
    // })
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
})



