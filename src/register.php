<?php
 //include 'config.php';



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
  <nav>
    <!-- INSERT NAVBAR FILE HERE (AFTER PHP CONVERSION)-->
    <?php 
    require 'navbar.php'; 
    ?>
  </nav>

  <section class="container">
    <h4><b>Enter your personal information so we can sell it (pls we actually need money)</b></h4>
    <br>
    <form action="">
      <div class="row">

        <div class="col-6">

          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control textinput" id="exampleInputEmail1" aria-describedby="emailHelp"
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
            <input type="password" class="form-control textinput" id="exampleInputPassword1 textinput" placeholder="">
          </div>

          <div class="form-group">

            <input type="text" class="form-control gender textinput" id="gender" placeholder="Gender">
          </div>

          <div class="form-group">

            <input type="number" class="form-control nohp textinput" id="nohp" placeholder="Nomor Handphone">
          </div>
          <br>

        </div>
        <div class="col-md-6">
          <br>
          <div class="form-group">

            <input type="text" class="form-control textinput" id="exampleInputPassword1" placeholder="Username">
          </div>
          <div class="form-group">

            <input type="text" class="form-control textinput" id="namadepan" placeholder="Nama depan">
          </div>
          <div class="form-group">

            <input type="text" class="form-control textinput" id="namabelakang" placeholder="Nama belakang">
          </div>



        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="form-group">

            <textarea class="form-control alamat textinput" id="alamat" placeholder="Alamat" rows="1"></textarea>
          </div>
        </div>
      </div>

      <div class="row">

        <div class="col-md-6">
          <div class="form-group">

            <input type="text" class="form-control provinsi textinput" id="provinsi" placeholder="Provinsi">
          </div>

          <div class="form-group">

            <input type="text" class="form-control kota textinput" id="kota" placeholder="Kota">
          </div>

        </div>

        <div class="col-md-6">

          <div class="form-group">

            <input type="text" class="form-control kecamatan textinput" id="kecamatan" placeholder="Kecamatan">
          </div>

          <div class="form-group">

            <input type="number" class="form-control kodepos textinput" id="kodepos" placeholder="Kode Pos">
          </div>

        </div>


      </div>

      <div class="row">
        <div class="col">

          <button type="submit" class="btn btnblack" style="width: 100%;"><b>REGISTER</b></button>

        </div>
      </div>

    </form>

  </section>
</body>

</html>