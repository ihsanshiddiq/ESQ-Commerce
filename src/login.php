<?php
session_start();
/* 
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

*/

/*
 include 'inc.koneksi.php';

if (isset($_POST['submit'])) {
  include 'inc.koneksi.php';

 require_once('./init.class.php');
 //$objAkun = new Akun();

 $username = $_POST['email'];
 $password = $_POST['password'];

 //Register-Controller class. These classes below, including ORDER has to be like this and cannot be mixed up in the urutan.
 //include "inc.koneksi.php";
 include "login-obj.class.php";
 include "login-contr.php";
 $login = new loginContr($username, $password);

 $login->loginUser();

 //Balik ke Index
 header("location: index.php?error=none");


 if (isset($_POST['submit'])) {
    $username = stripslashes($_POST['username']);
    $username = mysqli_real_escape_string($conn, $username);
    $password = stripslashes($_POST['password']);
    $password = mysqli_real_escape_string($conn, $password);
    $email = stripslashes($_POST['email']);
    $email = mysqli_real_escape_string($conn, $email);
    $phone = stripslashes($_POST['no_hp']);
    $phone = mysqli_real_escape_string($conn, $phone);
    $username = stripslashes($_POST['username']);
    $username = mysqli_real_escape_string($conn, $username);

    $hash = hash("sha256", $password);
 }
*/


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!--CDN-->
  <?php
  require 'head-conf.html';
  ?>

 
    <link rel="stylesheet" href="../lib/css/style.css">
  <link rel="stylesheet" href="../lib/customskin.css">


  <title>Document</title>
</head>

<body>
  <navbar>

    <?php 
    require 'navbar.php'; 
    ?>
  </navbar>

  <section class="container">

    <br>
    <form action="includes/login.inc.php" method="post">
      <div class="row">

        <div class="col-md-6">
          <h4 class="my-3"><b>LOGIN</b></h4>
          
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" class="form-control textinput" id="username" placeholder="" require>
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control textinput" id="password" placeholder="" require>
          </div>

            

            <a href="./forgot-pass.php">Forget your password?</a>
            <br><br>

            <button type="submit" name="submit" href="" class="btn btnblack" style="width: 100%;"><b>Login</b></button>


          

        </div>
        </form>


        <div class="col-md-6">
          <h4 class="my-3"><b>REGISTER</b></h4>
          <p> If you still don't have an account, use this option to access the registration form
              <br> <br>
              When you provide us with details, you will have a fast and pleasant shopping experience at ESQ COMMERCE</p>

           
          <div class="row">
            <div class="col-md-6">
              <form action="register.php">
                <button type="" class="btn btnblack my-1" style="width: 100%;" href="register.php"><b>As Buyer</b></button>
              </form>
            </div>
            <div class="col-md-6">
              <form action="registerseller.php">
                <button type="" class="btn btnblack my-1" style="width: 100%;" href="registerseller.php"><b>As Seller</b></button>
              </form>
            </div>
            
          </div>

            </div>
      
      </div>


    </div>

      

    

  </section>
</body>

</html>