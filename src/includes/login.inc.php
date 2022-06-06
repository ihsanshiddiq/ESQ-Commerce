<?php
 //include 'inc.koneksi.php';

if (isset($_POST['submit'])) {


 require_once('../init.class.php');
 //$objAkun = new Akun();

 $username = $_POST['username'];
 $password = $_POST['password'];

 //Register-Controller class. These classes below, including ORDER has to be like this and cannot be mixed up in the urutan.
 //include "inc.koneksi.php";
 include '../inc.koneksi.php';
 include "../class/login-obj.class.php";
 include "../class/login-contr.php";
 $login = new loginContr($username, $password);

 $login->loginUser();

 //Balik ke Index

 if ($_SESSION["id_role"] == 0){

    header("location: ../index.php?error=none-login=admin");
 }

 if ($_SESSION["id_role"] == "B"){
    header("location: ../index.php?error=none");
 }

 echo "lol";
}

?>