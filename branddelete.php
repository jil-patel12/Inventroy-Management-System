<?php 
	include'db_connect.php';
	$actived="brand";
	
	$id = $_GET['id'];
	$sql = mysqli_query($con,"UPDATE brand_master SET Is_Actived=1, Is_Deleted=1 WHERE brand_id='$id'") or die(mysqli_error($con));
	header('location:brand.php');

?>
