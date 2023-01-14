<?php
	include'db_connect.php';
		if(isset($_POST['category'])) {
			$name = $_POST['category_name'];
			$date = date('Y-m-d h:i:s');
			
			$sql = mysqli_query($con,"INSERT INTO product_categories_master(pro_cat_name,Is_Actived,Is_Deleted,Insert_At,Temp_Flag) VALUES ('$name',0,0,'$date',0)") or die(mysqli_error($con));
			header('location:category.php');
		}

?>