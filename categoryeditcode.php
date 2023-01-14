<?php 
	function editCategory($categoryName,$categoryId){
		include("config.php");
		// ob_start();
		$categoryUpdateStatus = FALSE;
		if(isset($_POST['pro_cat_name'])) {
			$date = date('Y-m-d H:i:s');
			// $categoryUpdateStatus = $categoryid;
			$query = "UPDATE `product_categories_master` SET `pro_cat_name`='$categoryName',`Is_Actived`='0',`Is_Deleted`='0',`Insert_At`='$date',`Temp_Flag`='0' WHERE `pro_cat_id`=$categoryId";
			$sql = mysqli_query($con,$query) or die(mysqli_error($con));
			if($sql){
				$categoryUpdateStatus = $sql;	
			}
			// $categoryUpdateStatus =$categoryId;
		}
		return $categoryUpdateStatus;
	}
            			
?>