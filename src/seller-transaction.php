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
    <nav>
        <?php
            require 'navbar.php';
        ?>
    </nav>

      
      <!---->

      <section class="container-fluid my-5 py-5">
            <h4 class="title">
            <span class="text">
            <strong>Transaction List</strong>
            </span></h4>
            
            <table class="table table-bordered">
                <tr>
                <th>No.</th>
                <th>Item Name</th>
                <th>Seller</th>
                <th>Date</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Status</th>
                <th>Action</th>
                </tr>	


            <?php
            require_once('inc.koneksi.php');
            require_once('inc.koneksisql.php'); 		
            require_once('class/class.barang.php'); 
            require_once('class/class.transaksi.php');		
            $objtr = new Transaksi(); 
            //$objtr->$usernamepj = $_SESSION['username'];
            //$arrayResult = $objtr->SelectAllTransaksiPenjual();
            /*
            if(count($arrayResult) == 0){
                echo '<tr><td colspan="5">Tidak ada transaksi!</td></tr>';
            } else{	
                $no = 1;	
                foreach ($arrayResult as $dataTransaksi) {
                    echo '<tr> <form action="editbarang.php" method="GET">';
                    echo '<td>'.$no.'</td>';	
                    echo '<td>'.$dataBarang->namaBarang.'</td>';	
                    echo '<td>'.$dataBarang->username.'</td>';
                    echo '<td>'.$dataBarang->tanggal.'</td>';
                    echo '<td>'.$dataBarang->quantity.'</td>';
                    echo '<td>'.$dataBarang->total.'</td>';
                    echo '<td>'.$dataBarang->keterangan.'</td>';
                    //echo '<td>'.$dataBarang->.'</td>';
                    //echo '<td>'.$dataBarang->kodePos.'</td>';
                    
                    echo '<td>';
                    echo '<button type="submit" class="btn btn-warning" style="width: 40%;" name="edituser" value="'. $dataBarang->id .'"><b>Edit</b></button>'; 
                    echo ' | ';
                    echo '<button class="btn btn-danger" style="width: 40%;" name="deleteuser" value="'. $dataBarang->id .'" onclick="return confirm(\'Apakah anda yakin ingin menghapus?\')"> Del </button> </td>';
                    
                    echo '</form> </tr>';				
                    $no++;	
                }
            }*/
            ?>
            </table>
            <a class="btn btn-primary" href="seller-addproduct.php" target= "_Blank">Add Item</a>
            <a class="btn btn-primary" href="./includes/print-user.inc.php" target= "_Blank">cetak user</a>
      </section>

</body>

</html>