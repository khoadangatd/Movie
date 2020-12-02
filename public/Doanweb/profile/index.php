<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Profile</title>
        <link rel="stylesheet" href="./style.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
<body>
    <?php 
        // session_start();
        include "../includes/header.php";
        if(empty($_SESSION['iduser'])){
           header("Location: ../trangchu/index.php"); 
        }
    ?>
    <div class="main">
        <div class="main__heading">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="main__heading__child">
                            <h1>HỒ SƠ : <?php echo $tenuser;?>
                            </h1>
                            <div class="main__heading__child__breadcrumb">
                                <div class="main__heading__child__breadcrumb__item">
                                    <p><a href="#">Trang chủ</a></p>
                                </div>
                                <div class="main__heading__child__breadcrumb__item">
                                    <i class="fas fa-long-arrow-alt-right"></i>
                                </div>
                                <div class="main__heading__child__breadcrumb__item">
                                    <p>
                                        <?php echo $tenuser;?>
                                    </p> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main__profile">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="main__profile__child">
                            <div class="main__profile__child__item">
                                <img src="https://scontent.fsgn2-4.fna.fbcdn.net/v/t1.0-9/126046748_1349926102005733_9089377714455480596_n.jpg?_nc_cat=101&ccb=2&_nc_sid=09cbfe&_nc_ohc=s4xinAacz8sAX8hqKMK&_nc_ht=scontent.fsgn2-4.fna&oh=6228be82abb197f55375b67b7c0d6719&oe=5FE22391" alt="avatar" class="main__profile__child__img__main">
                                <h3 class="main__profile__child__item__name"><?php echo $tenuser;?></h3>
                                <h3 class="main__profile__child__item__category active__category"> Hồ sơ</h3>
                                <h3 class="main__profile__child__item__category"> Yêu thích</h3>
                            </div>
                            <div class="main__profile__child__item">
                                <a href="../dangxuat.php">
                                    <button class="btn--submit btn">Đăng xuất</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main__detail resume">
            <div class="container">
                <div class="main__detail__child row">
                    <div class="col-lg-6">
                        <div class="main__detail__child__contain">
                            <form action="uduser.php" class="main__detail__child__item" METHOD="POST">
                                <div class="row main__detail__child__item__small">
                                    <div class="col-lg-6">
                                        <h3>Thay đổi tài khoản</h3>
                                    </div>
                                </div>
                                <div class="row main__detail__child__item__small">
                                    <div class="col-lg-6">
                                        <label for="main__detail__child__item__name" class="input--label">Tên tài khoản</label>
                                        <input type="text" id="main__detail__child__item__name" class="input" value="<?php echo $tenuser;?>" name="nametk">
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="main__detail__child__item__email" class="input--label">Email</label>
                                        <input type="email" id="main__detail__child__item__email" readonly class="input" style="cursor: default;" value="<?php echo $email;?>" name="email">
                                    </div>
                                </div>
                                <div class="row main__detail__child__item__small">
                                    <div class="col-lg-6">
                                        <label for="main__detail__child__item__username" class="input--label">Tên user</label>
                                        <input type="text" id="main__detail__child__item__username" class="input" value="<?php echo $username;?>" name="username">
                                    </div>
                                </div>
                                <div class="row main__detail__child__item__small">
                                    <div class="col-lg-3">
                                        <input type="submit" name="update1" class="input btn--submit" value="Lưu">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="main__detail__child__contain">
                            <form action="udpassword.php" class="main__detail__child__item" METHOD="POST">
                                <div class="row main__detail__child__item__small">
                                    <div class="col-lg-6">
                                        <h3>Thay đổi mật khẩu</h3>
                                    </div>
                                </div>
                                <div class="row main__detail__child__item__small">
                                    <div class="col-lg-6">
                                        <label for="main__detail__child__item__name" class="input--label">Mật khẩu cũ</label>
                                        <input type="password" id="main__detail__child__item__name" class="input" value="" name="passwordold">
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="main__detail__child__item__email" class="input--label">Mật khẩu mới</label>
                                        <input type="password" id="main__detail__child__item__email" class="input" value="" name="passwordnew">
                                    </div>
                                </div>
                                <div class="row main__detail__child__item__small">
                                    <div class="col-lg-6">
                                        <label for="main__detail__child__item__username" class="input--label">Xác nhận mật khẩu mới</label>
                                        <input type="password" id="main__detail__child__item__username" class="input" value="" name="passwordnew1">
                                    </div>
                                </div>
                                <div class="row main__detail__child__item__small">
                                    <div class="col-lg-3">
                                        <input type="submit" name="update2" class="input btn--submit" value="Lưu">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main__detail favorite">
            <div class="container">
                <div class="main__detail__child__contain">
                    <h2 class="main__detail__title">PHIM YÊU THÍCH CỦA BẠN</h2>
                    <div class="row">
                        <div class="main__film col-lg-3">
                            <H3 class="main__detail__namefilm">
                                Hãi hùng
                            </H3>
                            <img src="https://image.tmdb.org/t/p/w500//h8Rb9gBr48ODIwYUttZNYeMWeUU.jpg" alt="" class="main__film__img">
                        </div>
                        <div class="main__film col-lg-3">
                            <H3 class="main__detail__namefilm">
                                Hãi hùng
                            </H3>
                            <img src="https://image.tmdb.org/t/p/w500//h8Rb9gBr48ODIwYUttZNYeMWeUU.jpg" alt="" class="main__film__img">
                        </div>
                        <div class="main__film col-lg-3">
                            <H3 class="main__detail__namefilm">
                                Hãi hùng
                            </H3>
                            <img src="https://image.tmdb.org/t/p/w500//h8Rb9gBr48ODIwYUttZNYeMWeUU.jpg" alt="" class="main__film__img">
                        </div>
                        <div class="main__film col-lg-3">
                            <H3 class="main__detail__namefilm">
                                Hãi hùng
                            </H3>
                            <img src="https://image.tmdb.org/t/p/w500//h8Rb9gBr48ODIwYUttZNYeMWeUU.jpg" alt="" class="main__film__img">
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
    <script src="index.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <?php
        include "../script.php";
    ?>
</body>
</html>