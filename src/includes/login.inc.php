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

 if ($_SESSION["id_role"] == 1 OR $_SESSION["id_role"]== "A"){

    header("location: ../index.php?error=none-login=admin");
    
 } else if($_SESSION["id_role"] == "B" OR $_SESSION["id_role"] == "2"){

   header("location: ../index.php?error=none");

 } else if ($_SESSION["id_role"] == "S" OR $_SESSION["id_role"] == "3"){

   header("location: ../myshop.php?error=none");

 } else {
   
   header("location: ../index.php?error=none");
   
 }
}

?>