<?php 
include'db_connect.php';

	if(isset($_POST['brand'])) {
		$brandname = $_POST['brand_name'];
		$date = date('Y-m-d h:i:s');
		
		$sql = mysqli_query($con,"INSERT INTO brand_master(brand_name,Is_Actived,Is_Deleted,Insert_At,Temp_Flag) VALUES ('$brandname',0,0,'$date',0)") or die(mysqli_error($con));
		header('location:brand.php');
		
	}

?>

	<!--	if (mysqli_query($con, $sql)) {
        echo "New record created successfully";
        } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

    mysqli_close($conn); -->
	