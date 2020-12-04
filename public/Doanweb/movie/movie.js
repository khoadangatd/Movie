$(function(){
    //initial pagination
    var i;
    var page=parseInt($(".pagination").attr("page"));
    console.log(page);
    var temp;
    let content='';
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
    
})

