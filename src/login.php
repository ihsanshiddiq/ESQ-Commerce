<?php
 require 'config.php';

 if (isset($_POST['submit'])) {
    $uname = stripslashes($_POST ['uname']);
    $uname = mysqli_real_escape_string($conn, $uname);
    $pass = stripslashes($_POST ['pass']);
    $pass = mysqli_real_escape_string($conn, $pass);

    $user = mysqli_query($conn,"SELECT * FROM `akun` WHERE `username`='$uname' and `password`='$pass'");
    $cek = mysqli_num_rows($user);
 
if($cek > 0){
	session_start();
    $row = mysqli_fetch_array($user);
	$_SESSION['nama_user'] = $row['nama'];
	$_SESSION['email_user'] = $row['email'];
	$_SESSION['gender_user'] = $row['gender'];
	$_SESSION['number_user'] = $row['nomer_telepon'];
	$_SESSION['status'] = "login";
	header("location:user/index.php");
}else{
	echo
    "<script> alert('Password Does Not Match'); </script>";
		
}


 }



?>
