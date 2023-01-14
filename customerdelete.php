<?php 
	include'db_connect.php';
	
	$id = $_GET['id'];
	$sql = mysqli_query($con,"UPDATE customer_master SET Is_Actived=1, Is_Deleted=1 WHERE customer_id='$id'") or die(mysqli_error($con));
	header('location:customer.php');

?>