<?php
    session_start();
    include "../connect.php";
    if(isset($_POST["update1"]))
    {
        $tentk=$_POST["nametk"];
        $tenuser=$_POST["username"];
        $sql = "SELECT * FROM user WHERE username='$tenuser'";
        // thuc hien truy van
        $result=$connect->query($sql);
        // Neu ket qua tra ve lon 1 thi ton tai username trung
        if(mysqli_num_rows($result)>0){
            $_SESSION['title']="Cập nhật thất bại";
            $_SESSION['status']="Tên user của bạn đã có người sử dụng";
            $_SESSION['noti']="error";
            header('Location: index.php');
        }
        else{
            if(isset($_SESSION['iduser']))
            {
                $id=$_SESSION['iduser'];
                $sql="UPDATE user SET username='$tenuser', tenuser='$tentk' where iduser = '$id'";
                $connect->query($sql);
                $_SESSION['title']="Cập nhật thành công";
                $_SESSION['status']="Hãy trải nghiệm những thước phim của mình";
                $_SESSION['noti']="success";  
                header('Location: index.php');
            }
        }
    }
?>