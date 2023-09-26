<?php
    include('connectDB.php');
    $name = $_SESSION['username'];

    $query = "SELECT * FROM data WHERE name='$name'";

    $result = mysqli_query($connect, $query) or die( mysqli_error($connect));
    if ($result==false) {mysqli_close($connect);include('errorproc.php');}
    //Lấy data ra mảng
    $DataRow = mysqli_fetch_array($result);
    if (empty($DataRow)) {mysqli_close($connect);include('errorproc.php');}

    // lay thong in Payment
    $query = "SELECT * FROM payment WHERE name='$name'";
    $result = mysqli_query($connect, $query) or die( mysqli_error($connect));
    if ($result==false) {mysqli_close($connect);include('errorproc.php');}
    //Lấy data ra mảng
    $pay = mysqli_fetch_array($result);
    if (empty($pay)) {mysqli_close($connect);include('errorproc.php');}

    $payTotal=0; $w='';
    for ($i=1;$i<=20;$i++){
        $w='w' . $i; 
        if (((int)$pay[$w])!=0) {$payTotal=$payTotal+(int)$pay[$w];}
        else {$payTotal=$payTotal+(int)$DataRow[$w];}
    }
    
    $Total = (string)$DataRow['total']; 
    $Tip = (string)$DataRow['tip']; 
    $b12 = (string)$DataRow['B12']; 
    $b13 = (string)$DataRow['B13'];
    if ($payTotal==0){$payTotal='0';}
    if ($Total=='' || $Total==null) {$Total='0';} 
    if ($b12=='0' || $b12==null) {$b12='';} 
    if ($b13=='0' ||$b13==null) {$b13='';}  
    if (($payTotal==$Total)&&($payTotal!='0')){echo '</br> Tổng tiền: ' . $Total . '   -   Tip: ' . $Tip . '</br>';}
    elseif (($payTotal!='0')||($Total!='0')){echo '</br> Tổng tiền: ' . $Total . '/' . $payTotal . '   -   Tip: ' . $Tip . '</br>';}
    if ($b12<>'') {echo 'Bonus 1/2: ' . $b12 . '</br>';}
    if ($b13<>'') {echo 'Bonus 1/3: ' . $b13 . '</br>';}   

    mysqli_close($connect);
?>