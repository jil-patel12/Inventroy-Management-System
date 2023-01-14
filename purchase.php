<?php 
include'db_connect.php';
$actived="Purchase Order";

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon"  href="dist/images/favicon.png" type="image/png">
  <title>Peedee Electronics - Dashboard | Purchase Order</title>
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
            <h1>Purchase</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home.php"><i class="fas fa-home"></i> Home</a></li>
              <li class="breadcrumb-item active">Purchase</li>
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
              <h3>View Purchase Order
			  <a href="purchaseadd.php" class="btn btn-primary float-sm-right"><i class="fas fa-plus-circle"></i> Add Purchase</a>			  
			  </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="width: 1%">Sr. No.</th>
                  <th>Date</th>	
                  <th>Challan No</th>				  
                  <th>vendor Name</th>
				  <!--<th>product</th>
				  <th>Quantity</th>
				  <th>Unit Price</th>-->
				  <th>Bill Price</th>
				  <th>Total Amount(₹)</th>
				  <th>Order Status</th>
				  <th>Received By</th>
				  <th style="width: 20%">Action</th>				  
                </tr>
                </thead>
                <tbody>
				<?php 
				    $sql = mysqli_query($con, "SELECT * FROM purchase_master where Is_Deleted=0")or die(mysqli_error($con));
					
					while($row = mysqli_fetch_assoc($sql)){
						
						 $ven = mysqli_query($con,"select * from vendor_master where vendor_id ='".$row['vendor_id']."'");
                         $venname = mysqli_fetch_array($ven);
				         
						 
				?>
                <tr>
                  <td><?php echo $row['purchase_id']; ?></td>
				  <td><?php echo date('d-m-Y',strtotime($row['purchase_date'])); ?></td>
				  <td><?php echo $row['challan']; ?></td>
				  <td><?php echo $venname['vendor_name']; ?></td>
				  <td><?php echo $row['bill_amount']; ?></td>
				  <td><?php echo $row['total_amount']; ?></td> 
				  <td><?php echo $row['order_status']; ?></td> 
				  <td><?php echo $row['received_by']; ?></td>
                  <td>
					<a class="btn btn-primary btn-sm" href="view-purchase-order.php?purchaseId=<?php echo $row['purchase_id'];?>">
                              <i class="fas fa-folder">
                              </i>
                              View
                    </a>
					<!-- <a class="btn btn-info btn-sm" href="edit-purchase-order.php?purchaseId=?>">
                              <i class="fas fa-edit"></i>
                              Edit
                    </a> -->
					<a class="btn btn-danger btn-sm" href="delete-purchase-order.php?purchaseId=<?php echo $row['purchase_id'];?>">
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
