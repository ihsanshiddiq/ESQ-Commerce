<?php

    require_once( 'inc.koneksi2.php');
    require_once('./init.class.php');
    $objBarang = new Barang();
    $id = $_REQUEST['id'];
    $row = $Barang->editBarang($id);

    if (isset($_POST['update'])) {
        if (null!=(['id']) && isset($_POST['namaBarang']) && isset($_POST['deskripsi'])
            && isset($_POST['jumlahStok']) && isset($_POST['harga']) && isset($_POST['nama_kategori'])
            && isset($_POST['fotoBaraang'])) {
        if (!empty(['id']) && !empty($_POST['namaBarang']) && !empty($_POST['deskripsi'])
            && !empty($_POST['jumlahStok']) && !empty($_POST['harga']) && !empty($_POST['nama_kategori'])
            && !empty($_POST['fotoBaraang'])){

                $dataBarang['id'] = $id;
                $dataBarang['namaBarang'] = $_POST['namaBarang'];
                $dataBarang['deskripsi'] = $_POST['deskripsi'];
                $dataBarang['jumlahStok'] = $_POST['jumlahStok'];
                $dataBarang['harga'] = $_POST['harga'];
                $dataBarang['nama_kategori'] = $_POST['nama_kategori'];
                $dataBarang['fotoBarang'] = $_POST['fotoBarang'];

                $update = $Barang->updateBarang($dataBarang);


            if($update){
              echo "<script>alert('record update successfully');</script>";
              echo "<script>window.location.href = 'listbarang.php';</script>";
            }else{
              echo "<script>alert('record update failed');</script>";
              echo "<script>window.location.href = 'listbaarang.php';</script>";
            }

          }else{
            echo "<script>alert('empty');</script>";
            header("Location: edit.php?id=$id");
          }
        }
      }

        
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        .form{
            width: 80%;
            margin: auto;
            margin-top: 30px;
        }
        .form-select{
            width: auto;
            margin: auto;

        }
    </style>
    
  </head>
  <body>
    
  
  <form method= "post" action="" enctype="multipart/form-data">
  <div class="form">
  <div class="form-group">
        <label for="formGroupExampleInput">Kode Barang</label>
        <input type="text" class="form-control" id="id" name="id" value="<?php echo $row['id']; ?>" placeholder="Kode Barang" >
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput2">Nama Barang</label>
        <input type="text" class="form-control" id="namaBarang" name="namaBarang" value="<?php echo $row['namaBarang']; ?>" placeholder="Nama Barang">
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput2">Deskripsi</label>
        <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="<?php echo $row['deskripsi']; ?>" placeholder="Deskripsi">
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput2">Jumlah Stok</label>
        <input type="text" class="form-control" id="jumlahStok" name="jumlahStok" value="<?php echo $row['jumlahStok']; ?>" placeholder="Jumlah Stok">
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput2">Harga</label>
        <input type="text" class="form-control" id="harga" name="harga" value="<?php echo $row['harga']; ?>" placeholder="Harga Barang">
    </div>
    <div>
        <select name="nama_kategori" id="nama_kategori" class="form-select form-select-sm" aria-label=".form-select-sm example">  
        <option selected value="<?php echo $row['nama_kategori']; ?>">Pilih Kategori</option>
        <option value="Food">Food</option>
        <option value="Drink">Drink</option>
        <option value="Accessories">Accessories</option>
        <option value="Fashion">Fashion</option>

    </select><br><br>
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput2">Upload gambar</label>
        <input type="file" class="form-control" id="fotoBarang" name="fotoBarang" value="<?php echo $row['fotoBarang']; ?>" placeholder="Harga Barang">
    </div>
    <div class="form-group">
        <button class="btn btn-primary" name="update" value="update" type="Submit">Update</button>
        <button class="btn btn-danger" type="batal">Batal</button>
    </div>
  </div>
    
</form>

</html>