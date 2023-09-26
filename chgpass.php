<html>

<head>
    <title>NAIL APP MANAGER</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="style.css" />
</head>
<form action="chgpass.php" class="form" method='POST'>
    <h2 align="center">
        Đổi mật khẩu cho:
        <?php
            session_start();
            if (!isset($_SESSION['username'])){include('errorproc.php');}
            $name = strtoupper($_SESSION['username']);    
            echo '</br>' . $name     . '</br>';
        ?>
    </h2>
    <div align="center">
        <input type="text" placeholder="password" name="pass1">
        <input type="text" placeholder="password" name="pass2">
        <input type='submit' class="button" name="update" value='cập nhật' />
        <input type='submit' class="button" name="cancel" value='Hủy' />
    </div>
    <?php
        $name = $_SESSION['username'];
        //chưa đăng nhập trước đó quay về trang chính
        // if (!isset($_SESSION['username'])) {session_destroy(); header('location: index.php');}
       
        if (isset($_POST['cancel'])){
            if (strtoupper($name)=="ADMIN"){echo '<script> window.location.href="admininfo.php" </script>'; die();}
            echo '<script> window.location.href="info.php" </script>'; die();
        }

        if (isset($_POST['update'])){

            $pas1 = addslashes($_POST['pass1']);
            $pas2 = addslashes($_POST['pass2']);
            if ($pas1!=$pas2){
                echo '<script> alert("Mật khẩu không trùng khớp")</script>';
            } else{

                include('connectDB.php');
                $query = "UPDATE user SET password='$pas1' WHERE name='$name'";
                $result = mysqli_query($connect, $query) or die( mysqli_error($connect));

                if ($result==false) {
                    echo '<script> alert("Lỗi hệ thống, vui lòng thử lại sau")</script>';
                    mysqli_close($connect);
                    include('errorproc.php');
                }
            
                $query = "INSERT INTO msg(name, msg1, msg2, msg3) VALUES ('$name','C','$pas1','')";

                $result = mysqli_query($connect, $query) or die( mysqli_error($connect));
                if ($result==false) {
                    echo '<script> alert("Lỗi hệ thống, vui lòng thử lại sau")</scrip>';
                    mysqli_close($connect);
                    include('errorproc.php');
                }

                mysqli_close($connect);
                $_SESSION['username2']=$pas1;
                header('location: success.php');
            }
        }
    ?>
</form>

</html>