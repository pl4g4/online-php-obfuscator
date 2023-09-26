<?php

    include('connectDB.php');
    $name = $_SESSION['username'];

    $query = "SELECT * FROM history WHERE name='$name'";
    $result = mysqli_query($connect, $query) or die( mysqli_error($connect));
    if ($result==false) {echo '<script> alert("Lỗi kết nối dữ liệu") </script>'; mysqli_close($connect);include('errorproc.php');}
    //Lấy data ra mảng
    $DataHistory = mysqli_fetch_array($result);
    if ($DataHistory==null) {echo '<script> alert("Lỗi kết nối dữ liệu") </script>'; mysqli_close($connect);include('errorproc.php');}

    $query = "SELECT * FROM tiphistory WHERE name='$name'";
    $result = mysqli_query($connect, $query) or die( mysqli_error($connect));
    if ($result==false) {echo '<script> alert("Lỗi kết nối dữ liệu") </script>'; mysqli_close($connect);include('errorproc.php');}
    //Lấy data ra mảng
    $TipHistory = mysqli_fetch_array($result);
    if ($TipHistory==null) {echo '<script> alert("Lỗi kết nối dữ liệu") </script>'; mysqli_close($connect);include('errorproc.php');}

    $query = "SELECT * FROM hisdate";
    $result = mysqli_query($connect, $query) or die( mysqli_error($connect));
    if ($result==false) {echo '<script> alert("Lỗi kết nối dữ liệu") </script>'; mysqli_close($connect);include('errorproc.php');}
    //Lấy data ra mảng
    $i=1;
    $Total=0;
    $Tip=0;
    while ($RowDate = mysqli_fetch_array($result)){
        $key='d' . $i;
        echo '<tr>';

        $str = $RowDate['name'];
        if ($str=='0' || $str==null) {$str='';}
        echo '<td align="left">' . $str . '</td>';

        $str=$DataHistory[$key];
        $dec=(int)$DataHistory[$key];
        $Total=$Total+$dec;
        if ($dec==0) {$str='...';}
        echo '<td align="center"> '. $str .'</td>';

        $str=$TipHistory[$key];
        $dec=(int)$TipHistory[$key];
        $Tip=$Tip+$dec;
        if ($dec==0) {$str='';}
        echo '<td align="center"> '. $str .'</td>';
        $i=$i+1;  
        echo '</tr> </br>';
    }

    echo '<h1>Hiện tại chưa khấu trừ:</h1><br/>';
    echo '<h1>Total: $' . $Total . '</h1></br>';
    echo '<h1>Tip: $' . $Tip . '</h1></br>';

    mysqli_close($connect);

    // <tr>
    //         <td align="center">1.</td>
    //         <td></td>
    //         <td></td>
    //         <td></td>
    // </tr>

?>