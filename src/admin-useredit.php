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
$objAkun = new Akun();
$objAkun->username=$_GET['edituser'];

$objAccount = $objAkun->SelectOneAkunPDO($_GET['edituser']);

if(isset($_POST['save'])){
    $objAccount->namaDepan = $_POST['namaDepan'];
    $objAccount->namaBelakang = $_POST['namaBelakang'];
    $objAccount->email = $_POST['email'];
    $objAccount->noHp = $_POST['noHp'];
    $objAccount->jalan = $_POST['jalan'];
    $objAccount->kodePos = $_POST['kodePos'];
    $objAccount->UpdateAccountPDO();

} /*else if(isset($_GET['username'])){
    $objAccount->username = $_GET['username'];
    $objAccount->SelectOneAccount();
}*/

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
                        <td>Nama Depan : <?php echo $objAccount->namaDepan; ?></td>
                        <td>|</td>
                        <td><p>Nama Depan Baru</p></td>
                        <td><input type="text" class="form-control textinput" name="namadepan" id="namadepan" ></td>
                    </tr>
                    <tr>
                        <td>Nama Belakang : <?php echo $objAccount->namaBelakang; ?></td>
                        <td>|</td>
                        <td><p>Nama Belakang Baru</p></td>
                        <td><input type="text" class="form-control textinput" name="namabelakang" id="namabelakang" ></td>
                    </tr>
                    <tr>
                        <td>Email : <?php echo $objAccount->email; ?></td>
                        <td>|</td>
                        <td><p>Email Baru</p></td>
                        <td><input type="email" class="form-control textinput" name="email" id="email" ></td>
                    </tr>
                    <tr>
                        <td>No.Handphone : <?php echo $objAccount->noHp; ?></td>
                        <td>|</td>
                        <td><p>No.Handphone Baru</p></td>
                        <td><input type="number" class="form-control nohp textinput" name="nohp" id="nohp" ></td>
                    </tr>
                    <tr>
                        <td>Alamat : <?php echo $objAccount->jalan; ?></td>
                        <td>|</td>
                        <td><p>Alamat Baru</p></td>
                        <td><input type="textarea" class="form-control textinput" name="alamat" id="alamat" ></td>
                    </tr>
                    <tr>
                        <td>Kode Pos : <?php echo $objAccount->kodePos; ?></td>
                        <td>|</td>
                        <td><p>Kode Pos Baru</p></td>
                        <td><input type="number" class="form-control textinput" name="kodepos" id="kodepos" ></td>
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