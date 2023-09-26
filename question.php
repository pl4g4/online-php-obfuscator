<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <form action='question.php' class="form" method='POST'>
        <table class="question" style="width:80%;" align="center">
            <tr>
                <td>
                    <?php
                        session_start();
                        if (isset($_SESSION['title'])) {echo '<div class="msgtitle" align="center">' . $_SESSION['title'] .'</div> </br>';} else {header('location: info.php');}
                        if (isset($_SESSION['msg1'])) {echo '<div class="msg1" align="center">' .$_SESSION['msg1'] . '</br></div>';}
                        if (isset($_SESSION['msg2'])) {echo '<div class="msg1" align="center">'  . $_SESSION['msg2'] . '</br></div>';}
                    ?>
                    <table style="width:100%;">
                        <tr>
                            <td align="center">
                                <input type='submit' class="btYN" name="no" value="Hủy" />
                            </td>
                            <td align="center">
                                <input type='submit' class="btYN" name="yes" value="OK" />
                            </td>
                        </tr>
                    </table>
                    <?php
                        if (isset($_POST['no'])) {header('location: addworking.php');}

                        if (isset($_POST['yes'])) {
                            $val =  '';
                            session_start();
                            $name = $_SESSION['username'];
                             // Lưu trữ giá trị được chọn trong biến
                            if (isset($_SESSION['msg2'])) {$val = (string)$_SESSION['msg2'];} else {header('location: addworking.php');}
                            unset($_SESSION['msg1']);
                            unset($_SESSION['msg2']);
                            
                            include('connectDB.php');

                            $query = "INSERT INTO msg(name, msg1, msg2, msg3) VALUES ('$name','W','$val','')";

                            $result = mysqli_query($connect, $query) or die( mysqli_error($connect));
                            if ($result==false) {
                                mysqli_close($connect);
                                echo '<script> alert("Hệ thống đang bận, vui lòng thử lại!") </script>';
                            } 
                            mysqli_close($connect);
                            
                            // echo '<script> alert("Đã Thêm, quay lại để xem kết quả!") </script>';
                            echo '<script> window.location.href="index.php" </script>';
                        }
                        
                    ?>
                </td>
            </tr>
        </table>
    </form>
</body>

</html>