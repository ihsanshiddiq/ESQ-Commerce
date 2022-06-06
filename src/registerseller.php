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
    <form action="includes/register-seller.inc.php" method="POST">
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
            <select type="select" name="gender" class="form-control gender selectinput" id="gender" placeholder="Gender"> 
                <option value="none">-Select your gender-</option>
                <option value="men">Men</option>
                <option value="women">women</option>
            </select>
          </div>
          <br>

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
        <div class="col-md-9">

          <div class="col">
          <a>*Note: Jl.nama, No.rumah RT.00 RW.00 NamaKelurahan NamaKecamatan Provinsi KodePos</a>
          </div>
          
          <div class="form-group">
            <textarea name="alamat" class="form-control alamat textinput" id="alamat" placeholder="Alamat" rows="1"></textarea>
          </div>

        </div>

        <div class="col-md-3">
          <div><br></div>
          <div class="form-group">
            <input type="number" name="kode_pos" class="form-control kodepos textinput" id="kodepos" placeholder="Kode Pos">
          </div>
        </div>

      </div>

      <div class="row">
        <div class="col-md-9">
          <div class="form-group">

            <textarea name="namaToko" class="form-control namaToko textinput" id="namaToko" placeholder="Nama Toko" rows="1"></textarea>
          </div>
        </div>

        <div class="col-md-3">
          <div class="col">

            <button type="submit" class="btn btnblack" style="width: 100%;" name="submit"><b>Validate Name</b></button>
          </div>
        </div>
      </div>

      <div class="row">

        <div class="col-md-6">
          <div class="form-group">

            <input type="text" name="instagram" class="form-control instagram textinput" id="instagram" placeholder="Instagram">
          </div>

          <div class="form-group">

            <input type="text" name ="facebook" class="form-control facebook textinput" id="facebook" placeholder="Facebook">
          </div>

        </div>


      </div>

      <div class="row">
        <div class="col">
          <a>Already have an account? </a> <a href="login.php" > Click here to login </a><br><br>
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