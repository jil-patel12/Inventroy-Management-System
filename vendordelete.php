<?php 
include'db_connect.php';
$actived="Vendor";
	$id=$_GET['id'];
	$sql = mysqli_query($con, "UPDATE vendor_master SET Is_Actived=1, Is_Deleted=1 WHERE 	vendor_id='$id'")or die (mysqli_error($sql));
	header('location:vendor.php');
	
?>