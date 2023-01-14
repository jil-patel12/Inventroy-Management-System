<?php 
include'db_connect.php';
$actived="Sales Order";

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon"  href="dist/images/favicon.png" type="image/png">
  <title>Peedee Electronics - Dashboard | Sales Order</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
<?php 
	include'header.php'; 
?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
<?php
	include'sidebar.php'; 
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Sales Order</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home.php"><i class="fas fa-home"></i> Home</a></li>
              <li class="breadcrumb-item active">Sales Order</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
         <div class="card card-primary card-outline">
            <div class="card-header">
              <h3>Manage Sales Order
			  <a href="saleorderadd.php" class="btn btn-primary float-sm-right"><i class="fas fa-plus-circle"></i> Add sales Order</a>
			  </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="width: 1%">Sr. No.</th>
                  <th>Date</th>
                  <th>Receipt No</th>
                  <th>Customer Name</th>
                  <th>Price</th>
				  <th>Total Amount</th>
				  <th>Order Status</th>
				  <th>Received By</th>
				  <th style="width: 20%">Action</th>
				  
                </tr>
                </thead>
                <tbody>
				<?php 
				    $sql = mysqli_query($con, "SELECT * FROM sales_orders_master where Is_Deleted=0")or die(mysqli_error($con));
				
					while($row = mysqli_fetch_assoc($sql)){
						
						 $cust = mysqli_query($con,"select * from customer_master where customer_id  ='".$row['customer_id']."'");
                         $custname = mysqli_fetch_array($cust);
				         
						 
				?>
                <tr>
                  <td><?php echo $row['order_id']; ?></td>
                  <td><?php echo date('d-m-Y',strtotime($row['order_date'])); ?></td>
                  <td><?php echo $row['receipt_no']; ?></td>
				  <td><?php echo $custname['cust_name']; ?></td>
				  <td><?php echo $row['bill_amount']; ?></td>
				  <td><?php echo $row['total_amount']; ?></td>
				  <td><span class="badge<?php if ($row['order_status']=='Delivered'){echo ' badge-danger';}else if($row['order_status']=='Pending'){echo 'badge badge-warning';}else if($row['order_status']=='Shipped'){echo 'badge badge-success';}else if($row['order_status']=='Dispatch'){echo 'badge badge-info';}else{echo 'badge-danger';}?>"><?php echo $row['order_status']; ?></span></td>
              				  
                  <td><?php echo $row['receive_by']; ?></td>					  
                  <td> 
				    <a class="btn btn-primary btn-sm" href="view-sales-order-details.php?salesId=<?php echo $row['order_id']; ?>">
                              <i class="fas fa-folder">
                              </i>
                              View
                    </a>
					<!-- <a class="btn btn-info btn-sm" href="#">
                              <i class="fas fa-edit">
							  </i>
                              Edit
                    </a> -->
					<a class="btn btn-danger btn-sm" href="delete-sales-order.php?salesId=<?php echo $row['order_id']; ?>">
                              <i class="fas fa-trash">
							  </i>
                              Delete
                    </a>
				  </td>
                </tr>
					<?php }?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include'footer.php'; ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
