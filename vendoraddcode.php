<?php
include'db_connect.php';

	if(isset($_POST['add_vendor'])) {
		$vendorname = $_POST['vendor_name'];
		$vendoremail = $_POST['vendor_email'];
		$vendorcontact = $_POST['vendor_contact'];
		$vendoraddress = $_POST['vendor_address'];
		$vencomname = $_POST['ven_com_name'];
		$vencomemail = $_POST['ven_com_email'];
		$vencomcontact = $_POST['ven_com_contact'];
		$vencomaddress = $_POST['ven_com_address'];
		$date = date('Y-m-d h:i:s');
		
		$sql = mysqli_query($con,"INSERT INTO vendor_master(vendor_name,vendor_email,vendor_contact,vendor_address,ven_com_name,ven_com_email,ven_com_contact,ven_com_address,Is_Actived,Is_Deleted,Insert_At,Temp_Flag) VALUES ('$vendorname','$vendoremail','$vendorcontact','$vendoraddress','$vencomname','$vencomemail','$vencomcontact','$vencomaddress',0,0,'$date',0)") or die(mysqli_error($con));
		header('location:vendor.php');
	}

?>
