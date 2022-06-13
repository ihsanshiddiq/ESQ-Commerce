<?php

if (isset($_POST['submit'])) {

  require_once('../init.class.php');
  //$objAkun = new Akun();

  $username = $_POST['username'];
  $password = $_POST['password'];
  $passwordRepeat = $_POST['password'];
  $namaDepan = $_POST['f_name'];
  $namaBelakang = $_POST['l_name'];
  $email = $_POST['email'];
  $noHp = $_POST['no_hp'];
  $kodePos = $_POST['kode_pos'];

  $jalan = $_POST['alamat'];
  $id_role = 3;

  //unique trait/variable for seller
  $namaToko = $_POST['namaToko'];
  $instagram = $_POST['instagram'];
  $facebook = $_POST['facebook'];

  //Register-Controller class. These classes below, including ORDER has to be like this and cannot be mixed up in the urutan.
  //include "inc.koneksi.php";
  include "../inc.koneksi.php";
  include "../class/register-obj.class.php";
  include "../class/registerseller-contr.php";
  $register = new registerSellerContr($username, $password, $passwordRepeat, $namaDepan, $namaBelakang, $email, $id_role, $noHp, $kodePos, $jalan, $namaToko, $instagram, $facebook);

  $register->registerSeller();

  //Balik ke Index
  header("location: ../index.php?error=nonel");
}

if (isset($_POST['validate'])) {

  $namaToko = $_POST['namaToko'];;

  include "../inc.koneksi.php";
  require_once "../class/register-obj.class.php";
  require_once "../class/registerseller-contr.php";
  
  $valid = new valider($namaToko);
  $valid -> validateToko($namaToko);

  //header("location: ../registerseller.php");
}   
?>