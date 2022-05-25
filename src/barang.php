<?php

if (isset($_POST['add'])) {
    include 'inc.koneksi.php';

    require_once('./init.class.php');
    $objBarang = new Barang();

    $objBarang->kodeBarang = $_POST['kodeBarang'];	 
	$objBarang->namaBarang = $_POST['namaBarang'];	
	$objBarang->deskripsi = $_POST['deskripsi'];	
	$objBarang->jumlahStok = $_POST['jumlahStok'];	
	$objBarang->harga = $_POST['harga'];	
    //$fotoBarang = $_FILES['fotoBarang']['name'];
    // $change = $_FILES['fotoBarang']['tmp_name'];
    

    if(isset($_GET['kodeBarang'])){		
		$objBarang->kodeBarang = $_GET['kodeBarang'];
		$objBarang->updateBarang();
	}
	// else{	
	// 	$objBarang->addBarang();
	// }			
	
	if($objBarang->result){
		echo '<script> window.location = "barang.php";</script>';
	}
}


    /*$objBarang->kodeBarang = stripslashes($_POST['kode_barang']);
    $objBarang->kodeBarang = mysqli_real_escape_string($objBarang->connection, $objBarang->kode_barang);
    $objBarang->namaBarang = stripslashes($_POST['nama_barang']);
    $objBarang->namaBarang = mysqli_real_escape_string($objBarang->connection, $objBarang->nama_barang);
    $objBarang->deskripsi = stripslashes($_POST['deskripsi']);
    $objBarang->deskripsi = mysqli_real_escape_string($objBarang->connection, $objBarang->deskripsi);
    $objBarang->jumlahStok = stripslashes($_POST['jumlah_stok']);
    $objBarang->jumlahStok = mysqli_real_escape_string($objBarang->connection, $objBarang->jumlah_stok);
    $objBarang->harga = stripslashes($_POST['harga_barang']);
    $objBarang->harga = mysqli_real_escape_string($objBarang->connection, $objBarang->harga_barang);
    $objBarang->noHp = stripslashes($_POST['no_hp']);
    $objBarang->noHp = mysqli_real_escape_string($objBarang->connection, $objBarang->noHp);
    $objBarang->kodePos = stripslashes($_POST['kode_pos']);
    $objBarang->kodePos = mysqli_real_escape_string($objBarang->connection, $objBarang->kodePos);
    $objBarang->jalan = stripslashes($_POST['alamat']);
    $objBarang->jalan = mysqli_real_escape_string($objBarang->connection, $objBarang->jalan);
     $objBarang->id_role = 2; */


    // if (!empty($objBarang->username) || !empty($objBarang->password) || !empty($objBarang->deskripsi) || !empty($objBarang->jumlahStok) || !empty($objBarang->email)|| !empty($objBarang->noHp)|| !empty($objBarang->jalan)|| !empty($objBarang->kodePos)|| !empty($objBarang->password) ) {


//       $objBarang->cek_akun($objBarang->username);
        // if ($objBarang->result === FALSE){                 

        //     //$objBarang->addBarang();

        //         if ($objBarang->result === TRUE) {
        //             echo "<script> alert('$objBarang->message'); </script>";
        //             echo "<script>window.location = 'listbarang.php';</script>";
                    

        //         } else {
        //             echo "<script> alert('$objBarang->message'); </script>";
                    

        //         }
                
        // } else {
        //     echo "<script> alert('Data sudah ada sebelumnya'); </script>";
        //     echo "<script>window.location = 'barang.php';</script>";
        // }

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
            margin-top: 50px;
        }
    </style>
    
  </head>
  <body>
    
  
  <form method= "post" action="barang.php" enctype="multipart/form-data">
  <div class="form">
  <div class="form-group">
        <label for="formGroupExampleInput">Kode Barang</label>
        <input type="text" class="form-control" id="kodeBarang" name="kodeBarang" placeholder="Kode Barang">
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput2">Nama Barang</label>
        <input type="text" class="form-control" id="namaBarang" name="namaBarang" placeholder="Nama Barang">
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput2">Deskripsi</label>
        <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi">
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput2">Jumlah Stok</label>
        <input type="text" class="form-control" id="jumlahStok" name="jumlahStok" placeholder="Jumlah Stok">
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput2">Harga</label>
        <input type="text" class="form-control" id="harga" name="harga" placeholder="Harga Barang">
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput2">Upload gambar</label>
        <input type="file" class="form-control" id="fotoBarang" name="fotoBarang" placeholder="Harga Barang"><br>
    </div>
    <div class="form-group">
        <button class="btn btn-primary" name="add" type="Submit">Tambah</button>
        <button class="btn btn-danger" type="batal">Batal</button>
    </div>
  </div>
    
</form>

</html>