<?php 
include'db_connect.php';
	
	if(isset($_POST['customer_edit'])) {
		$customerid = $_POST['customer_id'];
		$name = $_POST['cust_name'];
		$contact = $_POST['cust_contact'];
		$email = $_POST['cust_email'];
		$address = $_POST['cust_address'];
		$date = date('Y-m-d h:i:s');
		
		$sql = mysqli_query($con,"UPDATE customer_master SET cust_name='$name', cust_contact='$contact', cust_email='$email', cust_address='$address', Is_Actived=0, Is_Deleted=0, Insert_At='$date' WHERE customer_id='$customerid' ") or die(mysqli_error($con));
		if($sql) {
			header('location:customer.php');
		}
	}

?>