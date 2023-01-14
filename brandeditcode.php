<?php 
	include'db_connect.php';
		
		if(isset($_POST['brand'])) {
			$name = $_POST['brand_name'];
			$id = $_POST['brand_id'];
			$date = date('Y-m-d h:i:s');
			
			$sql = mysqli_query($con,"UPDATE brand_master SET brand_name='$name', Is_Actived=0, Is_Deleted=0, Insert_At='$date' where brand_id='$id'") or die(mysqli_error($con));
			if($sql) {
				header('location:brand.php');
			}
		}

?>