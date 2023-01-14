<?php 
	include'db_connect.php';
	$actived="Product";
	
	$id = $_GET['id'];
	$sql = mysqli_query($con,"UPDATE product_master SET Is_Actived=1, Is_Deleted=1 WHERE product_id='$id'") or die(mysqli_error($con));
	header('location:product.php');

?>
