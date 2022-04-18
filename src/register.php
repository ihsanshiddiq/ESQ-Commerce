<?php
 include 'config.php';

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
 }



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

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
    <h4><b>Enter your personal information.</b></h4>
    <br>
    <form action="register.php" method="post">
      <div class="row">

        <div class="col-6">

          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" name="email" class="form-control textinput" id="exampleInputEmail1" aria-describedby="emailHelp"
              placeholder="">
            <small id="emailHelp" class="form-text text-muted">We'll share your email with everyone
              else.</small>
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
          <button type="submit" class="btn btnblack" style="width: 100%;"><b>REGISTER</b></button>

        </div>
      </div>

    </form>

  </section>
</body>

</html>