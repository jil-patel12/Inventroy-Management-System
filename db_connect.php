<?php 
// Create connection
$con = mysqli_connect("localhost","root","","electronics_ims");
session_start();
ob_start();
date_default_timezone_set('asia/kolkata');

//Check connection
if (mysqli_connect_errno()) {
	echo "Failed to connect to MYSQL: " .mysqli_connect_error();
}else{
	//echo " connected Successfully";
}
?>