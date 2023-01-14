<?php 
	include'../db_connect.php';
	$res = mysqli_query($con,"select * from product_master where product_id = '".$_REQUEST['pid']."'");
    $row = mysqli_fetch_array($res);
    echo $row['price'] . "," .$row['stock'] ;

?>