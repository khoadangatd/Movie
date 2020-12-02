<?php
    session_start();  
    include '../connect.php';
    if(isset($_POST["login"]))
    {
        $username=$_POST["Luser"];
        $password=$_POST["Lpassword"];
        $sql="SELECT * FROM user WHERE username='$username' and password='$password'";
        $result=$connect->query($sql);
        if(mysqli_num_rows($result)>0){
            // $_SESSION['title']="Đăng nhập thành công";
            // $_SESSION['status']="Hãy trải nghiệm những thước phim của mình";
            // $_SESSION['noti']="success";
            $iduser="SELECT iduser FROM user WHERE username='$username'";
            $id=$connect->query($iduser);
            while($row=$id->fetch_row()){
                $_SESSION['iduser']=$row[0];
            }
            header('Location: ../trangchu/index.php');
        }
        else{
            $_SESSION['title']="Đăng nhập thất bại";
            $_SESSION['status']="Có vẻ như bạn đã nhầm lẫn mật khẩu hoặc tên tài khoản";
            $_SESSION['noti']="error";
            header('Location: index.php'); 
        }
    }