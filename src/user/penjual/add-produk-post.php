<?php
    $tipe_file = $_FILES['fupload']['type'];
    $lokasi_file = $_FILES['fupload']['tmp_name'];
    $nama_file = $_FILES['fupload']['name'];
    $ukuran_file = $_FILES['fupload']['size'];
    $folder = './this_img/';

    if ($tipe_file != "image/gif" AND $tipe_file != "image/jpeg" AND $tipe_file != "image/png") {
        
        echo "<script>alert('Hanya dapat mengupload gambar. silahkan pilih file yang lain');</script>";
        echo "<script>window.location = 'upload_img.php';</script>";
    } else {
        $isSuccessUpload = move_uploaded_file($lokasi_file, $folder.$nama_file);
        if ($isSuccessUpload) {
            echo
             "Nama File : $nama_file sukses diupload<br>";
             echo "Ukuran File : $ukuran_file bytes";
        }
        
    }
    
     
?>