<?php
    if (isset($_POST['fullset'])){
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
        $_POST['fullset']=null;
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
        $_POST['fill']=null;
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
        $_POST['dip']=null;
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
        $_POST['mani']=null;
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
        $_POST['pedi']=null;
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
        $_POST['formen']=null;
    }
?>