<?php
    $local='localhost';
    $user = 'nailapp';
    $pass = '';
    $data = 'nailapp';

    $connect = new mysqLi($local,$user,$pass,$data) ;
    if ($connect) { 
        mysqLi_query($connect,"SET NAMES 'UTF8' ") ;
    }else {
        echo '<script> alert("Không thể kết nối đến máy chủ Database!") </script>';
    }
?>