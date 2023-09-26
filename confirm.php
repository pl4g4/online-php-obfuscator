<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <?php include('confirmproc.php'); ?>
    <form action='info.php' class="form" method='POST'>
        <div class='confirm' align="center">
            <img alt="" src="Warning.png" style="height: 270px; width: 300px" />
            <h5>Cẩn thận:</br></h5>
            &nbsp;</br>
            &nbsp;</br>
            <h1>Vui lòng cân nhắc trước khi </br>xóa công việc</h1>
            &nbsp;</br>
            <h5 align="center">
                <?php
                    if ((isset($_SESSION['tag'])) && (isset($_SESSION['job']))) {
                        $tag=(string)$_SESSION['tag'];
                        $job=(string)$_SESSION['job'];
                        echo 'Thẻ thứ tự số: ' . $tag . '</br>'. $job;
                    }  
                ?>
            </h5>
            &nbsp;</br>
            &nbsp;</br>
            <input type='text' align="middle" placeholder='nhập OK để xác nhận' name='ok' /></br>
            <input type='submit' class="btdel" name="yes" value='Đồng ý' />
            <input type='submit' class="button" name="no" value='Không' />
        </div>
    </form>
</body>

</html>