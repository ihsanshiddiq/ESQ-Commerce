<?php
session_start();
if (!(isset($_SESSION["username"]))) {
    header("location: index.php?error=unauthorizeduser");
} else {
    if (!($_SESSION["id_role"] == "S" OR $_SESSION["id_role"]==3)) {
        header("location: index.php?error=unauthorizeduser");
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
                        <td>Item Name : <?php //echo $objBarang->namaBarang; ?></td>
                        <td>|</td>
                        <td><p>New Item Name</p></td>
                        <td><input type="text" class="form-control textinput" name="namabarang" id="namabarang" ></td>
                    </tr>
                    <tr>
                        <td>Stock : <?php //echo $objBarang->jumlahStok; ?></td>
                        <td>|</td>
                        <td><p>New Stock</p></td>
                        <td><input type="text" class="form-control textinput" name="jumlahstok" id="jumlahstok" ></td>
                    </tr>
                    <tr>
                        <td>Category : <?php //echo $objBarang->nama_Kategori; ?></td>
                        <td>|</td>
                        <td><p>Chose Category</p></td>
                        <td><input type="email" class="form-control textinput" name="namakategori" id="namakategori" ></td>
                    </tr>
                    <tr>
                        <td>Price : <?php //echo $objBarang->harga; ?></td>
                        <td>|</td>
                        <td><p>New Price</p></td>
                        <td><input type="number" class="form-control nohp textinput" name="harga" id="harga" ></td>
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