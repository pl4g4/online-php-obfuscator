<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="style.css" />
</head>
<form action="success.php" class="form" method="POST">
    <div align="center">
        <h1></br>Đổi mật khẩu thành công </br></h1>
        <h1></br>Mật khẩu mới là:
            <?php
                session_start();
                $pw = trim($_SESSION['username2']);
                if ($pw=='' or $pw==null) { $pw='trống';}
                echo $pw . "</br>";
                echo "</br>"
            ?>
        </h1>
        <input type='submit' class="button" name="continue" value='Tiếp tục' />
        <?php
        if (isset($_POST['continue'] )){
            if (strtoupper($_SESSION['username'])=="ADMIN"){echo '<script> window.location.href="admininfo.php" </script>'; die();}
            echo '<script> window.location.href="info.php" </script>'; die();
        }
    ?>
    </div>

</form>

</html>