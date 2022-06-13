<?php
if(isset($_POST['updateakun'])){
    session_start();

    require_once '../inc.koneksi.php';
    require_once '../class/class.akun.php';

    $objAkun= new Akun(); 		
    $objAkun->username = $_SESSION['username'];

    $arrayResult = $objAkun->SelectOneAkunPDO($_SESSION['username']);

    $newnamadepan = $_POST['newnamadepan'];
    $newnamabelakang = $_POST['newnamabelakang'];
    $newnohp = $_POST['newnohp'];
    $newjalan = $_POST['newjalan'];
    $newkodepos = $_POST['newkodepos'];


    if(empty($_POST['newnamadepan']) OR empty($_POST['newnamabelakang']) OR empty($_POST['newjalan']) OR empty($_POST['newkodepos'])){
        
        $_SESSION['message'] = "Mohon isi semua form data";
        header("location: ../user/pembeli/info.php?emptyinput");
        echo '<script>alert("Mohon isi semua form data");</script>';

    } else{

    $arrayResult->namaDepan = $_POST['newnamadepan'];
    $arrayResult->namaBelakang = $_POST['newnamabelakang'];
    $arrayResult->noHp = $_POST['newnohp'];
    $arrayResult->jalan = $_POST['newjalan'];
    $arrayResult->kodePos = $_POST['newkodepos'];


    $arrayResult->UpdateAccountPDO();

    header("../info.php");
    
    //header("Refresh:0");
    }    

}
?>