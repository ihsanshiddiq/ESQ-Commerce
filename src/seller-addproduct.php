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

    if(isset($_POST['namaBarang']) || isset($_POST['deskripsi']) || isset($_POST['jumlahStok']) || isset($_POST['harga']) || isset($_POST['nama_kategori']))
    
    //catch user input
    $objBarang->namaBarang = $_POST['namaBarang'];
    $objBarang->deskripsi = stripslashes($_POST['deskripsi']);
    $objBarang->jumlahStok = $_POST['jumlahStok'];
    $objBarang->harga = $_POST['harga'];
    $objBarang->nama_kategori = $_POST['nama_kategori'];
    $objBarang->id_penjual = $_SESSION['username'];

    $objBarang->addBarang();

    if($objBarang->result){
        echo"<script> alert('Data berhasil ditambakan!'); </script>";
    }

    // get ready to upload image
    $folder = '../assets/produk/';
    $file_type = array('jpg','jpeg', 'png', 'gif', 'bmp');
    $max_size = 2000000;
    $isErrorFile =false;
    $isSuccessUpload = true;

    if(!empty($_FILES['fotoBarang']['name'])){
        $file_name  = $_FILES['fotoBarang']['name'];
        $file_size  = $_FILES['fotoBarang']['size'];
        // Find out the file extension using "explode" function
        $explode    = explode('.', $file_name);
        $extensi    = $explode[count($explode)-1];

        // check if the file type is correct
        if(!in_array($extensi, $file_type)){
            $isErrorFile = true;
            $message .= 'Tipe file yang anda upload tidak sesuai';
        }
        if($file_size>$max_size){
            $isErrorFile = true;
            $message .= 'Ukuran file melebihi batas maximum';
        }

        if($isErrorFile){
            echo "<script> alert('$message'):</script>";
        }
        else{
            $objBarang->fotoBarang = $objBarang->id.'.'.$extensi;
            $isSuccessUpload = move_uploaded_file($_FILES['fotoBarang']['tmp_name'], $folder.$objBarang->fotoBarang);

            if(!$isSuccessUpload){
                echo "<script> alert('Upload error');</script>";
                die();
            }
        }
    }
    if($isSuccessUpload){					 
        $objBarang->updateFoto();
        if($objBarang->result){			
            echo '<META HTTP-EQUIV="Refresh" Content="0; URL=seller-listproduct.php">'; 	
    
        }
        else
            echo "<script> alert('Proses update gagal wei'); </script>";			
    }
    else
        echo "<script> alert('Proses upload gagal. Silakan ulangi'); </script>";


}
elseif(isset($_GET['id'])){
    $objBarang->id = $_GET['id'];
    $objBarang->viewOneBarang();
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
 

  <title>Add Barang | Index</title>
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
            <strong>Add barang</strong>
            </span></h4>

            <form method= "post" action="" enctype="multipart/form-data">
                <table class="table">
                    <tr>
                        <td><p>Nama Barang</p></td>
                        <td><input type="text" class="form-control textinput"  name="namaBarang" id="namaBarang" ></td>
                    </tr>
                    <tr>
                        <td><p>Deskripsi</p></td>
                        <td><input type="text" class="form-control textinput" name="deskripsi" id="deskripsi" ></td>
                    </tr>
                        <td><p>Jumlah Stok</p></td>
                        <td><input type="text" class="form-control textinput" name="jumlahStok" id="jumlahStok" ></td>
                    </tr>
                    <tr>
                        <td><p>Harga</p></td>
                        <td><input type="number" class="form-control textinput" name="harga" id="harga" ></td>
                    </tr>
                    <tr>
                        <td><p>Kategori</p></td>
                        <td><select name="nama_kategori" id="nama_kategori" class="form-select" placeholder="pilih kategori">  
                            <option value="Food">Food</option>
                            <option value="Drink">Drink</option>
                            <option value="Accessories">Accessories</option>
                            <option value="Fashion">Fashion</option>
                        </select><br><br></td>
                    </td>
                    </tr>
                    <tr>
                        <td><p>Foto barang</p></td>
                        <td><input type="file" class="form-control textinput" name="fotobarang" id="fotobarang" >
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" class="btn btn-primary" name="submit">
                        <a href="seller-listproduct.php" class="btn btn-danger">Cancel</a></td>
                    </tr>
                </table>
            </form>
    </section>

</body>

</html>