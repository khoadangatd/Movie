$(function(){
    //initial pagination
    var i;
    var page=parseInt($(".pagination").attr("page"));
    var total=parseInt($(".pagination").attr("totalP"));
    let content='';
    if(page%5==0){
        bd=page-1;
        kt=bd+5;
    }
    else{
        var temp=page%5;
        bd=page-temp;
        kt=bd+5;
    }
    for(i=bd;i<=kt;i++){
        if(i==page)
            content+=`<a href="/actor?p=${i}" class="pagination__btn pagination__btn--active">${i}</a>`;
        else if(i==0)
            continue;
        else if(i>total)
            break;
        else
            content+=`<a href="/actor?p=${i}" class="pagination__btn">${i}</a>`;
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
})
