// tab
$(".main__profile__child__item__category").click(function(){
    if($(this).hasClass("active__category")!==true){
        $(".main__profile__child__item__category").each(function(){
            if($(this).hasClass("active__category"))
                $(this).removeClass("active__category");
        });
        $(this).addClass("active__category");
        $(".favorite").toggle();
        $(".resume").toggle();
    }
});

$("#update-password").validate({
    rules:{
        passwordold:{
            required:true,
        },
        passwordnew:{
            required:true,
        },
        passwordnew1:{
            required:true,
            equalTo:"#passwordnew"
        }
    },
    messages:{
        passwordold:{
            required:"Vui lòng nhập password cũ",
        },
        passwordnew:{
            required:"Vui lòng nhập password mới"
        },
        passwordnew1:{
            required:"Vui lòng nhập password xác thực",
            equalTo:"Mật khẩu xác nhận không đúng"
        },
    }
})

$("#update-user").validate({
    rules:{
        nametk:{
            required:true
        },
        username:{
            required:true
        }
    },
    messages:{
        nametk:{
            required:"Vui lòng nhập tên tài khoản"
        },
        username:{
            required:"Vui lòng nhập username"
        }
    }
})