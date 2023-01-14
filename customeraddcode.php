<?php 
include'db_connect.php';

	if(isset($_POST['customer'])) {
		$customername = $_POST['cust_name'];
		$customerphone = $_POST['cust_contact'];
		$customeremail = $_POST['cust_email'];
		$customeraddress = $_POST['cust_address'];
		$date = date('Y-m-d h:i:s');
		
		$sql = mysqli_query($con,"INSERT INTO customer_master(cust_name,cust_contact,cust_email,cust_address,Is_Actived,Is_Deleted,Insert_At,Temp_Flag) VALUES ('$customername','$customerphone','$customeremail','$customeraddress',0,0,'$date',0)") or die(mysqli_error($con));
		header('location:customer.php');
		
	}

?>

	<!--	if (mysqli_query($con, $sql)) {
        echo "New record created successfully";
        } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

    mysqli_close($conn); -->
	