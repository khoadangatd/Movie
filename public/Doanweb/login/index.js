// BTN
$(".modal__box__btn").click(function(){
    var btn=$(".modal__box__heading__item");
    var login=$(".modal__box--login");
    var reg=$(".modal__box--register");
    if($(this).index(".modal__box__btn")==1){
        btn.css("transform","translateX(100%)");
        login.css({"left":"-350px"});
        reg.css({"left":"35px"});
    }
    else{
        btn.css("transform","translateX(0)");
        login.css({"left":"35px"});
        reg.css({"left":"450px"});
    }
});
// validator
$("#modal__form__register").validate({
    rules:{
        user:{
            required:true,
            minlength:3
        },
        password:{
            required:true,
            minlength:6
        },
        password__confirm:{
            required:true,
            equalTo:"#Respassword"
        },
    },
    messages:{
        user:{
            required:"Vui lòng nhập username",
            minlength:"Vui lòng nhập 3 kí trở lên"
        },
        password:{
            required:"Vui lòng nhập password",
            minlength:"Vui lòng nhập 6 kí trở lên"
        },
        password__confirm:{
            required:"Vui lòng nhập password xác thực",
            equalTo:"Mật khẩu xác nhận không đúng"
        },
    }
})
$("#modal__form__login").validate({
    rules:{
        user:{
            required:true,
        },
        password:{
            required:true,
        },
    },
    messages:{
        user:{
            required:"Nhập username để đăng nhập",
        },
        password:{
            required:"Nhập password để đăng nhập",
        },
    }
})

