<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập Đăng Ký</title>
    <link rel="stylesheet" href="./main.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./bs.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<?php
    session_start();   
?>
<body>
    <div class="modal">
        <div class="modal__box">
            <div class="modal__box__contain">
                <div class="modal__box__heading">
                    <div class="modal__box__heading__item">
                    </div>
                    <button class="modal__box__btn">Log in</button>
                    <button class="modal__box__btn">Register</button>
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
                <form action="login.php" method="POST">         
                    <div class="modal__box__general modal__box--login">
                        <div class="modal__box__input">
                            <input type="text" class="modal__box__input__main user" name="Luser" required placeholder="Username">
                            <input type="password" class="modal__box__input__main password" name="Lpassword" required placeholder="Password">
                        </div>
                        <div class="modal__box__remember">
                            <a href="">Forget your password</a>
                        </div>
                        <div class="modal__box__btn--login">
                            <input type="submit" class="modal__box__btn--login__main" value="Log In" name="login">
                        </div>
                    </div>
                </form>
                <form action="register.php" method="POST">  
                    <div class="modal__box__general modal__box--register">
                        <div class="modal__box__input">
                            <input type="text" class="modal__box__input__main" name="user" id="Resuser" required placeholder="Username">
                            <input type="text" class="modal__box__input__main" name="email" id="Resemail" required placeholder="Email ID">
                            <input type="password" class="modal__box__input__main" name="password" id="Respassword" required placeholder="Password">
                        </div>
                        <div class="modal__box__term">
                            <input type="checkbox" id="modal__box__term__main" required>
                            <label for="modal__box__term__main" class="poli">I agree to the Term & Condition</label>
                        </div>
                        <div class="modal__box__btn--login">
                            <input type="submit" class="modal__box__btn--login__main" value="Register" name="register">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="index.js"></script>
    <?php
        include "../script.php";
    ?>
</body>
</html>