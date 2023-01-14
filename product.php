<?php 
include'db_connect.php';
$actived="Product";
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon"  href="dist/images/favicon.png" type="image/png">
  <title>Peedee Electronics - Dashboard | Product</title>
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
            <h1>Product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i> Home</a></li>
              <li class="breadcrumb-item active">Product</li>
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
              <h3>Product List
			  <a href="productadd.php" class="btn btn-primary float-sm-right"><i class="fas fa-plus-circle"></i> Add Product</a>
			  </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive pad">
              <table id="example1" class="table table-bordered table-striped">
			  <thead>
                <tr>
                  <th style="width: 1%">Sr No.</th>
				  <th>Image</th>
                  <th>Product Name</th>
                  <th>Product Code</th>
				  <th>Category</th>
				  <th>Brand</th>
				  <th>Price(₹)</th>
				  <!--<th>Qty.</th>-->
				  <th>Stock</th>
				  <th>Unit</th>
				  <th>Vendor Name</th>
                  <th style="width: 14%">Action</th>
                </tr>
                </thead>
                <tbody>
				<?php 
				    $sql = mysqli_query($con, "SELECT * FROM product_master where Is_Deleted=0")or die(mysqli_error($con));
					$num=1;
					while($row = mysqli_fetch_assoc($sql)){
						               
                         $cat = mysqli_query($con,"select * from product_categories_master where pro_cat_id ='".$row['pro_cat_id']."'");
                         $catname = mysqli_fetch_assoc($cat);
						 
						 $brand = mysqli_query($con,"select * from brand_master where brand_id ='".$row['brand_id']."'");
                         $bname = mysqli_fetch_assoc($brand);
						 
						 $ven = mysqli_query($con,"select * from vendor_master where vendor_id ='".$row['vendor_id']."'");
                         $venname = mysqli_fetch_assoc($ven);
						 
						 $unit = mysqli_query($con,"select * from unit_master where unit_id ='".$row['unit_id']."'");
                         $unitname = mysqli_fetch_assoc($unit);
				        
				?>
                <tr>
                  <td><?php echo $num++; ?></td>
                  <td><img src='dist/images/product/<?php echo $row['product_image']; ?>'width='100px'></td>
				  <td><?php echo $row['product_name']; ?></td>
				  <td><?php echo $row['product_code']; ?></td>
				  <td><?php echo $catname['pro_cat_name']; ?></td>
				  <td><?php echo $bname['brand_name']; ?></td>
				  <td><?php echo $row['price']; ?></td>
				  <td><?php echo $row['stock']; ?></td>
				  <td><?php echo $unitname['unit_name']; ?></td>				  
				  <td><?php echo $venname['vendor_name']; ?></td>
                  <td> 
					<a class="btn btn-sm btn-info" href="productedit.php?id=<?php echo $row['product_id']; ?>"><i class="fas fa-edit"></i> Edit</a>
          <a class="btn btn-sm btn-danger" href="productdelete.php?id=<?php echo $row['product_id']; ?>" onclick="return confirm('Are you sure you wan\'t to detele this record');">
            <i class="fas fa-trash">
            </i> Delete
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
	
	<a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
      <i class="fas fa-chevron-up"></i>
    </a>
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
