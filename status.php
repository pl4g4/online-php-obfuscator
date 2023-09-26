<?php

    include('connectDB.php');
    $name = $_SESSION['username'];
    $query = "SELECT * FROM data WHERE name='$name'";
    $result = mysqli_query($connect, $query) or die( mysqli_error($connect));
    if ($result==false) {mysqli_close($connect);include('errorproc.php');}
    
    //Lấy data ra mảng
    $DataRow = mysqli_fetch_array($result);
    if ($DataRow==null) {mysqli_close($connect);include('errorproc.php');}
    
    (string)$st = trim($DataRow['status']);
    
    if ($st==null or $st=="" or $st=="A"){
        echo '<h4>Trạng thái: đang rảnh</h4></br>';
    }else{
        if ($st=="W"){
            echo '<h3>Trạng thái: đang làm việc</h3></br>';
        } else {
            echo '<h5>Trạng thái: luôn luôn bận</h5></br>';
        }
    }
    
    mysqli_close($connect);
?>