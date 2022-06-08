<?php
if(isset($_GET['id'])){	
	require_once('class/class.barang.php'); 		
	$objBarang = new Barang(); 
	$objBarang->id = $_GET['id'];
	
	$objBarang->selectOneBarang();
	if($objBarang->hasil == false){		
		echo '<script>window.history.back()</script>';	
	}else{
		$objBarang->deleteBarang();
		echo "<script> alert('".$objBarang->message."'); </script>";
		echo "<script>window.location = 'listbarang.php'</script>";			
	}	
}
else{		
	echo '<script>window.history.back()</script>';	
}
?>