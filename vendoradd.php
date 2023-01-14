<?php 
include'db_connect.php';
$actived="Vendor";
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon"  href="dist/images/favicon.png" type="image/png">
  <title>Admin | Vendor</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
<?php include'header.php'; ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
<?php include'sidebar.php'; ?>  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add New Vendor</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Vendor</li>
			  <li class="breadcrumb-item active">Add Vendor</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-plus"></i> Add Vendor</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="vendoraddcode.php" method="post" role="form">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputName">Vendor name</label>
                    <input type="text" name="vendor_name" class="form-control" id="exampleInputName1" placeholder="Vendor Name" required>
					 <input type="hidden" name="id" value="<?php echo $row['vendor_id'] ?>">
                  </div>
				  <div class="form-group">
                    <label for="exampleInputEmail">Vendor Email Id</label>
                    <input type="email" name="vendor_email" class="form-control" id="exampleInputEmail1" placeholder="Enter Vendor Email" required>
                  </div>
				  <div class="form-group">
                    <label for="exampleInputNumber">Vendor Phone number</label>
                    <input type="contact" name="vendor_contact" class="form-control" id="exampleInputNumber1" placeholder="Enter Vendor Phone number" required>
                  </div>
				  <div class="form-group">
                    <label for="exampleInputAddress">Vendor Address</label>
                    <textarea name="vendor_address" class="form-control" id="exampleInputAddress1" placeholder="Enter Vendor Address" required></textarea>
                  </div>
				  <div class="form-group">
                    <label for="exampleInputcName">Vendor Company Name</label>
                    <input type="text" name="ven_com_name" class="form-control" id="exampleInputcName1" placeholder="Enter Vendor Company Name" required>
                  </div>
				  <div class="form-group">
                    <label for="exampleInputcEmail">Vendor Company Email Id</label>
                    <input type="email" name="ven_com_email" class="form-control" id="exampleInputcEmail1" placeholder="Enter Vendor Company Email">
                  </div>
				  <div class="form-group">
                    <label for="exampleInputcNumber">Vendor Company Phone number</label>
                    <input type="contact" name="ven_com_contact" class="form-control" id="exampleInputcNumber1" placeholder="Enter Vendor Company Email">
                  </div>
				  <div class="form-group">
                    <label for="exampleInputcAddress">Vendor Company Address</label>
                    <textarea name="ven_com_address" class="form-control" id="exampleInputcAddress1" placeholder="Enter Vendor Company Address"></textarea>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <input type="submit" name="add_vendor" class="btn btn-primary">
				  <!--<strong>|</strong>*-->
				  <input type="reset" name="reset" class="btn btn-secondary float-right" value="Cancel">
				  
                </div>
              </form>
            </div>
            <!-- /.card -->
         </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
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
<!-- bs-custom-file-input -->
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
 <!-- <script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script> -->
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
