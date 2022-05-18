<?php
/*
if (isset($_POST['submit'])) {
   include 'inc.koneksi.php';

  require_once('./init.class.php');
  $objAkun = new Akun();


    $objAkun->username = stripslashes($_POST['username']);
    $objAkun->username = mysqli_real_escape_string($objAkun->connection, $objAkun->username);
    $objAkun->password = stripslashes($_POST['password']);
    $objAkun->password = mysqli_real_escape_string($objAkun->connection, $objAkun->password);
    $objAkun->namaDepan = stripslashes($_POST['f_name']);
    $objAkun->namaDepan = mysqli_real_escape_string($objAkun->connection, $objAkun->namaDepan);
    $objAkun->namaBelakang = stripslashes($_POST['l_name']);
    $objAkun->namaBelakang = mysqli_real_escape_string($objAkun->connection, $objAkun->namaBelakang);
    $objAkun->email = stripslashes($_POST['email']);
    $objAkun->email = mysqli_real_escape_string($objAkun->connection, $objAkun->email);
    $objAkun->noHp = stripslashes($_POST['no_hp']);
    $objAkun->noHp = mysqli_real_escape_string($objAkun->connection, $objAkun->noHp);
    $objAkun->kodePos = stripslashes($_POST['kode_pos']);
    $objAkun->kodePos = mysqli_real_escape_string($objAkun->connection, $objAkun->kodePos);
    $objAkun->jalan = stripslashes($_POST['alamat']);
    $objAkun->jalan = mysqli_real_escape_string($objAkun->connection, $objAkun->jalan);
    $objAkun->id_role = 2;


  
   // if (!empty($objAkun->username) || !empty($objAkun->password) || !empty($objAkun->namaDepan) || !empty($objAkun->namaBelakang) || !empty($objAkun->email)|| !empty($objAkun->noHp)|| !empty($objAkun->jalan)|| !empty($objAkun->kodePos)|| !empty($objAkun->password) ) {

                    
      $objAkun->cek_akun($objAkun->username);
      if ($objAkun->hasil === FALSE) {        
          $objAkun->password = password_hash($objAkun->password, PASSWORD_ARGON2I, array('cost' => 8));            

          $objAkun->addAkun();
          
          
             
              
              if ($objAkun->hasil === TRUE) {
                  echo "New record created successfully";
                  echo "<script> alert('Anda berhasil mendaftar, silahkan login untuk melanjutkan'); </script>";
                  echo "<script>window.location = 'login.php';</script>";
                  
                } else {
                  echo "<script> alert('Anda gagal ditambahkan, silahkan coba lagi'); </script>";
                  echo "<script>window.location = 'register.php';</script>";

              }
              
             
              
      } else {
              echo "<script> alert('username anda sudah terdaftar sebelumnya'); </script>";
              echo "<script>window.location = 'register.php';</script>";
      }

          
     
      
  

   

 }

*/

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <?php
  require 'head-conf.html';
  ?>

    <link rel="stylesheet" href="../lib/css/style.css">



  <title>Document</title>
</head>

<body>
  <navbar>

    <?php 
    require 'navbar.php'; 
    ?>
  </navbar>

  <section class="container">
    <h4><b>Enter your personal information.</b></h4>
    <br>
    <form action="includes/register.inc.php" method="POST">
      <div class="row">

        <div class="col-6">

          <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" name="email" class="form-control textinput" id="email"aria-describedby="emailHelp"
              placeholder="">
            
          </div>

        </div>

      </div>

      <div class="row">

        <div class="col-md-6">

          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control textinput" id="password" placeholder="">
          </div>

          <div class="form-group">

            <input type="text" name="gender" class="form-control gender textinput" id="gender" placeholder="Gender">
          </div>

          <div class="form-group">

            <input type="number" name="no_hp" class="form-control nohp textinput" id="nohp" placeholder="Nomor Handphone">
          </div>
          <br>

        </div>
        <div class="col-md-6">
          <br>
          <div class="form-group">

            <input type="text" name="username" class="form-control textinput" id="username" placeholder="Username">
          </div>
          <div class="form-group">

            <input type="text" name ="f_name" class="form-control textinput" id="namadepan" placeholder="Nama depan">
          </div>
          <div class="form-group">

            <input type="text" name ="l_name" class="form-control textinput" id="namabelakang" placeholder="Nama belakang">
          </div>



        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="form-group">

            <textarea name="alamat" class="form-control alamat textinput" id="alamat" placeholder="Alamat" rows="1"></textarea>
          </div>
        </div>
      </div>

      <div class="row">

        <div class="col-md-6">
          <div class="form-group">

            <input type="text" name="provinsi" class="form-control provinsi textinput" id="provinsi" placeholder="Provinsi">
          </div>

          <div class="form-group">

            <input type="text" name ="kota" class="form-control kota textinput" id="kota" placeholder="Kota">
          </div>

        </div>

        <div class="col-md-6">

          <div class="form-group">

            <input type="text" name="kecamatan" class="form-control kecamatan textinput" id="kecamatan" placeholder="Kecamatan">
          </div>

          <div class="form-group">

            <input type="number" name="kode_pos" class="form-control kodepos textinput" id="kodepos" placeholder="Kode Pos">
          </div>

        </div>


      </div>

      <div class="row">
        <div class="col">
          <a href="login.php">Already have an account? Click here to login</a><br><br>
          <button type="submit" class="btn btnblack" style="width: 100%;" name="submit"><b>REGISTER</b></button>

        </div>
      </div>

    </form>

  </section>

  <!--FOOTER-->
  <?php
  require 'footer.html';  
  ?>
</body>

</html>