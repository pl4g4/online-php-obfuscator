<?php
    // session_start();
    //chưa đăng nhập trước đó quay về trang chính
    if (!isset($_SESSION['username'])) {header('location: index.php');}
    
    if (isset($_POST['refresh'])){ }

    if (isset($_POST['btfake'] )){
        for ($i=1;$i<21;$i++){
            $idx="total" . $i;
            if (isset($_POST[$idx])) {
                $tt = addslashes($_POST[$idx]);
                if ($tt!='' && $tt!=null){
                    include('connectDB.php');
                    $name = $_SESSION['username'];
                    $w = 'w'. $i;
                    
                    $query = "UPDATE payment SET " . $w . "='" . $tt . "' WHERE name='" . $name . "'";
                    $result = mysqli_query($connect, $query) or die( mysqli_error($connect));
                    if ($result==false) {
                        echo '<script> alert("Hệ thống đang bận, vui lòng thử lại!") </script>';
                        mysqli_close($connect);
                        include('errorproc.php');
                    } 

                    $name = $_SESSION['username'];

                    $query = "INSERT INTO msg(name, msg1, msg2, msg3) VALUES ('$name','P','$i','$tt')";
                    $result = mysqli_query($connect, $query) or die( mysqli_error($connect));
                    if ($result==false) {
                        echo '<script> alert("Hệ thống đang bận, vui lòng thử lại!") </script>';
                        mysqli_close($connect);
                        include('errorproc.php');
                    } 
                    
                    mysqli_close($connect);
                    echo '<script> alert("Đã gửi yêu cầu thành công!") </script>';
                    echo '<script> window.location.href="index.php" </script>';
                }
            }
        }
    }
    
    if (isset($_POST['history'] )){
        // header('location: chgpass.php');
        echo '<script> window.location.href="history.php" </script>';
    }

    if (isset($_POST['Add'] )){
        // header('location: chgpass.php');
        echo '<script> window.location.href="addworking.php" </script>';
    }

    if (isset($_POST['setAvailable'] )){
        include('connectDB.php');
        $name = $_SESSION['username'];

        $query = "INSERT INTO msg(name, msg1, msg2, msg3) VALUES ('$name','A','','')";

        $result = mysqli_query($connect, $query) or die( mysqli_error($connect));
        if ($result==false) {
            echo '<script> alert("Hệ thống đang bận, vui lòng thử lại!") </script>';
            mysqli_close($connect);
            include('errorproc.php');
        } 

        mysqli_close($connect);
        echo '<script> alert("Đã gửi yêu cầu, quay lại để xem kết quả!") </script>';
        echo '<script> window.location.href="index.php" </script>';
        
    }

    if (isset($_POST['fullset'] )){
        include('connectDB.php');
        $query = "SELECT * FROM fullset";
        $result = mysqli_query($connect, $query) or die( mysqli_error($connect));
        if ($result==false) {echo '<script> alert("Lỗi kết nối dữ liệu") </script>';mysqli_close($connect);include('errorproc.php');}
    
        $str='Danh sách công việc cho FULL SET: \n \n';
        $chk="";
        while ($row=mysqli_fetch_array($result)){
            $str=$str . $row['name'] . '\n';
            $chk=$chk . $row['name'];
        }
        mysqli_close($connect);
    
        if (trim($chk)=="") {
            echo '<script> alert("Không có nhân viên nào trong FULL SET List!") </script>';
        }else{
            echo '<script> alert("'. $str . '") </script>';
        }
        echo '<script> window.location.href="index.php" </script>';
        die();
    }

    if (isset($_POST['fill'] )){
        include('connectDB.php');
        $query = "SELECT * FROM fill";
        $result = mysqli_query($connect, $query) or die( mysqli_error($connect));
        if ($result==false) {echo '<script> alert("Lỗi kết nối dữ liệu") </script>';mysqli_close($connect);include('errorproc.php');}
    
        $str='Danh sách công việc cho FILL IN: \n \n';
        $chk="";
        while ($row=mysqli_fetch_array($result)){
            $str=$str . $row['name'] . '\n';
            $chk=$chk . $row['name'];
        }
        mysqli_close($connect);
    
        if (trim($chk)=="") {
            echo '<script> alert("Không có nhân viên nào trong FiLL IN List!") </script>';
        }else{
            echo '<script> alert("'. $str . '") </script>';
        }
        echo '<script> window.location.href="index.php" </script>';
        die();
    }

    if (isset($_POST['dip'] )){
        include('connectDB.php');
        $query = "SELECT * FROM dip";
        $result = mysqli_query($connect, $query) or die( mysqli_error($connect));
        if ($result==false) {echo '<script> alert("Lỗi kết nối dữ liệu") </script>';mysqli_close($connect);include('errorproc.php');}
    
        $str='Danh sách công việc cho DIP: \n \n';
        $chk="";
        while ($row=mysqli_fetch_array($result)){
            $str=$str . $row['name'] . '\n';
            $chk=$chk . $row['name'];
        }
        mysqli_close($connect);
    
        if (trim($chk)=="") {
            echo '<script> alert("Không có nhân viên nào trong DIP List!") </script>';
        }else{
            echo '<script> alert("'. $str . '") </script>';
        }
        echo '<script> window.location.href="index.php" </script>';
        die();
    }

    if (isset($_POST['mani'] )){
        include('connectDB.php');
        $query = "SELECT * FROM mani";
        $result = mysqli_query($connect, $query) or die( mysqli_error($connect));
        if ($result==false) {echo '<script> alert("Lỗi kết nối dữ liệu") </script>';mysqli_close($connect);include('errorproc.php');}
    
        $str='Danh sách công việc cho MANICURE: \n \n';
        $chk="";
        while ($row=mysqli_fetch_array($result)){
            $str=$str . $row['name'] . '\n';
            $chk=$chk . $row['name'];
        }
        mysqli_close($connect);
    
        if (trim($chk)=="") {
            echo '<script> alert("Không có nhân viên nào trong MANICURE List!") </script>';
        }else{
            echo '<script> alert("'. $str . '") </script>';
        }
        echo '<script> window.location.href="index.php" </script>';
        die();
    }
    if (isset($_POST['pedi'] )){
        include('connectDB.php');
        $query = "SELECT * FROM pedi";
        $result = mysqli_query($connect, $query) or die( mysqli_error($connect));
        if ($result==false) {echo '<script> alert("Lỗi kết nối dữ liệu") </script>';mysqli_close($connect);include('errorproc.php');}
    
        $str='Danh sách công việc cho PEDICURE: \n \n';
        $chk="";
        while ($row=mysqli_fetch_array($result)){
            $str=$str . $row['name'] . '\n';
            $chk=$chk . $row['name'];
        }
        mysqli_close($connect);
    
        if (trim($chk)=="") {
            echo '<script> alert("Không có nhân viên nào trong PEDICURE list!") </script>';
        }else{
            echo '<script> alert("'. $str . '") </script>';
        }
        echo '<script> window.location.href="index.php" </script>';
        die();
    }

    if (isset($_POST['formen'] )){
        include('connectDB.php');
        $query = "SELECT * FROM formen";
        $result = mysqli_query($connect, $query) or die( mysqli_error($connect));
        if ($result==false) {echo '<script> alert("Lỗi kết nối dữ liệu") </script>';mysqli_close($connect);include('errorproc.php');}
    
        $str='Danh sách công việc cho FOR MEN: \n \n';
        $chk="";
        while ($row=mysqli_fetch_array($result)){
            $str=$str . $row['name'] . '\n';
            $chk=$chk . $row['name'];
        }
        mysqli_close($connect);
    
        if (trim($chk)=="") {
            echo '<script> alert("Không có nhân viên nào trong FOR MEN List!") </script>';
        }else{
            echo '<script> alert("'. $str . '") </script>';
        }
        echo '<script> window.location.href="index.php" </script>';
        die();
    }

?>