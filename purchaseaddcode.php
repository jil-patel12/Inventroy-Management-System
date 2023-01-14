<?php
include'db_connect.php';
	if(isset($_POST['purchase_add'])){
		$vendor_id = $_POST['vendor_id'];
		$challan = $_POST['challan'];
		$purchase_date = date('Y-m-d',strtotime($_POST['purchase_date']));
		$bill_amount = $_POST['bill_amount'];
		$GST = $_POST['GST'] . "%";
		$discount = $_POST['discount'];
		$shipping = $_POST['shipping'];
		$total_amount = $_POST['total_amount'];
		$payment_status = $_POST['payment_status'];
		$order_status = $_POST['order_status'];
		$received_by = $_POST['received_by'];
		$date = date('Y-m-d h:i:s');
		
		$sql = mysqli_query($con,"INSERT INTO purchase_master(vendor_id, challan, purchase_date, bill_amount, GST, discount, shipping, total_amount, payment_status, order_status, received_by, Is_Actived, Is_Deleted, Insert_At, Temp_Flag) VALUES ('$vendor_id', '$challan', '$purchase_date', '$bill_amount', '$GST', '$discount', '$shipping', '$total_amount', '$payment_status', '$order_status', '$received_by', 0, 0, '$date', 0)") or die(mysqli_error($con));
		$purchaseId= mysqli_insert_id($con);
						
		foreach ($_POST['product_name'] as $key => $val) {
			
		    $purchase_detail = mysqli_query($con,"insert into purchase_detail set
		    purchase_id = '".$purchaseId."',
			vendor_id ='".$_REQUEST['vendor_id']."',
			product_id = '".$val."',
			buying_qty = '".$_REQUEST['qua'][$key]."',
            unit_price = '".$_REQUEST['amt'][$key]."',
            short_item = '".$_REQUEST['squa'][$key]."',
            actual_quantity = '".$_REQUEST['aqua'][$key]."',
			buying_price = '".$_REQUEST['amt'][$key]."'") or die(mysqli_error($con));
						
			$p = mysqli_query($con,"select * from product_master where product_id='".$val."'");
            $pstk = mysqli_fetch_array($p);
                                        
            $stock = mysqli_query($con,"update product_master set stock = '".($_REQUEST['aqua'][$key]+$pstk['stock'])."' where product_id = '".$val."'");
		}
				
		if($sql)
		{
           header('location:purchase.php');
        }
				
	}
			  
?>