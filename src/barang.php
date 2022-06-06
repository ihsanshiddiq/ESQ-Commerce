<?php

// include '../init.class.php';
//     $objBarang = new Barang();
    if(isset($_POST['submit'])){
        require_once( 'inc.koneksi.php');
        require_once('./init.class.php');
        $objBarang = new Barang();
        $objBarang->kodeBarang = $_POST['kodeBarang'];
        $objBarang->namaBarang = $_POST['namaBarang'];
        $objBarang->deskripsi = $_POST['deskripsi'];
        $objBarang->jumlahStok = $_POST['jumlahStok'];
        $objBarang->harga = $_POST['harga'];
        //$objBarang->nama_kategori = $_POST['nama_kategori'];

        if(isset($_GET['kodeBarang'])){
            $objBarang->kodeBarang = $_GET['kodeBarang'];
            $objBarang->updateBarang();
        }else{
            $objBarang->addBarang();
        }

        if(!$objBarang->result){
            echo"<script> alert('Proses gagal!'); </script>";
        }

        // get ready to upload image
        $folder = '../assets/produk/';
        $file_type = array('jpg','jpeg', 'png', 'gif', 'bmp');
        $max_size = 2000000;
        $isErrorFile =false;
        $isSuccessUpload = true;

        if(!empty($_FILES['fotoBarang']['name'])){
            $file_name  = $_FILES['fotoBarang']['name'];
            $file_size  = $_FILES['fotoBarang']['size'];
            // Find out the file extension using "explode" function
            $explode    = explode('.', $file_name);
            $extensi    = $explode[count($explode)-1];

            // check if the file type is correct
            if(!in_array($extensi, $file_type)){
                $isErrorFile = true;
                $message .= 'Tipe file yang anda upload tidak sesuai';
            }
            if($file_size>$max_size){
                $isErrorFile = true;
                $message .= 'Ukuran file melebihi batas maximum';
            }

            if($isErrorFile){
                echo "<script> alert('$message'):</script>";
            }
            else{
                $objBarang->fotoBarang = $objBarang->kodeBarang.'.'.$extensi;
                $isSuccessUpload = move_uploaded_file($_FILES['fotoBarang']['tmp_name'], $folder.$objBarang->fotoBarang);

                if(!$isSuccessUpload){
                    echo "<script> alert('Upload error');</script>";
                    die();
                }
            }
        }
        if($isSuccessUpload){					 
            $objBarang->updateFoto();
            if($objBarang->result){			
                echo "<script> alert('$objBarang->message'); </script>";
                echo "$objBarang->fotoBarang";
                echo "$objBarang->kodeBarang";
                echo '<META HTTP-EQUIV="Refresh" Content="0; URL=listbarang.php">'; 	
        
            }
            else
                echo "<script> alert('$objBarang->message'); </script>";			
        }
        else
            echo "<script> alert('Proses upload gagal. Silakan ulangi'); </script>";

        /*if(isset($_GET['kodeBarang'])){
            //$objBarang->kodeBarang = $_GET['kodeBarang'];
            $objBarang->updateBarang();
            echo "<script> alert('Barang berhasil di update');</script>";
        }
        else{
            $objBarang->addBarang();
            echo "$objBarang->fotoBarang";
            echo "$objBarang->kodeBarang";
            echo "$objBarang->namaBarang";
            echo "$objBarang->deskripsi";
            echo "$objBarang->jumlahStok";
            echo "$objBarang->harga";
            echo "<script> alert('Barang berhasil ditambahkan');</script>";
            echo "<script> alert('window.location='listbarang.php)';</script>";
        }

        if($objBarang->result){
            echo "<script> alert('".$objBarang->message."');</script>";
            
        }
        else{
            "<script> alert('Proses gagal. Silahkan ulangi!'):</script>";
        }*/

    }
    elseif(isset($_GET['kodeBarang'])){
        $objBarang->kodeBarang = $_GET['kodeBarang'];
        $objBarang->selectOneBarang();
    }
    
    //Making automatic code for 
        
        /*$auto = mysqli_query("SELECT MAX(kodeBarang) AS max_code FROM tblbarang");
        $data = mysqli_fetch_array($auto);
        $code = $data['max_code'];
        $urutan = (int)substr($code, 1, 3);
        $urutan++;
        $huruf = 'b';
        $auto_code = $huruf . sprintf("%03s", $urutan);*/

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
    
  
  <form method= "post" action="barang.php" enctype="multipart/form-data">
  <div class="form">
  <div class="form-group">
        <label for="formGroupExampleInput">Kode Barang</label>
        <input type="text" class="form-control" id="kodeBarang" name="kodeBarang" value="" placeholder="Nama Barang" >
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
    <div>
        <select name="nama_kategori" id="nama_kategori" class="form-select form-select-sm" aria-label=".form-select-sm example">  
        <option selected>Pilih Kategori</option>
        <option value="Food">Food</option>
        <option value="Drink">Drink</option>
        <option value="Accessories">Accessories</option>
        <option value="Fashion">Fashion</option>

        <?php
                // Here, for PHP code to display categories from database
                // 1. Create SQL to get all categories from database
            ?>
    </select><br><br>
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput2">Upload gambar</label>
        <input type="file" class="form-control" id="fotoBarang" name="fotoBarang" placeholder="Harga Barang">
    </div>
    <div class="form-group">
        <button class="btn btn-primary" name="submit" value="add Food" type="Submit">Tambah</button>
        <button class="btn btn-danger" type="batal">Batal</button>
    </div>
  </div>
    
</form>

</html>