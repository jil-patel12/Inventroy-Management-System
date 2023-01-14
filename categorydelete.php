<?php 
include'db_connect.php';
$actived="Category";

	$id = $_GET['id'];
	$sql = mysqli_query($con,"UPDATE product_categories_master SET Is_Actived=1, Is_Deleted=1 WHERE pro_cat_id='$id'") or die(mysqli_error($con));
	header('location:category.php');
?>