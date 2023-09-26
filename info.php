<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <form action='info.php' class="form" method="POST">
        <div>
            <input type='submit' class="fakeBt" name="btfake" value='Wellcome to NAIL SALON MANAGER (Ver23.10)' />
        </div>
        <div class="topmenu">
            <input type='submit' class="buttonT" name="fullset" value='Full set' />
            <input type='submit' class="buttonT" name="fill" value='Fill' />
            <input type='submit' class="buttonT" name="dip" value='Dip' />
            <input type='submit' class="buttonT" name="mani" value='Mani' />
            <input type='submit' class="buttonT" name="pedi" value='Pedi' />
            <input type='submit' class="buttonT" name="formen" value='For men' /></br>
        </div>
        <div align="center">
            <input type='submit' class="button" name="history" value='Xem lịch sử thu nhập' /></br>
        </div>
        <div class="textName" align="center">
            <?php 
            session_start();
            if (!isset($_SESSION['username'])){
                session_destroy();
                include('errorproc.php');
            }
            echo "</br>" . strtoupper($_SESSION['username']) . "</br>"; 
            include('status.php');
        ?>
        </div>
        <div align="center">
            <input type='submit' class="btUpdate" name="refresh" value='Cập nhật' /></br>
        </div>
        <table class="Table" border="1" align="center">
            <tr>
                <th align="center">No.</th>
                <th align="center">Type</th>
                <th align="center">Total</th>
                <th align="center">Tip</th>
            </tr>
            <?php require 'loaddata.php' ?>
        </table>
        <div align="center">
            <input type='submit' class="btAdd" name="Add" value='+' /></br>
        </div>
        <div class="Table" align="center">
            <?php require 'report.php' ?>
        </div>

        <div align="center">
            <input type='submit' class="button" name="setAvailable" value='Báo cáo hoàn thành' />
        </div>

        <div align="center">
            .</br>...</br>.....</br>.......</br>.........</br>.............
        </div>
        <div class="btable">
            <table style="width:100%;">
                <tr>
                    <td align="left">
                        <div class="btLogout"><a href="chgpass.php">Đổi mật khẩu</a></div>
                    </td>
                    <td align="right">
                        <div class="btLogout"><a href="Logout.php">Thoát tài khoản</a></div>
                    </td>
                </tr>
            </table>
        </div>

        <?php require 'infoprocess.php';?>
    </form>
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
</body>

</html>