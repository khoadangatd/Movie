<?php
    session_start();  
    include '../connect.php';
    if(isset($_POST["register"]))
    {
        $username=$_POST["user"];
        $email=$_POST["email"];
        $password=$_POST["password"];
        // kiem tra co trung username khong
        $sql = "SELECT * FROM user WHERE username='$username'";
        // thuc hien truy van
        $result=$connect->query($sql);
        // Neu ket qua tra ve lon 1 thi ton tai username trung
        if(mysqli_num_rows($result)>0){
            $_SESSION['title']="Đăng kí thất bại";
            $_SESSION['status']="Tài khoản của bạn đã có người sử dụng";
            $_SESSION['noti']="error";
            header('Location: index.php');  
        }
        else{  
            $sql="INSERT INTO user (username, password, email, tenuser) value ('$username','$password','$email','$username')";
            $connect->query($sql);
            $_SESSION['title']="Đăng kí thành công";
            $_SESSION['status']="Hãy đăng nhập và trải nghiệm";
            $_SESSION['noti']="success";  
            header('Location: index.php');  
        }
    } 
?>