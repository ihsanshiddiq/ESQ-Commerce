<?php
    $conn = mysqli_connect("localhost","root","","esq-commerce-local");

    if(mysqli_connect_errno()){
        echo 'Gagal terhubung ke database: '.mysqli_connect_error();
        exit();
    }
?>