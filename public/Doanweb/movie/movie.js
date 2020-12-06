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
            if(page==10)
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
        $(this).addClass('active');
        $('.nav-item__review').removeClass('active');
        $('.comments').addClass('active-1');
        $('.reviews').removeClass('active-1');
    })
    $('.nav-item__review').click(function(){
        $(this).addClass('active');
        $('.nav-item__comment').removeClass('active');
        $('.reviews').addClass('active-1');
        $('.comments').removeClass('active-1');
    })
    var idphim=$(".comment__main").attr("idphim");
    var contentC=$("#comment--content").val();
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
    $.post("/ajaxcomment",{idphim},function(data,status){
        $(".comment__main").html(data);
    })
    $("#post--comment").click(function(){
        $.post('/ajaxpost'),{contentC,idphim},function(data,status){
            $(".comment__main").html(data);
        }
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
    if($(window).click(function(){
        
    }))
    $(".card-movie-img2").click(function(){
        $(".modal").toggle();
        
        $(".modal").click(function(){
            $(".modal").toggle();
        });
        $("#quit").click(function(){
            (".modal").toggle();
        });
    })
})



