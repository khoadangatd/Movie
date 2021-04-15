$(function(){
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.btn-admin').click(function(){
        var idUser = $(this).attr('id');
        $(this).parent().parent().remove();
        $.post('/admin',{idUser},function(data,status){
            
        })
    })
})