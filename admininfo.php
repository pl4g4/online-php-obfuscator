<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="style.css" />
</head>

<form action='admininfo.php' class="form" method="POST">
    <div>
        <input type='submit' class="fakeBt" name="btfake" value='Wellcome to NAIL SALON MANAGER (Ver23.10)' />
    </div>
    <?php
        session_start();
        $name=trim(strtoupper($_SESSION['username']));
        if ($name!="ADMIN") {echo '<script> window.location.href="info.php" </script>'; die();}
    ?>
    <div class="topmenu" style="width:100%;">
        <input type='submit' class="buttonT" name="fullset" value='Full set' />
        <input type='submit' class="buttonT" name="fill" value='Fill' />
        <input type='submit' class="buttonT" name="dip" value='Dip' />
        <input type='submit' class="buttonT" name="mani" value='Mani' />
        <input type='submit' class="buttonT" name="pedi" value='Pedi' />
        <input type='submit' class="buttonT" name="formen" value='For men' /></br>
    </div>

    <div align="center" style="width: 100%; font-size:300%; font-weight: bold;">ADMINISTRATOR</div></br>

    <table class="table_admin" border="1" align="center" style="width:100%;">
        <?php include('loadadmindata.php');?>
    </table>

    <div align="center">
        <input type='submit' class="button" name="refresh" value='Cập nhật' /></br>
    </div>
    <div align="center">
        .</br>...</br>.....</br>.......</br>.........</br>...........</br>................</br>.......................
    </div>

    <table class="bottomTable" style="width:100%;">
        <tr>
            <td align="left">
                <div class="btLogout"><a href="chgpass.php">Đổi mật khẩu</a></div>
            </td>
            <td align="right">
                <div class="btLogout"><a href="Logout.php">Thoát tài khoản</a></div>
            </td>
        </tr>
    </table>
    <?php require 'adminproc.php';?>
</form>
<div align="Center" style="font-size:300%;">
    <a href="https://nailsalonmanager.com/huong-dan-su-dung-nail-salon-manager-nsm/"> Hướng dẫn sử dụng NSM</a>
</div>
<table class="about" style="width:100%;">
    <tr>
        <td align="center">
            NAIL SALON MANAGER Ver23.10 </br>
            Cty Thiết bị công nghệ máy văn phòng QUANGKHAI TECH.</br>
            E-mail: tranthanhtrung83@gmail.com
        </td>
    </tr>
</table>
<div align="Center" style="font-size:300%;"><a href="http://nailsalonmanager.com">Website:
        Nailsalonmanager.com</a></div>
<footer class="footer">
    Hot line: 256 417 3936
</footer>

</html>
<script>