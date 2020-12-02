<?php
    include "../connect.php";
    if(isset($_SESSION['iduser']))
    {
        $id=$_SESSION['iduser'];
        $sql="SELECT * from user where iduser='$id'";
        $sql=$connect->query($sql);
        while($row=$sql->fetch_row()){
            $username=$row[1];
            $tenuser=$row[4];
            $email=$row[3];
        }
    }
?>