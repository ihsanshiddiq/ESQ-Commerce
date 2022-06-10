<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <title>List Barang</title>
  </head>

  <body>
  <h4 class="title">
    <span class="text">
    <strong>List Barang</strong>
    </span></h4>

      <a class="btn btn-primary" href="barang.php">Add</a>
      <table class="table table-bordered">
        <tr>
        <th>No.</th>
        <th>Kode</th>
        <th>Nama Barang</th>
        <th>Deskripsi</th>
        <th>Jumlah stok</th>
        <th>Harga</th>
        <th>Kategori</th>
        <th>Foto Barang</th>
        <th>Action</th>
        <!-- <th>Kategori</th>
        <th>Action</th> -->
        </tr>	
        <?php
            include 'inc.koneksi2.php';
            require_once('class/class.barang.php');		
            $objBarang = new Barang(); 
            $arrayResult = $objBarang->selectAllBarang();

            if(count($arrayResult) == 0){
                echo '<tr><td colspan="7">Tidak ada data!</td></tr>';
            } else{	
                $no = 1;	
                foreach ($arrayResult as $dataBarang) {
                  echo '<tr>';
                  echo '<td>'.$no.'</td>';	
                  echo '<td>'.$dataBarang->id.'</td>';	
                  echo '<td>'.$dataBarang->namaBarang.'</td>';
                  echo '<td>'.$dataBarang->deskripsi.'</td>';
                  echo '<td>'.$dataBarang->jumlahStok.'</td>';
                  echo '<td>'.$dataBarang->harga.'</td>';
                  echo '<td>'.$dataBarang->nama_kategori.'</td>';
                  echo "<td><img src='../assets/produk/".$dataBarang->fotoBarang."' width='100px' height='100px'/></td>";
                  echo '<td>
                        <a href="barangupdate.php?updateid='.$dataBarang->id.'" class="btn btn-warning" role="button">Update</a>
                        <a class="btn btn-danger"  href="barangdelete.php?deleteid='.$dataBarang->id.'" 
                        onclick="return confirm(\'Apakah anda yakin ingin menghapus?\')">Delete</a></td>';
                  echo '</tr>';	
                    
                        // <a class="btn btn-warning"  href="">Update</a> |
                        // <a class="btn btn-danger" href="listbarang.php?p=deletebarang&id='.$dataBarang->deleteBarang().'" 
                        // onclick="return confirm(\'Apakah anda yakin ingin menghapus?\')"> Delete </a> </td>';	
                    //$no++;	
                    $no++;
                    
                }
            }
        ?>

      </table>

  </body>
</html>