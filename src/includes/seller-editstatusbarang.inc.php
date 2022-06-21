<?php
session_start();

require_once('../inc.koneksisql.php'); 		
require_once('../inc.koneksi.php'); 		
require_once('../class/class.barang.php'); 		
require_once('../class/class.transaksi.php'); 

$objtr = new Transaksi(); 
$objtr->usernamepj = $_SESSION['username'];


if (isset($_POST['diproses'])) {
    $objtr->id = $_POST['diproses'];
    $arrayResult = $objtr->SelectOneTransaksiPDO();
    $arrayResult->id_status = 2;
    $arrayResult->UpdateTransaksiStatusPDO();
    $objtr->sendNotif($arrayResult->id);
    //header("../location: seller-transaction.php?statusupdated");
    echo "<script>alert('Status updated successfully'); window.location.href = '../seller-transaction.php?error';</script>";
    echo 'lol';
    exit();
}

if (isset($_POST['ditolak'])) {
    $objtr->id = $_POST['ditolak'];
    $arrayResult = $objtr->SelectOneTransaksiPDO();
    $arrayResult->id_status = 3;
    $arrayResult->UpdateTransaksiStatusPDO();
    $objtr->sendNotif($arrayResult->id);
    //header("../location: seller-transaction.php?statusupdated");
    echo "<script>alert('Status updated successfully'); window.location.href = '../seller-transaction.php?error';</script>";
    exit();
}
if (isset($_POST['dikirimkan'])) {
    $objtr->id = $_POST['dikirimkan'];
    $arrayResult = $objtr->SelectOneTransaksiPDO();
    $arrayResult->id_status = 4;
    $arrayResult->UpdateTransaksiStatusPDO();
    $objtr->sendNotif($arrayResult->id);
    //header("location: ../seller-transaction.php?statusupdated");
    echo "<script>alert('Status updated successfully'); window.location.href = '../seller-transaction.php?error';</script>";
    exit();
}

if (isset($_POST['selesai'])) {
    $objtr->id = $_POST['selesai'];
    $arrayResult = $objtr->SelectOneTransaksiPDO();
    $arrayResult->id_status = 5;
    $arrayResult->UpdateTransaksiStatusPDO();
    $objtr->sendNotif($arrayResult->id);
    header("location: ../seller-transaction.php?statusupdated");
    echo "<script>alert('Status updated successfully'); window.location.href = '../seller-transaction.php?error';</script>";
    exit();
}

if (isset($_POST['tenggelam'])) {
    $objtr->id = $_POST['tenggelam'];
    $arrayResult = $objtr->SelectOneTransaksiPDO();
    $arrayResult->id_status = 6;
    $arrayResult->UpdateTransaksiStatusPDO();
    $objtr->sendNotif($arrayResult->id);
    //header("../location: seller-transaction.php?statusupdated");
    echo "<script>alert('Status updated successfully'); window.location.href = '../seller-transaction.php?error';</script>";
    exit();
}

echo "<script>alert('Error, something went wrong...'); window.location.href = '../seller-transaction.php?error';</script>";

?>