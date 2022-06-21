<?php
session_start();
if (!isset($_SESSION['username'])){
    header("location: index.php?error=notloggedin");
} else {
    if (!($_SESSION["id_role"] == "B" OR $_SESSION["id_role"]==2)) {
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

            <a href="my.php">
                <h2>My Account</h2>
            </a>
            <br>

            <a href="listtransaction.php">
                <h2>Transaction History</h2>
            </a>
            <br>

            <!--
            <a href="address.php">
                <h2>Address Book</h2>
            </a>
            <br>
    -->

            <a href="info.php">
                <h2>Personal Info</h2>
            </a>
            <br>
            
            <!--
            <a href="wishlist. php">
                <h2>Wishlist</h2>
            </a>
            -->
            <br>
            <a href="#">
                <h3 style="color: rgb(213, 5, 5);">logout</h3>
            </a>
        </div>

        <!--Panel Kanan-->
        <div class="col-md-8 px-5">

        <h4 class="title">
            <span class="text">
            <strong>My Purchases</strong>
            </span></h4>
            
            <table class="table table-bordered">
                <tr>
                <th>No.</th>
                <th>Item Name</th>
                <th>Date</th>
                <th>Shop</th>
                <th>Quantity</th>
                <th>Subtotal</th>
                <th>Status</th>
                <!--<th>Action</th>-->
                </tr>	


            <?php
            require_once('inc.koneksisql.php'); 		
            require_once('inc.koneksi.php'); 		
            require_once('class/class.barang.php'); 		
            require_once('class/class.Transaksi.php'); 		
            $objtr = new Transaksi(); 
            $objtr->usernamepb = $_SESSION['username'];
            $arrayResult = $objtr->SelectAllTransaksiPembeli();

            if(count($arrayResult) == 0){
                echo '<tr><td colspan="5">Tidak ada data!</td></tr>';
            } else{	
                $no = 1;	
                foreach ($arrayResult as $dataTransaksi) {
                    echo '<tr> <form action="editbarang.php" method="GET">';
                    echo '<td>'.$no.'</td>';	
                    echo '<td>'.$dataTransaksi->namaBarang.'</td>';	
                    echo '<td>'.$dataTransaksi->tanggal.'</td>';
                    echo '<td>'.$dataTransaksi->namaToko.'</td>';
                    echo '<td>'.$dataTransaksi->quantity.'</td>';
                    echo '<td>'.$dataTransaksi->total.'</td>';
                    echo '<td>'.$dataTransaksi->keterangan.'</td>';
                    //echo '<td>'.$dataBarang->.'</td>';
                    //echo '<td>'.$dataBarang->kodePos.'</td>';
                    
                   // echo '<td>';
                    //echo '<button type="submit" class="btn btn-warning" style="width: 40%;" name="edituser" value="'. $dataTransaksi->id .'"><b>Edit</b></button>'; 
                   // echo ' | ';
                    //echo '<button class="btn btn-danger" style="width: 40%;" name="deleteuser" value="'. $dataTransaksi->id .'" onclick="return confirm(\'Apakah anda yakin ingin menghapus?\')"> Del </button> </td>';
                    
                    echo '</form> </tr>';				
                    $no++;	
                }
            }
            ?>
            </table>
            
            
    </div>




</body>

</html>