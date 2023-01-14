<?php 
include'db_connect.php';
	if(isset($_POST['edit_vendor'])){   //submit button name
		$id = $_POST['vendor_id'];
		$vendorname = $_POST['vendor_name'];
		$vendoremail = $_POST['vendor_email'];
		$vendorcontact = $_POST['vendor_contact'];
		$vendoraddress = $_POST['vendor_address'];
		$vencomname = $_POST['ven_com_name'];
		$vencomemail = $_POST['ven_com_email'];
		$vencomcontact = $_POST['ven_com_contact'];
		$vencomaddress = $_POST['ven_com_address'];
		$date = date('Y-m-d h:i:s');
		
		$sql = mysqli_query($con,"UPDATE vendor_master SET vendor_name='$vendorname', vendor_email='$vendoremail', vendor_contact='$vendorcontact', vendor_address='$vendoraddress', ven_com_name='$vencomname', ven_com_email='$vencomemail', ven_com_contact='$vencomcontact', ven_com_address='$vencomaddress', Is_Actived=0, Is_Deleted=0, Insert_At='$date' WHERE vendor_id='$id'")or die(mysqli_error($con));
			if($sql) {
				header('location:vendor.php');
			}
	}
	
?>

