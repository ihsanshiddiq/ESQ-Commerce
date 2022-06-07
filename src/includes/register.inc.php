<?php

if (isset($_POST['submit'])) {

  require_once('../init.class.php');
  //$objAkun = new Akun();

  $username = stripslashes($_POST['username']);
  $password = stripslashes($_POST['password']);
  $passwordRepeat = stripslashes($_POST['password']);
  $namaDepan = stripslashes($_POST['f_name']);
  $namaBelakang = stripslashes($_POST['l_name']);
  $email = stripslashes($_POST['email']);
  $noHp = stripslashes($_POST['no_hp']);
  $kodePos = stripslashes($_POST['kode_pos']);
  $jalan = stripslashes($_POST['alamat']);
  $id_role = 'A'; // nanti ganti ke int biar sesuai dengan database

  //Register-Controller class. These classes below, including ORDER has to be like this and cannot be mixed up in the urutan.
  //include "inc.koneksi.php";
  include "../inc.koneksi.php";
  include "../class/register-obj.class.php";
  include "../class/register-contr.php";
  $register = new registerContr($username, $password, $passwordRepeat, $namaDepan, $namaBelakang, $email, $id_role, $noHp, $kodePos, $jalan);

  $register->registerUser();

  //Balik ke Index
  #echo"<script>alert('anda berhasil terdaftar')</script>";
  header("location: ../index.php?error=none");
}
?>