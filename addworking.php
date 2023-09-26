<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <form action='addworking.php' class="formadd" method='POST'>
        <div align="center">
            &nbsp;</br>
            &nbsp;</br>
            &nbsp;</br>

            <img alt="" src="pngegg.png" style="height: 350px; width: 400px" />
            <h2>THÊM CÔNG VIỆC</br></h2>
            <select id="wjob" name="congviec" style="padding: 15px; font-size: 300%;">
                <option value="Fullset">Full set</option>
                <option value="Fill">Fill in</option>
                <option value="Dip">Diping</option>
                <option value="Mani">Manicure</option>
                <option value="Pedi">Pedicure</option>
                <option value="Formen">For Men</option>
                <option value="ColorCh">Color Change</option>
                <option value="Waxing">Waxing</option>
                <option value="Appt">Appointment</option>
                <option value="Extras">Extras</option>
            </select></br>
            &nbsp;</br>
            &nbsp;</br>
            &nbsp;</br>
            <input type='submit' class="button" name="add" value='Thêm' />
            <input type='submit' class="button" name="cancel" value='Hủy' />
            <?php
                if(isset($_POST['add'])){
                    session_start();
                    $_SESSION['title']='XÁC NHẬN CÔNG VIỆC';
                    $_SESSION['msg2']=$_POST['congviec'];
                    echo '<script> window.location.href="question.php" </script>';
                    die();
                }
                if(isset($_POST['cancel'])){
                    header('location: info.php');
                    die();
                }
            ?>
        </div>
    </form>
</body>

</html>