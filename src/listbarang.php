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
  <div class="container" style="margin-top: 80px">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              LIST BARANG 
            </div>
            <div class="card-body">
              <a href="barang.php" class="btn btn-md btn-success" style="margin-bottom: 10px">TAMBAH DATA</a>
              <table class="table table-bordered" id="myTable">
                <thead>
                  <tr>
                    <th scope="col">Kode Barang</th>
                    <th scope="col">Foto Barang</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Jumlah Stok</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Foto Barang</th>
                    <th scope="col">id_kategori</th>
                    <th scope="col">id_penjual</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                    // require_once('./class/class.Barang.php'); 		
                    // $objBarang = new Employee(); 
                    // $arrayResult = $objBarang->SelectAllBarang();
                    
                    // if(count($arrayResult) == 0){
                    //     echo '<tr><td colspan="4">Tidak ada data!</td></tr>';			
                    // }else{	
                    //     $no = 1;	
                    //     foreach ($arrayResult as $dataBarang) {
                    //             // Disini proses nampilin barang
                    //         echo '</tr>';				
                    //         $no++;	
                    //     }
                    // }
                    ?>
                </tbody>
              </table>
            </div>
          </div>
      </div>
    </div>
  </body>
</html>