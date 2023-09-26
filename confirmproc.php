<?php
    session_start();
    if (!isset($_SESSION['tag'])){ header('location: info.php'); }
 // Xoa nhap Total
 for ($i=1;$i<=20;$i++){
    $bt='cancel'. $i;
    $w='w' . $i;         
    if (isset($_POST[$bt])){
        include('connectDB.php');
        
        $name = $_SESSION['username'];
        // Đọc dữ liệu Payment
        $query = "SELECT * FROM payment WHERE name='$name'";
        $result = mysqli_query($connect, $query) or die( mysqli_error($connect));

        if ($result==false) {mysqli_close($connect);include('errorproc.php');}
        //Lấy data ra mảng
        $pay = mysqli_fetch_array($result);
        
        if ($pay==null) { mysqli_close($connect);include('errorproc.php');}

        if (strlen($pay[$w])>0) {

            $query = "INSERT INTO msg(name, msg1, msg2, msg3) VALUES ('$name','D','$i','')";

            $result = mysqli_query($connect, $query) or die( mysqli_error($connect));
            if ($result==false) {mysqli_close($connect); } 
            
            mysqli_close($connect);
            echo '<script> alert("Đã xóa Total cho thẻ ' . $i . '") </script>';
        }else{
            $query = "SELECT * FROM working WHERE name='$name'";
            $result = mysqli_query($connect, $query) or die( mysqli_error($connect));
            if ($result==false) {echo '<script> alert("Lỗi kết nối dữ liệu") </script>'; mysqli_close($connect);include('errorproc.php');}
            //Lấy data ra mảng
            $WorkingRow = mysqli_fetch_array($result);
            if ($WorkingRow==null) {echo '<script> alert("Lỗi kết nối dữ liệu") </script>'; mysqli_close($connect);include('errorproc.php');}
            
            $_SESSION['tag']= $i;
            $_SESSION['job']=$WorkingRow[$w];
            echo '<script> window.location.href="confirm.php" </script>';
        }       
    }
}

        

        if (isset($_POST['yes'])){      
     
            $name = $_SESSION['username'];
    
            if (isset($_SESSION['tag']) && isset($_POST['ok'])) {
                if (strtoupper($_POST['ok'])!="OK"){echo '<script> alert("Xác minh sai, vui lòng thử lại") </script>';exit();}
                $val=(string)$_SESSION['tag'];
                include('connectDB.php');
                $query = "INSERT INTO msg(name, msg1, msg2, msg3) VALUES ('$name','D','$val','')";
    
                $result = mysqli_query($connect, $query) or die( mysqli_error($connect));
                if ($result==false) {mysqli_close($connect);include('errorproc.php'); } 
                
                mysqli_close($connect);
                
                unset($_SESSION['tag']);
    
                echo '<script> alert("Đã xóa công việc") </script>';
            }
        }

?>