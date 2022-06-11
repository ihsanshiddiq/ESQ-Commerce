<?php
require_once( 'inc.koneksi2.php');
require_once('./init.class.php');
$objBarang = new Barang(); 
if(isset($_GET['deleteid'])){	
	$objBarang->id = $_GET['deleteid'];
	$objBarang->deleteBarang();

	if($objBarang->result){		
		echo "<script> alert('".$objBarang->message."'); </script>";
		echo "<script>window.location = 'listbarang.php'</script>";		
		
	}else{
		echo "<script> alert('Data gagal dihapus!');</script>";
		echo '<script>window.history.back()</script>';
	}		
		
}
?>