<?php
include'db_connect.php';
	if(isset($_POST['edit'])){
		$id = $_POST['product_id'];
		//$image = $_POST['product_image'];
		$product_image =$_FILES['product_image']['name'];
		$_FILES['product_image']['type'];
		$_FILES['product_image']['size'];
		$tmp_image=$_FILES['product_image']['tmp_name'];
		move_uploaded_file($tmp_image,'dist/images/product/'.$product_image);
		$name = $_POST['product_name'];
		$code = $_POST['product_code'];
		$category = $_POST['pro_cat_name'];
		$brand = $_POST['brand_name'];
		$price = $_POST['price'];
		$stock = $_POST['stock'];
		$unit_name = $_POST['unit_name'];
		$vendor_name = $_POST['vendor_name'];
		$date = date('Y-m-d h:i:s');
		
		$sql = mysqli_query($con,"UPDATE product_master SET product_image='$product_image', product_name='$name', product_code='$code', pro_cat_id='$category', brand_id='$brand', price='$price', stock='$stock', unit_id='$unit_name', vendor_id='$vendor_name', Is_Actived=0, Is_Deleted=0, Insert_At='$date' where product_id='$id'")or die(mysqli_error($con));
			if($sql) {
				header('location:product.php');
			}
	}
		
?>