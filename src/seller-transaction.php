<?php
session_start();
if (!(isset($_SESSION["username"]))) {
    header("location: index.php?error=unauthorizeduser");
} else {
    if (!($_SESSION["id_role"] == "3" OR $_SESSION["id_role"] == "S")) {
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
    
        <?php
            require 'navbar.php';
        ?>
    

    <div class="row py-5 my-5">
        <div class="col-md-4 px-5" styel="color: black;">

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

            <a href="seller-transaction.php">
                <h2>Transactions</h2>
            </a>
            <br>

            <a href="#">
                <h2>Access Data</h2>
            </a>
            <br>

            <a href="#">
                <h3 style="color: rgb(213, 5, 5);">logout</h3>
            </a>
        </div>
      
      <!---->

      <section class="col-md-8 px-5">
            <h4 class="title">
            <span class="text">
            <strong>Transaction List</strong>
            </span></h4>
            
            <table class="table table-bordered">
                <tr>
                <th>No.</th>
                <th>Buyer</th>
                <th>Date</th>
                <th>Item</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Status</th>
                <th>Action</th>
                </tr>	


            <?php
            require_once('inc.koneksisql.php'); 		
            require_once('inc.koneksi.php'); 		
            require_once('class/class.barang.php'); 		
            require_once('class/class.transaksi.php'); 		
            $objtr = new Transaksi(); 
            $objtr->usernamepj = $_SESSION['username'];
            $arrayResult = $objtr->SelectAllTransaksiPenjual();

            if(count($arrayResult) == 0){
                echo '<tr><td colspan="5">Tidak ada data!</td></tr>';
            } else{	
                $no = 1;	
                foreach ($arrayResult as $dataTransaksi) {
                    echo '<tr> <form action="includes/seller-editstatusbarang.inc.php" method="POST">';
                    echo '<td>'.$no.'</td>';	
                    echo '<td>'.$dataTransaksi->pembeli.'</td>';	
                    echo '<td>'.$dataTransaksi->tanggal.'</td>';
                    echo '<td>'.$dataTransaksi->namaBarang.'</td>';
                    echo '<td>'.$dataTransaksi->quantity.'</td>';
                    echo '<td>'.$dataTransaksi->total.'</td>';
                    echo '<td>'.$dataTransaksi->keterangan.'</td>';
                    //echo '<td>'.$dataBarang->.'</td>';
                    //echo '<td>'.$dataBarang->kodePos.'</td>';
                    
                    echo '<td>';

                    if($dataTransaksi->id_status == 1){
                    echo '<button type="submit" class="btn btn-warning"  name="diproses" value="'. $dataTransaksi->id .'"><b>Proses'. $dataTransaksi->id .'</b></button>'; 
                    echo ' | ';
                    echo '<button class="btn btn-danger" name="ditolak" value="'. $dataTransaksi->id .'" onclick="return confirm(\'Apakah anda yakin ingin menghapus?\')"> Tolak </button> </td>';
                    //echo 'val btn diproses: ' . $_POST['diproses'];
                    } else

                    if($dataTransaksi->id_status == 2){
                    echo '<button type="submit" class="btn btn-warning" name="dikirimkan" value="'. $dataTransaksi->id .'"><b>Dikirim</b></button>'; 
                    } else

                    if($dataTransaksi->id_status == 3){
                    //echo '<button type="submit" class="btn btn-success" style="width: 40%;" name="selesai" value="'. $dataTransaksi->id .'"><b>Selesai</b></button>'; 
                    echo 'Ditolak.';
                    //echo '<button class="btn btn-primary" style="width: 40%;" name="tenggelam" value="'. $dataTransaksi->id .'" onclick="return confirm(\'Apakah anda yakin ingin menghapus?\')"> ;-; </button> </td>';
                    } else 
                    
                    if($dataTransaksi->id_status == 4){
                        echo '<button type="submit" class="btn btn-success"  name="selesai" value="'. $dataTransaksi->id .'"><b>Selesai</b></button>'; 
                    } else{

                    }
                    
                    echo '</form> </tr>';				
                    $no++;	
                }
            }
            ?>
            </table>
            <a class="btn btn-primary" href="seller-addproduct.php" target= "_Blank">Add Item</a>
            <a class="btn btn-primary" href="./includes/print-user.inc.php" target= "_Blank">cetak user</a>
      </section>

</body>

</html>