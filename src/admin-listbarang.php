<?php
session_start();
if (!(isset($_SESSION["username"]))) {
    header("location: index.php?error=unauthorizeduser");
} else {
    if (!($_SESSION["id_role"] == "1" OR $_SESSION["id_role"] == "A")) {
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

      <section class="col-md px-5 my-5 py-3">
            <h4 class="title">
            <span class="text">
            <strong>My Shop Item List</strong>
            </span></h4>
            
            <table class="table table-bordered">
                <tr>
                <th>No.</th>
                <th>Item Name</th>
                <th>Seller</th>
                <th>Stock</th>
                <th>Total Sold</th>
                <th>Item Photo</th>
                <th>Category</th>
                <th>Price</th>
                <th>Action</th>
                </tr>	


            <?php
            require_once('inc.koneksisql.php'); 		
            require_once('class/class.barang.php'); 		
            $objitem = new Barang(); 
            $arrayResult = $objitem->SelectAllBarang();

            if(count($arrayResult) == 0){
                echo '<tr><td colspan="5">Tidak ada data!</td></tr>';
            } else{	
                $no = 1;	
                foreach ($arrayResult as $dataBarang) {
                    echo '<tr> <form action="editbarang.php" method="GET">';
                    echo '<td>'.$no.'</td>';	
                    echo '<td>'.$dataBarang->namaBarang.'</td>';	
                    echo '<td>'.$dataBarang->id_penjual.'</td>';	
                    echo '<td>'.$dataBarang->jumlahStok.'</td>';
                    echo '<td>'.$dataBarang->jumlahTerjual.'</td>';
                    echo '<td>'.$dataBarang->fotoBarang.'</td>';
                    echo '<td>'.$dataBarang->nama_kategori.'</td>';
                    echo '<td>'.$dataBarang->harga.'</td>';
                    //echo '<td>'.$dataBarang->.'</td>';
                    //echo '<td>'.$dataBarang->kodePos.'</td>';
                    
                    echo '<td>';
                    echo '<button type="submit" class="btn btn-warning" style="width: 40%;" name="edituser" value="'. $dataBarang->id .'"><b>Edit</b></button>'; 
                    echo ' | ';
                    echo '<button class="btn btn-danger" style="width: 40%;" name="deleteuser" value="'. $dataBarang->id .'" onclick="return confirm(\'Apakah anda yakin ingin menghapus?\')"> Del </button> </td>';
                    
                    echo '</form> </tr>';				
                    $no++;	
                }
            }
            ?>
            </table>
            <!--<a class="btn btn-primary" href="seller-addproduct.php">Add Item</a>-->
            <a class="btn btn-primary" href="./includes/print-reportUser.inc.php" target= "_Blank">Cetak Penjualan</a>
      </section>

</body>

</html>