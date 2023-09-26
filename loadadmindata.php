<?php
    include('connectDB.php');
    $query = "SELECT * FROM turn";
    $result = mysqli_query($connect, $query) or die( mysqli_error($connect));
    if ($result==false) {echo '<script> alert("Lỗi kết nối dữ liệu") </script>';mysqli_close($connect);include('errorproc.php');}

    echo '<th></th>';
    for ($i=1;$i<21;$i++){ echo '<th></th>';}
    echo '<th>Total</th>';
    echo '<th>Tip</th>';
    echo '<th></th>';

    $total=0;
    
    while ($row=mysqli_fetch_array($result)){
        echo '<tr>';
        $str=$row['name'];
        $query = "SELECT * FROM data WHERE name='$str'";
        $result2 = mysqli_query($connect, $query) or die( mysqli_error($connect));
        if ($result2==false) {echo '<script> alert("Lỗi kết nối dữ liệu") </script>';mysqli_close($connect);include('errorproc.php');}
        $row=mysqli_fetch_array($result2);
        for ($i=0;$i<25;$i++){
            if ($i==0 || $i==24){echo '<td  align="left" style="font-weight: bold">' . $row[$i] . '</td>'   ; }
            elseif ($i!=1) {
                if ($i==22 || $i==23){
                    if ($i==22){$total=$total+(int)$row[$i];}
                    echo '<td  align="center" style="font-weight: bold">' . $row[$i] . '</td>'   ;}
                else {
                    if ((int)$row[$i]>0) {
                        echo '<td align="center">' . $row[$i] . '</td>'   ; 
                    }else
                    echo '<td align="center" style="color: chocolate;">' . $row[$i] . '</td>'   ; 
                }
            }       
        }
        echo '</tr>';
    }
    mysqli_close($connect);
    
    echo '<h3 style="font-size:250%">Tổng thu hiện tại: $' . $total . '</h3></br>&nbsp;</br>';
    
?>