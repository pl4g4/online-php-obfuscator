<?php

    include('connectDB.php');
    $name = $_SESSION['username'];

    $query = "SELECT * FROM payslip WHERE name='$name'";
    $result = mysqli_query($connect, $query) or die( mysqli_error($connect));
    if ($result==false) {echo '<script> alert("Lỗi kết nối dữ liệu") </script>'; mysqli_close($connect);include('errorproc.php');}
    //Lấy data ra mảng
    $DataPayslip = mysqli_fetch_array($result);
    if ($DataPayslip==null) {echo '<script> alert("Lỗi kết nối dữ liệu") </script>'; mysqli_close($connect);include('errorproc.php');}

    $query = "SELECT * FROM tippayslip WHERE name='$name'";
    $result = mysqli_query($connect, $query) or die( mysqli_error($connect));
    if ($result==false) {echo '<script> alert("Lỗi kết nối dữ liệu") </script>'; mysqli_close($connect);include('errorproc.php');}
    //Lấy data ra mảng
    $TipPayslip = mysqli_fetch_array($result);
    if ($DataPayslip==null) {echo '<script> alert("Lỗi kết nối dữ liệu") </script>'; mysqli_close($connect);include('errorproc.php');}

    $query = "SELECT * FROM paydate";
    $result = mysqli_query($connect, $query) or die( mysqli_error($connect));
    if ($result==false) {echo '<script> alert("Lỗi kết nối dữ liệu") </script>'; mysqli_close($connect);include('errorproc.php');}
    //Lấy data ra mảng
    $i=1;
    while ($RowDate = mysqli_fetch_array($result)){
        $key='d' . $i;
        echo '<tr>';

        $str = $RowDate['name'];
        if ($str=='0' || $str==null) {$str='';}
        echo '<td align="left">' . $str . '</td>';

        $str=$DataPayslip[$key];
        $dec=(int)$DataPayslip[$key];
        if ($dec==0) {$str='';}
        echo '<td align="center"> '. $str .'</td>';

        $str=$TipPayslip[$key];
        $dec=(int)$TipPayslip[$key];
        if ($dec==0) {$str='';}
        echo '<td align="center"> '. $str .'</td>';  
        echo '</tr> </br>';
        $i=$i+1;
    }
    echo '<h1>Quý lương trước:</h1></br>';
    echo '<h1>Total: $' . $DataPayslip['total'] . '</h1></br>';
    echo '<h1>Nhận về: $' . $DataPayslip['deduct'] . '   +   Tip: $' . $DataPayslip['tip'] . '</h1></br>';
    
    mysqli_close($connect);

    // <tr>
    //         <td align="center">1.</td>
    //         <td></td>
    //         <td></td>
    //         <td></td>
    // </tr>

?>