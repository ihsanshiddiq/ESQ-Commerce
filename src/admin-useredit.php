<?php
session_start();
if (!(isset($_SESSION["username"]))) {
    header("location: index.php?error=unauthorizeduser");
} else {
    if (!($_SESSION["id_role"] == "A")) {
        header("location: index.php?error=unauthorizeduser");
    }
}

include 'inc.koneksi.php';
require_once 'class/class.akun.php';
$objAccount = new Akun();

if(isset($_POST['btnSubmit'])){
    $objAccount->namaDepan = $_POST['namaDepan'];
    $objAccount->namaBelakang = $_POST['namaBelakang'];
    $objAccount->email = $_POST['email'];
    $objAccount->noHp = $_POST['noHp'];
    $objAccount->jalan = $_POST['jalan'];
    $objAccount->kodePos = $_POST['kodePos'];

    if(isset($_GET['username'])){
        $objAccount->username = $_GET['username'];
        $objAccount->UpdateAccount();
    } else {
        $cekEmail = $objAccount->ValidateEmail($_POST['email']); //belum berfungsi shidman

        if($cekEmail){
          echo "<script> alert('Email sudah terdaftar'); </script>";
        } else {
          $objAccount->addAkun();
        }
        
        //nda tau ji fungsi ini buat apa belum ada urlna juga :v
        if($objAccount->hasil){
          echo "<script> alert('".$objAccount->message."') </script>";
          //echo '<META HTTP-EQUIV="Refresh" Content="0; URL=#">';
        } else {
          echo "<script> alert('Proses gagal. Silahkan ulangi'); </script>";
        }
    }

} else if(isset($_GET['username'])){
    $objAccount->username = $_GET['username'];
    $objAccount->SelectOneAccount();
}
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

    <!--CSS REFERENCE-->
    <link rel="stylesheet" href="../lib/css/style.css">
 

  <title>Landing Page | Index</title>
</head>

<body>
    <nav>
        <?php
            require 'navbar.php';
        ?>
    </nav>
    <!---->
      
      <script>
      
      function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
      }
      
      function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
      }

      var absoluted = false;
      function expandNav() {

        if (absoluted == true){
          document.getElementById("navbar").style.opacity = "70%";
          absoluted = false;
        } else {
          document.getElementById("navbar").style.backgroundColor = "white";
          document.getElementById("navbar").style.opacity = "100%";
          absoluted = true;
        }
        
      }
      
      function unexpandNav() {
        document.getElementById("navbar").style.opacity = "70%";
      }
      </script>
      <!---->

      <section class="container my-5 py-5">
            <h4 class="title">
            <span class="text">
            <strong>User Edit</strong>
            </span></h4>

            <form action="" method="POST">
                <table class="table">
                    <tr>
                        <td>Nama Depan</td>
                        <td>:</td>
                        <td><input type="text" class="form-control textinput" name="namadepan" id="namadepan" value="<?php echo $objAccount->namaDepan; ?>"></td>
                    </tr>
                    <tr>
                        <td>Nama Belakang</td>
                        <td>:</td>
                        <td><input type="text" class="form-control textinput" name="namabelakang" id="namabelakang" value="<?php echo $objAccount->namaBelakang; ?>"></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td><input type="email" class="form-control textinput" name="email" id="email" value="<?php echo $objAccount->email; ?>"></td>
                    </tr>
                    <tr>
                        <td>No.Handphone</td>
                        <td>:</td>
                        <td><input type="number" class="form-control nohp textinput" name="nohp" id="nohp" value="<?php echo $objAccount->noHp; ?>"></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td><input type="textarea" class="form-control textinput" name="alamat" id="alamat" value="<?php echo $objAccount->jalan; ?>"></td>
                    </tr>
                    <tr>
                        <td>Kode Pos</td>
                        <td>:</td>
                        <td><input type="number" class="form-control textinput" name="kodepos" id="kodepos" value="<?php echo $objAccount->kodePos; ?>"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" class="btn btn-primary" value="save" name="btnSubmit">
                        <a href="admin-listuser.php" class="btn btn-primary">Cancel</a></td>
                    </tr>
                </table>
            </form>
      </section>

</body>

</html>