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
  <title>Admin | Product</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
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
            <h1>Add New Product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home.php">Home</a></li>
              <li class="breadcrumb-item active">Product</li>
			  <li class="breadcrumb-item active">Add Product</li>
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
                <h3 class="card-title"><i class="fas fa-plus-circle"></i> Add Product</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="productaddcode.php" method="post" role="form" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputProductImage">Product Image</label>
					<div class="custom-file">
                      <input type="file" name="product_image" class="form-control" id="image" placeholder="Product Image">
  
                    </div>
				  </div>
				  <div class="form-group">
                    <label for="exampleInputProduct">Product Name</label>
                    <input type="text" name="product_name" class="form-control" id="exampleInputProduct1" placeholder="Enter Product Name" required>
                  </div>
				  <div class="form-group">
                    <label for="exampleInputCode">Product Code</label>
                    <input title="Product Code" type="text" name="product_code" class="form-control" id="exampleInputCode1" placeholder="Enter Product Code" required>
                  </div>
				  <div class="form-group">
                  <label for="exampleInputCategory">Category</label>
                  <select name="pro_cat_name" class="form-control select2bs4" id="exampleInputCategory1" style="width: 100%;">
                    <option selected="selected">Select Category</option>
                    <?php
						$csql = mysqli_query($con, "SELECT * FROM product_categories_master where Is_Deleted=0")or die(mysqli_error($con));
						while($crow = mysqli_fetch_assoc($csql)){
					?>
                    <option value="<?php echo $crow['pro_cat_id']; ?>" required><?php echo $crow['pro_cat_name']; ?></option>
						<?php }?>
                  </select>
                  </div>
                  <div class="form-group">
                  <label for="exampleInputBrand">Brand</label>
                  <select name="brand_name" class="form-control select2bs4" id="exampleInputBrand1" style="width: 100%;">
                    <option selected="selected">Select Brand</option>
                    <?php
						$sql = mysqli_query($con, "SELECT * FROM brand_master where Is_Deleted=0")or die(mysqli_error($con));
						while($row = mysqli_fetch_assoc($sql)){
					?>
                    <option value="<?php echo $row['brand_id']; ?>" required><?php echo $row['brand_name']; ?></option>
						<?php }?>
                  </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputProductPrice">Product Price</label>
                    <input type="text" name="price" class="form-control" id="exampleInputProductPrice1" placeholder="Enter Product Price" required>
                  </div>
				  <div class="form-group">
                    <label for="exampleInputStock">Product Stock</label>
                    <input type="text" name="stock" class="form-control" id="exampleInputStock1" placeholder="Enter Product Stock" required>
                  </div>
				  <div class="form-group">
                  <label for="exampleInputUnit">Unit</label>
                  <select name="unit_name" class="form-control select2bs4" id="exampleInputUnit1" style="width: 100%;">
                    <option selected="selected">Select Unit</option>
                    <?php
						$usql = mysqli_query($con, "SELECT * FROM unit_master where Is_Deleted=0")or die(mysqli_error($con));
						while($urow = mysqli_fetch_assoc($usql)){
					?>
                    <option value="<?php echo $urow['unit_id']; ?>" required><?php echo $urow['unit_name']; ?></option>
						<?php }?>
                  </select>
                  </div>
				  <div class="form-group">
                  <label for="exampleInputVendor">Vendor</label>
                  <select name="vendor_name" class="form-control select2bs4" id="exampleInputVendor1" style="width: 100%;">
                    <option selected="selected">Select Vendor</option>
                    <?php
						$vsql = mysqli_query($con, "SELECT * FROM vendor_master where Is_Deleted=0")or die(mysqli_error($con));
						while($vrow = mysqli_fetch_assoc($vsql)){
					?>
                    <option value="<?php echo $vrow['vendor_id']; ?>" required><?php echo $vrow['vendor_name']; ?></option>
						<?php }?>
                  </select>
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <input type="submit" name="product_add" class="btn btn-primary" value="Submit">
				  <input type="reset" class="btn btn-secondary float-right" value="Cancel">

				  
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
<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>
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
	//Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
	
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
