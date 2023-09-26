<html>
<?php
    echo '<script> alert(" DA VAPO") </script>';
    session_start();
    if (isset($_SESSION['username'])) { $name=$_SESSION['username']; } else { header('location: info.php'); } 
    
    if (isset($_POST['congviec'])) {$job=(string)$_POST['congviec'];} else { header('location: info.php'); }
    
           
    include('connectDB.php');

    $query = "INSERT INTO msg(name, msg1, msg2, msg3) VALUES ('$name','W','$job','')";

    $result = mysqli_query($connect, $query) or die( mysqli_error($connect));
    
    unset($_SESSION['congviec']) ;  

    if ($result==false) { echo '<script> alert("Hệ thống đang bận, vui lòng thử lại!") </script>'; echo '<script> window.location.href="info.php" </script>';} 
    mysqli_close($connect);
    
    echo '<script> alert("Đã Thêm công việc, quay lại để xem kết quả!") </script>';  
?>

</html>