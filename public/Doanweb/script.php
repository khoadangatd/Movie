<?php
    if(isset($_SESSION['title'])&& $_SESSION['title'] != '')
    {
        ?>
        <script>
            swal({
                title: "<?php echo $_SESSION['title'];?>",
                text: "<?php echo $_SESSION['status'];?>",
                icon: "<?php echo $_SESSION['noti'];?>"
            });
        </script>
        <?php
        unset($_SESSION['title']);
        unset($_SESSION['status']);
        unset($_SESSION['noti']);
    }
?>