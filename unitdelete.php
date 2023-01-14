<?php 
	include'db_connect.php';
	$actived="Unit";
	
	$id = $_GET['id'];
	$sql = mysqli_query($con,"UPDATE unit_master SET Is_Actived=1, Is_Deleted=1 WHERE unit_id='$id'") or die(mysqli_error($con));
	header('location:unit.php');

?>
