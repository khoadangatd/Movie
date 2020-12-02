@extends('layout.planlogin')
@section('body')
<div class="modal">
    <div class="modal__box">
        <div class="modal__box__contain">
            <div class="modal__box__heading">
                <div class="modal__box__heading__item">
                </div>
                <button class="modal__box__btn">Log in</button>
                <button class="modal__box__btn">Register</button>
            </div>
            <div class="modal__box__logo">
                <a href="{{asset('')}}">
                    <img src="{{asset('logomain.png')}}" alt="" class="modal__logo">
                </a>
            </div>
            <div class="modal__box__social">
                <div class="modal__box__social__icon">
                    <i class="fab fa-facebook-f modal__box__social__icon__main"></i>
                </div>
                <div class="modal__box__social__icon">
                    <i class="fab fa-instagram modal__box__social__icon__main"></i>
                </div>
                <div class="modal__box__social__icon">
                    <i class="fab fa-google modal__box__social__icon__main"></i>
                </div>
            </div>
            <form action="{{route('login')}}" method="POST" id="modal__form__login">   
                @csrf  
                <div class="modal__box__general modal__box--login">
                    <div class="modal__box__input">
                        <input type="text" class="modal__box__input__main user" name="user" required placeholder="Username">
                        <input type="password" class="modal__box__input__main password" name="password" required placeholder="Password">
                    </div>
                    <!-- <div class="modal__box__remember">
                        <a href="">Forget your password</a>
                    </div> -->
                    <div class="modal__box__btn--login">
                        <input type="submit" class="modal__box__btn--login__main" value="Log In" name="login">
                    </div>
                </div>
            </form>
            <form action="{{route('register')}}" method="POST" id="modal__form__register">  
                @csrf 
                <div class="modal__box__general modal__box--register">
                    <div class="modal__box__input">
                        <input type="text" class="modal__box__input__main" name="user" id="Resuser" required placeholder="Username">
                        <input type="password" class="modal__box__input__main" name="password" id="Respassword" required placeholder="Nhập mật khẩu">
                        <input type="password" class="modal__box__input__main" name="password__confirm" id="password--confirm" required placeholder="Xác nhận mật khẩu">
                    </div>
                    <div class="modal__box__btn--login">
                        <input type="submit" class="modal__box__btn--login__main" value="Register" name="register">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection