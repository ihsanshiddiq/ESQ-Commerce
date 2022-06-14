<?php
session_start();
if (!(isset($_SESSION["username"]))) {
    header("location: index.php?error=unauthorizeduser");
} else {
    if (!($_SESSION["id_role"] == "S" OR $_SESSION["id_role"]==3)) {
        header("location: index.php?error=unauthorizeduser");
    }
}

require_once( 'inc.koneksisql.php');
require_once('./init.class.php');
$objBarang = new Barang();
if(isset($_POST['submit'])){

    
    if(!(isset($_POST['namaBarang']) || isset($_POST['deskripsi']) || isset($_POST['jumlahStok']) || isset($_POST['harga']))){
        echo '<script>alert("mohon isi semua form");</script>';
        header("seller-editproduct.php");
        exit();
    }

    echo 'nama barang: ' . $_POST['namaBarang'];
    echo 'desc: ' . $_POST['deskripsi'];
    echo 'stok: ' . $_POST['jumlahStok'];
    echo 'harga: ' . $_POST['harga'];
    
    
    //catch user input
    $objBarang->namaBarang = $_POST['namaBarang'];
    $objBarang->deskripsi = $_POST['deskripsi'];
    $objBarang->jumlahStok = $_POST['jumlahStok'];
    $objBarang->harga = $_POST['harga'];
    $objBarang->nama_kategori = $_POST['nama_kategori'];
    $objBarang->id_penjual = $_SESSION['username'];

    $objBarang->updateBarang();

    if($objBarang->result){
        echo"<script> alert('Data berhasil ditambakan!'); </scrip>";
    }
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
            <strong>Product Edit</strong>
            </span></h4>

            <form action="" method="POST">
                <table class="table">
                    <tr>
                        <td>Nama Barang : <?php echo $objBarang->namaBarang; ?></td>
                        <td>|</td>
                        <td><p>Nama Barang Baru</p></td>
                        <td><input type="text" class="form-control textinput" name="namaBarang" id="namaBarang" ></td>
                    </tr>
                    <tr>
                        <td>Deskripsi : <?php echo $objBarang->jumlahStok; ?></td>
                        <td>|</td>
                        <td><p>Deskripsi Baru</p></td>
                        <td><input type="text" class="form-control textinput" name="deskripsi" id="deskripsi" ></td>
                    </tr>
                    <tr>
                        <td>Jumlah Stok : <?php echo $objBarang->jumlahStok; ?></td>
                        <td>|</td>
                        <td><p>Jumlah Stok Baru</p></td>
                        <td><input type="number" class="form-control textinput" name="jumlahStok" id="jumlahStok" ></td>
                    </tr>
                    <tr>
                        <td>Harga : <?php echo $objBarang->harga; ?></td>
                        <td>|</td>
                        <td><p>Harga Baru</p></td>
                        <td><input type="number" class="form-control nohp textinput" name="harga" id="harga" ></td>
                    </tr>
                    <tr>
                        <td>Kategori : <?php echo $objBarang->nama_Kategori; ?></td>
                        <td>|</td>
                        <td><p>Pilih Kategori</p></td>
                        <td><select name="nama_kategori" id="nama_kategori" class="form-select" placeholder="pilih kategori">  
                            <option value="Food">Food</option>
                            <option value="Drink">Drink</option>
                            <option value="Accessories">Accessories</option>
                            <option value="Fashion">Fashion</option>
                        </select><br><br></td>
                    </tr>
                        <td></td>
                        <td><input type="submit" class="btn btn-primary" name="save">
                        <a href="seller-listproduct.php" class="btn btn-primary">Cancel</a></td>
                    </tr>
                </table>
            </form>
      </section>

</body>

</html>