<?php 
include'db_connect.php';

	if(isset($_POST['product_add'])) {
		//$product_image = $_POST['product_image'];
		$product_image =$_FILES['product_image']['name'];
		$_FILES['product_image']['type'];
		$_FILES['product_image']['size'];
		$tmp_image=$_FILES['product_image']['tmp_name'];
		move_uploaded_file($tmp_image,'dist/images/product/'.$product_image);
		$product_name = $_POST['product_name'];
		$code = $_POST['product_code'];
		$brand = $_POST['brand_name'];
		$category = $_POST['pro_cat_name'];
		$price = $_POST['price'];
		$stock = $_POST['stock'];
		$unit_name = $_POST['unit_name'];
		$vendor_name = $_POST['vendor_name'];
		$date = date('Y-m-d h:i:s');
		
		$sql = mysqli_query($con,"INSERT INTO product_master(product_image, product_name,product_code, brand_id, pro_cat_id, price, stock, unit_id,vendor_id,   Is_Actived, Is_Deleted, Insert_At, Temp_Flag) VALUES ('$product_image', '$product_name', '$code', '$brand', '$category', '$price', '$stock', '$unit_name', '$vendor_name', 0, 0, '$date', 0)") or die(mysqli_error($con));
		header('location:product.php');
	
	}

?>