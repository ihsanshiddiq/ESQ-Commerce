<?php
session_start();
if (!isset($_SESSION['username'])){
    header("location: index.php?error=notloggedin");
    exit();
}

    require_once 'inc.koneksi.php';
    //require_once '../../inc.koneksisql.php';
    require_once 'class/class.akun.php';


    $objAkun= new Akun(); 		
    $objAkun->username = $_SESSION['username'];

    $arrayResult = $objAkun->SelectOneAkunPDO($_SESSION['username']);

    //echo $arrayResult->username;          //dah jalan
    /*
    if (isset($_SESSION['message'])){
        echo $_SESSION['message'];
    }
    */
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account</title>

    <!-- CSS -->
    <link rel="stylesheet" href="../lib/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!--ICON-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <!--FONT-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;500&display=swap" rel="stylesheet">

    <!--JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

    <!--Custom CSS-->
    <style>
        h2 {
            font-size: 20px;
            font-weight: 400;
        }

        p {
            font-size: 15px;
            font-weight: 400;
        }
    </style>
</head>

<body>

    <?php
        require 'navbar.php'; 
    ?>

    <!--Panel Kiri-->

    <div class="row py-5 my-5">
        <div class="col-md-4 px-5" styel="color: black;">

        <?php
        if ($_SESSION['id_role'] == 'B' OR $_SESSION['id_role'] == '2'){
        ?>
            <a href="#">
                <h2>My Account</h2>
            </a>
            <br>

            <a href="transactions.php">
                <h2>Transaction History</h2>
            </a>
            <br>

            <!--
            <a href="address.php">
                <h2>Address Book</h2>
            </a>
        -->
            <br>

            <a href="info.php">
                <h2>Personal Info</h2>
            </a>
            <br>
            <a href="accessdata.php">
                <h2>Access Data</h2>
            </a>
            <br>
            
            <br>
            <a href="#">
                <h3 style="color: rgb(213, 5, 5);">logout</h3>
            </a>

            <?php
            } else if($_SESSION['id_role'] == 'S' OR $_SESSION['id_role'] == '3') {
            ?>
             <a href="myshop.php">
                <h2>My Shop Account</h2>
            </a>
            <br>

            <a href="info.php">
                <h2>Personal Info</h2>
            </a>
            <br>

            <a href="seller-listproduct.php">
                <h2>List Product</h2>
            </a>
            <br>

            
            <br>

            <a href="#">
                <h3 style="color: rgb(213, 5, 5);">logout</h3>
            </a>
            <?php
            }
            ?>

        </div>

        <!--Panel Kanan-->
        <div class="col-md-8 px-5">

        <div class="row">                  
                <div class="col-md-6">
                    <div class="form-group">
                        <p type="text" class="form-control name" id="name">
                            <?php 
                                echo  'Username: ' . $arrayResult->username;
                            ?>
                        </p><br>
                    </div>
                    <div class="form-group">
                    <p type="text" class="form-control name" id="name">
                            <?php 
                                echo  'Email: ' . $arrayResult->email;
                            ?>
                        </p><br>
                    </div>
                    <div class="form-group">
                        <p type="text" class="form-control name" id="name">
                            <?php 
                                echo  'Nomor HP: ' . $arrayResult->noHp;
                            ?>
                        </p><br>
                    </div>
                    <div class="form-group">
                        <p type="text" class="form-control name" id="name">
                            <?php 
                                echo  'Alamat: ' . $arrayResult->jalan;
                            ?>
                        </p><br>
                    </div>
                    <div class="form-group">
                        <!--<input type="text" class="form-control instagram textinput" id="instagram"
                            placeholder="instagram"><br>-->
                    </div>

                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <p type="text" class="form-control name" id="name">
                            <?php 
                                echo  'Nama Depan: ' . $arrayResult->namaDepan;
                            ?>
                        </p><br>
                    </div>
                    <div class="form-group">
                        <p type="text" class="form-control name" id="name">
                            <?php 
                                echo  'Nama Belakang: ' . $arrayResult->namaBelakang;
                            ?>
                        </p><br>
                    </div>
                    <div class="form-group">
                        <p type="text" class="form-control name" id="name">
                            <?php 
                                echo  'Kode Pos: ' . $arrayResult->kodePos;
                            ?>
                        </p><br>
                    </div>



                </div>
            </div>

        <!-- DIVIDER BETWEEN DATA AND UPDATE FORM-->

        <form action="includes/updateprofile.inc.php" method="post">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control nameDepan textinput" id="name" name="newnamadepan" placeholder="Nama Depan Baru"><br>
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control nohpbaru textinput" id="nohpbaru" name="newnohp"
                            placeholder="Nomor HP Baru"><br>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control email textinput" id="alamat" name="newjalan" placeholder="Alamat Baru"><br>
                    </div>
                    <div class="form-group">
                        <!--<input type="text" class="form-control instagram textinput" id="instagram"
                            placeholder="instagram"><br>-->
                    </div>

                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control textinput" id="password" name="newnamabelakang"
                            placeholder="Nama Belakang Baru"><br>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control profesi textinput" id="kodePos" name="newkodepos"
                            placeholder="Kode Pos Baru"><br>
                    </div>

                    <!--
                    <div class="form-group">
                        <input type="text" class="form-control phone textinput" id="phone"
                            placeholder="Phone Number"><br>
                    </div>
                    -->



                </div>
            </div>
            <div class="row">
                <div class="col-md-6">

                    <div class="form-group">
                        <button type="submit" class="btn btnblack" name="updateakun"
                            style="color: #ffffff; background-color: black; width: 100%;"><b>EDIT PERSONAL
                                INFO</b></button>
                    </div>
                </div>
            </div>
        </form>
    </div>




</body>

</html>

<?php
/*
if(isset($_POST['updateakun'])){

    $newnamadepan = $_POST['newnamadepan'];
    $newnamabelakang = $_POST['newnamabelakang'];
    $newnohp = $_POST['newnohp'];
    $newjalan = $_POST['newjalan'];
    $newkodepos = $_POST['newkodepos'];


    if(empty($_POST['newnamadepan']) OR empty($_POST['newnamabelakang']) OR empty($_POST['newjalan']) OR empty($_POST['newkodepos'])){
        
        echo '<script>alert("Mohon isi semua form data");</script>';
        
    } else{

    $arrayResult->namaDepan = $_POST['newnamadepan'];
    $arrayResult->namaBelakang = $_POST['newnamabelakang'];
    $arrayResult->noHp = $_POST['newnohp'];
    $arrayResult->jalan = $_POST['newjalan'];
    $arrayResult->kodePos = $_POST['newkodepos'];


    $arrayResult->UpdateAccountPDO();
    
    //header("Refresh:0");
    }    
    
}
*/

?>
