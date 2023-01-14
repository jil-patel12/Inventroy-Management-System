<?php
include'db_connect.php';
		if(isset($_POST['salesorder_add'])){
			$customer_id = $_POST['customer_id'];
			$order_date = date('Y-m-d',strtotime($_POST['order_date']));
			$receipt_no = $_POST['receipt_no'];
			$bill_amount = $_POST['bill_amount'];
			$GST = $_POST['GST'] . "%";
			$discount = $_POST['discount'];
			$shipping = $_POST['shipping'];
			$total_amount = $_POST['total_amount'];
			$payment_status = $_POST['payment_status'];
			$order_status = $_POST['order_status'];
			$receive_by = $_POST['receive_by'];
			$date = date('Y-m-d h:i:s');
			
			$sql = mysqli_query($con,"INSERT INTO sales_orders_master(customer_id, order_date, receipt_no, bill_amount, GST, discount, shipping, total_amount, payment_status, order_status, receive_by, Is_Actived, Is_Deleted, Insert_At, Temp_Flag) VALUES ('$customer_id', '$order_date', '$receipt_no', '$bill_amount', '$GST', '$discount', '$shipping', '$total_amount', '$payment_status', '$order_status', '$receive_by', 0, 0, '$date', 0)") or die(mysqli_error($con));
			
			$orderId= mysqli_insert_id($con);
			
			foreach ($_POST['product_name'] as $key => $val) {
				echo $val . "</br>";
				echo $_REQUEST['qua'][$key] ."</br>";
				$sales_orders_detail = mysqli_query($con,"insert into sales_orders_detail set
		        order_id = '".$orderId."',
			    customer_id ='".$_REQUEST['customer_id']."',
			    product_id = '".$val."',
			    sales_quantity = '".$_REQUEST['qua'][$key]."',
			    sales_price = '".$_REQUEST['amt'][$key]."'") or die(mysqli_error($con));
				
				$p = mysqli_query($con,"select * from product_master where product_id='".$val."'");
                $pstk = mysqli_fetch_array($p);
				
				$stock = mysqli_query($con,"update product_master set stock = '".($pstk['stock']-$_REQUEST['qua'][$key])."' where product_id = '".$val."'");
			}
			
			if($sql)
			{
				header('location:saleorder.php');
			}
		}

?>