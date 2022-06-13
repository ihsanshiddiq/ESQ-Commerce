<?php
session_start();
if(isset($_GET['buynow']) AND isset($_SESSION['username'])){
    //echo $_GET['buynow'];

    require_once '../inc.koneksi.php';
    require_once '../inc.koneksisql.php';
    require_once '../class/class.barang.php';
    require_once '../class/class.transaksi.php';

    $barang = new Barang();
    $barang->id = $_GET['buynow'];
    //$barang->selectOneBarangParam($_GET['buynow']);
    $barResult = $barang->selectOneBarangParam($_GET['buynow']);

    $newtr = new Transaksi();
    $newtr->id_barang = $_GET['buynow'];
    $newtr->pembeli = $_SESSION['username'];
    $newtr->penjual = "testament";
    $newtr->price = $barResult->harga;
    $newtr->quantity = 1;
    $today = date("h:i:s Y/m/d");
    //$trday = date_format($today, "Y-m-d");
    $trday = date('Y-m-d H:i:s', strtotime($today));
    //$date1 = date_format($taskcompdate, "Y-m-d");
    //$date2 = date('Y-m-d H:i:s', strtotime($datenow));
    $newtr->today = $trday;
    

    $newtr->addTransaksiPDOTemporary();
    echo $newtr->message;
    echo '<br> if you see this message, it is safe to close this window.';
    //header("location: user/pembeli/info.php");

    /*
    echo 'harga: ' . $barResult->harga;
    echo 'id: '.$barResult->id;
    echo 'namaBarang: '. $barResult->namaBarang;
    echo 'today is ' . $today;
    */
    //$buyer = $_SESSION['username'];

} else {
    echo 'no user? or... no item?';
}




?>