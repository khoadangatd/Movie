<?php
    session_start();
    include "../connect.php";
    if(isset($_POST["update2"]))
    {
        if(isset($_SESSION['iduser']))
        {
            $id=$_SESSION['iduser'];
            $sql="SELECT * from user where iduser='$id'";
            $sql=$connect->query($sql);
            while($row=$sql->fetch_row()){
                $password=$row[2];
            }
        }
        $passwordold=$_POST["passwordold"];
        $passwordnew=$_POST["passwordnew"];
        $passwordnew1=$_POST["passwordnew1"];
        if($passwordnew1!=$passwordnew){
            $_SESSION['title']="Cập nhật thất bại";
            $_SESSION['status']="Mật khẩu mới không trùng khớp";
            $_SESSION['noti']="error";
            header('Location: index.php');
        }
        else if($passwordold!=$password){
            $_SESSION['title']="Cập nhật thất bại";
            $_SESSION['status']="Mật khẩu cũ không đúng";
            $_SESSION['noti']="error";
            header('Location: index.php');
        }
        else{
            $sql="UPDATE user SET password='$passwordnew' where iduser = '$id'";
            $connect->query($sql);
            $_SESSION['title']="Cập nhật thành công";
            $_SESSION['status']="Hãy trải nghiệm những thước phim của mình";
            $_SESSION['noti']="success"; 
            header('Location: index.php'); 
        }
    }
?>