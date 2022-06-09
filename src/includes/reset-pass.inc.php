<?php
if (isset($_POST['reset'])) {
    include "../inc.koneksi.php";
    require_once('../init.class.php');

    $objAkun = new Akun();

    $objAkun->username = stripslashes($_POST['username']);
    $password = stripslashes($_POST['password']);
    $hashedPwd = password_hash($password, PASSWORD_ARGON2I, array('cost' => 8));
    $objAkun->password = $hashedPwd;

    $objAkun->reset_pass();
    if ($objAkun->hasil == TRUE) {
        header("location: ../index.php");
        echo "<script>alert('Data Berhasil Diubah')</script>";
    } else {
        header("location: ../index.php");
        echo "<script>alert('Data Gagal Diubah')</script>";
        
    }
    
   

}