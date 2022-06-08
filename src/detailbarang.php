<?php
session_start();
/*
if (isset($_POST['openbarang'])) {

    require_once('../init.class.php');

    require_once('inc.koneksisql.php'); 
	require_once('class/class.barang.php');

    $objMenu = new Barang(); 		
    $kodeBarang1 = $_SESSION['kodebarang'];

	$arrayResult = $objMenu->selectOneBarang(0, '');
    echo "<h1>kode barang from session: " . $_SESSION['kodebarang'] . "'</h1>";
    //$objAkun = new Akun();
  /*
    $username = $_POST['username'];
    $password = $_POST['password'];
    $passwordRepeat = $_POST['password'];
    $namaDepan = $_POST['f_name'];
    $namaBelakang = $_POST['l_name'];
    $email = $_POST['email'];
    $noHp = $_POST['no_hp'];
    $kodePos = $_POST['kode_pos'];
  
    $jalan = $_POST['alamat'];
    $id_role = 'S';
  
    //unique trait/variable for seller
    $namaToko = $_POST['namaToko'];;
    $instagram = $_POST['instagram'];;
    $facebook = $_POST['facebook'];;
  
    //Register-Controller class. These classes below, including ORDER has to be like this and cannot be mixed up in the urutan.
    //include "inc.koneksi.php";
    include "../inc.koneksi.php";
    include "../class/register-obj.class.php";
    include "../class/registerseller-contr.php";
    $register = new registerSellerContr($username, $password, $passwordRepeat, $namaDepan, $namaBelakang, $email, $id_role, $noHp, $kodePos, $jalan, $namaToko, $instagram, $facebook);
  
    $register->registerSeller();
  
    //Balik ke Index
    header("location: ../index.php?error=none");
}
    */
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belt 2</title>

    <!-- CSS -->
    <link rel="stylesheet" href="../lib/css/style.css">
    <link rel="stylesheet" href="../lib/customskin.css">

    <!--CDN-->
    <?php
    require 'head-conf.html';
    ?>



</head>

<body>
    <!--HEADER-->
    <nav>
        <?php
        require 'navbar.php';
        ?>
    </nav>


    <!--CONTENT-->

    <div class="container" style="padding-top: 5rem; padding-bottom: 5rem;">
        <div class="row" style="margin-bottom: 10rem;">

            <div class="col-md-6">
                <img src="../assets/produk/belt1.png" alt="" class="img-fluid">
            </div>


            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        <h1 style="color: black">
                        <?php
                        //require_once('../init.class.php');

                        

                        if(isset($_GET['kodeBarang'])){	
                            require_once('inc.koneksisql.php'); 
                            require_once('class/class.barang.php');
                            //$objMenu = new Menu(); 
                            //$objMenu->id = $_GET['id'];	
                            //$objMenu->SelectOneMenu();
                            $objMenu = new Barang(); 		
                            $objMenu->kodeBarang = $_SESSION['kodebarang'];
                    
                            $arrayResult = $objMenu->selectOneBarangRedirect();
                            echo $arrayResult->namaBarang;
                        }

                            
                        ?>    
                        </h1>
                    </div>
                    <div class="col-md-10">
                        <p class="price">Rp. 100.000.-</p>

                    </div>
                    <div class="col-md-2">
                        <span class="material-icons-outlined">favorite_border</span>
                        <span class="material-icons-outlined">share</span>
                    </div>

                </div>
                <br>
                <br>
                <div class="row">
                    <h2>Deskripsi :</h2>
                    <br>
                    <p style="text-align: justify;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius,
                        laudantium magnam porro deserunt fuga esse sed molestiae ab nihil laboriosam.</p>
                    <p>xs : lenght 110cm <br>
                        s : lenght 120cm <br>
                        m : lenght 130cm
                    </p>

                </div>
                <br>
                <br>

                <div class="row">
                    <fieldset>
                        <legend>Size Cart</legend>
                        <input type="radio" name="size" id="size-xs" class="form-radio">
                        <label value="size-xs">xs</label>
                        <br>
                        <input type="radio" name="size" id="size-xs" class="form-radio">
                        <label value="size-s">s</label>
                        <br>
                        <input type="radio" name="size" id="size-xs" class="form-radio">
                        <label value="size-m">m</label>

                    </fieldset>
                </div>
                <br>
                <div class="row">
                    <button type="submit" value="check out" style="background-color: black; color: white;"> Add To Cart
                    </button>
                </div>

            </div>
        </div>

    </div>

        <!--Footer-->
        <footer>
            <?php
            require 'footer.html';
            ?>
        </footer>

</body>

</html>