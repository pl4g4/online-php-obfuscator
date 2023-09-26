<?php
    //Khai báo sử dụng session
    session_start();
    
    if (isset($_SESSION['username'])){ header('location: info.php'); }
    
    //Khai báo utf-8 để hiển thị được tiếng việt
    // header('Content-Type: text/html; charset=UTF-8');
  
    //Xử lý đăng nhập
    if (isset($_POST['dangnhap'])){ 
        //Lấy dữ liệu nhập vào
        $username = addslashes($_POST['username']);
        $password = addslashes($_POST['password']);
  
        //Kiểm tra đã nhập đủ tên đăng nhập với mật khẩu chưa
        if (!$username) {
            echo '<script> alert("Vui lòng nhập tên đăng nhập!") </script>';
            exit;
        } else {
            include('connectDB.php');
            //Kiểm tra tên đăng nhập có tồn tại không
            $query = "SELECT * FROM user WHERE name='$username'";

            $result = mysqli_query($connect, $query) or die( mysqli_error($connect));

            if ($result==false) {
                mysqli_close($connect);
                include('errorproc.php');
            }

            //Lấy mật khẩu trong database ra mảng
            $row = mysqli_fetch_array($result);
            if ($row==null) {
                mysqli_close($connect);
                echo '<script> alert("Tên đăng nhập không Tồn tại!") </script>';
            } else{
                //So sánh 2 mật khẩu có trùng khớp hay không
                if ($password != $row['password']) {
                    mysqli_close($connect);
                    echo '<script> alert("Mật khẩu không đúng. Vui lòng nhập lại!") </script>';
                } else {
                    //Lưu phiên đăng nhập
                    session_destroy();
                    session_start();
                    $_SESSION['username'] = $username;
        
                    // echo "Xin chào <b>" .$username . "</b>. Bạn đã đăng nhập thành công. <a href=''>Thoát</a>";
                    $_POST['username']='';
                    $_POST['password']='';
                    mysqli_close($connect);

                    if (trim(strtoupper($username))=="ADMIN"){header('location: admininfo.php');}
                    else {header('location: info.php');}
                }
            }
        }            
    }
    // <a href='javascript: history.go(-1)'>Trở lại</a>"
?>