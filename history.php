<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="style.css" />
</head>

<form action='info.php' class="form" method="POST">
    <div class="textName" align="center">
        Lịch sử công việc của </br>
        <?php 
        session_start();
        if (!isset($_SESSION['username'])){
           include('errorproc.php');
        }
        echo strtoupper($_SESSION['username']) . '</br>'; 
        ?>
    </div>
    <table class="Table" border="3" align="center">
        <tr>
            <th align="center">Date</th>
            <th align="center">Amount</th>
            <th align="center">Tip</th>
        </tr>
        <?php require 'loadPayslip.php' ?>
    </table>
    <table class="Table" border="1" align="center">
        <tr>
            <th align="center">Date</th>
            <th align="center">Amount</th>
            <th align="center">Tip</th>
        </tr>
        <?php require 'loadHistory.php' ?>
    </table>

    <div align="center">
        <input type='submit' class="button" name="btBack" value='Quay về' />
    </div>
    <div align="center">
        .</br>...</br>.....</br>.......</br>.........</br>.............</br>...............</br>...................
    </div>
    <?php
       if (isset($_POST['btBack'] )){
        // header('location: chgpass.php');
        echo '<script> window.location.href="info.php" </script>';
        } 
    ?>
</form>

</html>