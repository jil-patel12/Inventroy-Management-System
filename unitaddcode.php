<?php 
include'db_connect.php';

	if(isset($_POST['unit_add'])) {
		$unitname = $_POST['unit_name'];
		$date = date('Y-m-d h:i:s');
		
		$sql = mysqli_query($con,"INSERT INTO unit_master(unit_name,Is_Actived,Is_Deleted,Insert_At,Temp_Flag) VALUES ('$unitname',0,0,'$date',0)") or die(mysqli_error($con));
		header('location:unit.php');
		
	}

?>

	<!--	if (mysqli_query($con, $sql)) {
        echo "New record created successfully";
        } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

    mysqli_close($conn); -->
	