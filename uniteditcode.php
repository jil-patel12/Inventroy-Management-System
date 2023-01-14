<?php 
	include'db_connect.php';
		
		if(isset($_POST['unit_edit'])) {
			$unit_name = $_POST['unit_name'];
			$unit_id = $_POST['unit_id'];
			$date = date('Y-m-d h:i:s');
			
			$sql = mysqli_query($con,"UPDATE unit_master SET unit_name='$unit_name', Is_Actived=0, Is_Deleted=0, Insert_At='$date' where unit_id='$unit_id'") or die(mysqli_error($con));
			if($sql) {
				header('location:unit.php');
			}
		}

?>