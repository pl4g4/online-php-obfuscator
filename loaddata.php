<?php

include('connectDB.php');
$name = $_SESSION['username'];

$query = "SELECT * FROM data WHERE name='$name'";
$result = mysqli_query($connect, $query) or die( mysqli_error($connect));
if ($result==false) {echo '<script> alert("Lỗi kết nối dữ liệu") </script>'; mysqli_close($connect);include('errorproc.php');}
//Lấy data ra mảng
$DataRow = mysqli_fetch_array($result);
if ($DataRow==null) {echo '<script> alert("Lỗi kết nối dữ liệu") </script>'; mysqli_close($connect);include('errorproc.php');}

$query = "SELECT * FROM working WHERE name='$name'";
$result = mysqli_query($connect, $query) or die( mysqli_error($connect));
if ($result==false) {echo '<script> alert("Lỗi kết nối dữ liệu") </script>'; mysqli_close($connect);include('errorproc.php');}
//Lấy data ra mảng
$WorkingRow = mysqli_fetch_array($result);
if ($WorkingRow==null) {echo '<script> alert("Lỗi kết nối dữ liệu") </script>'; mysqli_close($connect);include('errorproc.php');}

// Đọc dữ liệu Payment
$query = "SELECT * FROM payment WHERE name='$name'";
$result = mysqli_query($connect, $query) or die( mysqli_error($connect));
if ($result==false) {mysqli_close($connect);}
//Lấy data ra mảng
$pay = mysqli_fetch_array($result);
if ($pay==null) { mysqli_close($connect);}

    
    for ($i=1; $i<=20; $i++){
        $key='w' . $i;

        echo '<tr>';
        // echo '<td align="center">' . $i . '. </td>';
        
        $strW = $WorkingRow[$key];
        
        if ($strW=='0' || $strW==null) {$strW='';}
        // echo '<td align="left">' . $strW . '</td>';
  
        $cancel=false;
        $dec = (int)trim($DataRow[$key]);
        $strT=(string)$dec;

        if (strlen($strW)>0){ echo '<td align="center">' . $i . '. </td>'; }else{ echo '<td align="center"> </td>';}
        echo '<td align="left">' . $strW . '</td>';

        if ($strT=='0' || $strT==null || $dec==0) {$strT='';} 
        if ($strT=='' && $strW!=''){ // Chưa trả tiền
            if ($pay[$key]>0){
                echo '<td align="center"> <h3>'. $pay[$key] .'</h3></td>';
                $cancel=true;
            }else{
                echo '<td align="center"> <input type="number" name="total' . $i . '" /> </td>';
                // $cancel=true;
            }  
        }
        else {
            if (isset($pay[$key]) && $pay[$key]>0){
                if ((int)$strT!=(int)$pay[$key]){echo '<td align="center"> '. $strT . '/' . $pay[$key] .  '</td>'; }
                else {echo '<td align="center"> '. $strT . '</td>';}
            }
            else echo '<td align="center">' . $strT . ' </td>';
        }
        // Xử lý Tip
        if ($cancel){
            echo '<td align="center"> <input type="submit" class="btCancel" name="cancel' . $i . '" value="X" /> </td>';
        }else{
            $str=trim($DataRow[$key]);
            if (strpos($str,'.')){
                $ps=strpos($str,'.')+1;
                $sl=strlen($str);
                while ($sl-$ps<3){
                    $str=$str . "0";
                    $ps=strpos($str,'.')+1;
                    $sl=strlen($str);
                }
                $str=substr($str,$ps,3);
                $str=(string)(int)$str;
            }else{
                $str="";
            }

            if (($str=='0') || ($str==null)){$str='';}
            echo '<td align="center">' . $str . '</td>';

            echo '</tr>';
        }      
    }

    mysqli_close($connect);
    
    // Xoa nhap Total
    for ($i=1;$i<=20;$i++){
        $bt='cancel'.$i;
        if (isset($_POST[$bt])){
            include('connectDB.php');
            $name = $_SESSION['username'];

            $query = "INSERT INTO msg(name, msg1, msg2, msg3) VALUES ('$name','D','$i','')";

            $result = mysqli_query($connect, $query) or die( mysqli_error($connect));
            if ($result==false) {
                echo '<script> alert("Hệ thống đang bận, vui lòng thử lại!") </script>';
                mysqli_close($connect);
                include('errorproc.php');
            } 
            mysqli_close($connect);
            echo '<script> alert("Đã xóa Total cho thẻ ' . $i . '") </script>';
            echo '<script> window.location.href="index.php" </script>';
        }
    }
 
?>