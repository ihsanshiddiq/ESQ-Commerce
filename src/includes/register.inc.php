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
  $id_role = 'A';

  //Register-Controller class. These classes below, including ORDER has to be like this and cannot be mixed up in the urutan.
  //include "inc.koneksi.php";
  include "../inc.koneksi.php";
  include "../class/register-obj.class.php";
  include "../class/register-contr.php";
  $register = new registerContr($username, $password, $passwordRepeat, $namaDepan, $namaBelakang, $email, $id_role, $noHp, $kodePos, $jalan);

  $register->registerUser();

  //Balik ke Index
  header("location: ../index.php?error=none");
}
?>