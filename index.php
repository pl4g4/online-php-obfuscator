<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <form action='index.php' class="form" method='POST'>
        <div class='login' align="center">
            <h2>Employee Login</br></h2>
            <input type='text' placeholder='nick name' name='username' /></br>
            <input type='password' placeholder='password' name='password' />
            <input type='submit' class="button" name="dangnhap" value='Đăng nhập' />
            <?php require 'loginProc.php';?>
        </div>
    </form>
</body>

</html>