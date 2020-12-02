<?php
    session_start();
    if(isset($_SESSION['iduser']))
    {
        include "../xuli.php";
    }
?>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css" integrity="sha512-NmLkDIU1C/C88wi324HBc+S2kLhi08PN5GDeUVVVC/BVt/9Izdsc9SVeVfA1UZbY3sHUlDSyRXhCzHfr6hmPPw==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap-grid.min.css" integrity="sha512-QTQigm89ZvHzwoJ/NgJPghQPegLIwnXuOXWEdAjjOvpE9uaBGeI05+auj0RjYVr86gtMaBJRKi8hWZVsrVe/Ug==" crossorigin="anonymous" />
    <link rel="stylesheet" href="../base.css?v=<?php echo time(); ?>"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<nav>
    <a href='' class="nav-logo-wrap">
        <img src="https://xemphimplus.net/images/logo/logo.webp" alt="" class="nav-logo">
    </a>
    <ul class="navigation">
        <li class="navigation-item">
              <a href="" class="navigation-link">
                  PHIM MỚI        
              </a>
        </li>
        <li class="navigation-item">
            <a href="" class="navigation-link">
                PHIM BỘ
            </a>
            </li>

        <li class="navigation-item">
            <a href="" class="navigation-link">
              PHIM LẺ
            </a>
        </li>

        <li class="navigation-item">
             <a href="" class="navigation-link">
                   PHIM CHIẾU RẠP
                </a>

        </li>
        <li class="navigation-item">
           <a href="" class="navigation-link">
             THỂ LOẠI
            </a>
        </li>

        <li class="navigation-item">
         <a href="" class="navigation-link">
            QUỐC GIA
            </a>
        </li>

        <li class="navigation-item">
               <a href="" class="navigation-link">
                   SẮP CHIẾU
               </a>
        </li>

    </ul>
    <div class="nav-user">
        <div class="nav-search">
            <i class="fas fa-search"></i>
            <div class="dropdown-search">
                    <form action="GET" class="form-search">
                        <input type="text" class="form-search-input" placeholder='Tìm kiếm phim theo tên, diễn viên, đạo diễn, thể loại, ...'>
                        <input type="submit" class="form-search-submit" value='TÌM KIẾM'>
                    </form>
    
                </div>   
        </div>
        <p class="nav-language">
            VI
        </p>
    <?php
        if(isset($_SESSION['iduser']))
        {
            echo "<div class='Log-in'>
                    <span class='Log-in__text'>
                        $tenuser
                    </span> 
                    <div class='Log-in__notify'>
                    <a href='../profile/index.php'> <div class='Log-in__notify__item'>Hồ Sơ</div></a>
                    <a href='../dangxuat.php'><div class='Log-in__notify__item'>Đăng Xuất</div></a>
                    </div>
                </div>";
        }
        else{
            echo "
            <div class='NotLog-in'>
                <a href='../login/index.php'>
                    <div class='nav-login'>
                        <span style='text-overflow: ellipsis;'>
                            ĐĂNG NHẬP
                        </span> 
                    </div>
                </a>
            </div>
            ";
        }
    ?>       
    </div>
    <script src="../base.js">
    </script>
</nav>