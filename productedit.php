<?php 
include'db_connect.php';
$actived="Product";
	if(empty($_SESSION['id'])) {
		header('location:login.php');
	}
	if(!empty($_GET['id'])) {
		$id = $_GET['id'];
		$sql1 = mysqli_query($con,"SELECT * FROM product_master where product_id='$id'")or die(mysqli_error($con));
		$row = mysqli_fetch_assoc($sql1);
	}
		
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon"  href="dist/images/favicon.png" type="image/png">
  <title>Peedee Electronics - Dashboard | Product | Product Edit</title>
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
            <h1>Edit Product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Product</li>
			  <li class="breadcrumb-item active">Edit Product</li>
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
                <h3 class="card-title"><i class="fas fa-edit"></i> Edit Product</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="producteditcode.php" method="post" role="form" enctype="multipart/form-data">
                <div class="card-body">
				  <div class="form-group">
                    <label for="exampleInputFile">Product Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="product_image" value="<?php echo $row['product_image']; ?>" class="form-control" id="product_image">
						<img src='dist/images/product/<?php echo $row['product_image']; ?>' width='100px'>
                      </div>
                    </div>
                  </div>
				  <div class="form-group">
                    <label for="exampleInputProduct">Product Name</label>
                    <input type="text" name="product_name" value="<?php echo $row['product_name']; ?>" class="form-control" id="exampleInputProduct1" placeholder="Enter Product Name" required>
					<input type="hidden" name="product_id"class="form-control" value="<?php echo $row['product_id']; ?>">
                  </div>
				  <div class="form-group">
                    <label for="exampleInputCode">Product Code</label>
                    <input type="text" title="Product Code" name="product_code" value="<?php echo $row['product_code']; ?>" class="form-control" id="exampleInputCode1" placeholder="Enter Product Code" required>
                  </div>
				  <div class="form-group">
                  <label for="exampleInputCategory">Category Name</label>
                  <select name="pro_cat_name" class="form-control select2bs4" id="exampleInputCategory1" style="width: 100%;">
                    <option selected="selected">Select Category</option>
                    <?php
						$csql = mysqli_query($con, "SELECT * FROM product_categories_master where Is_Deleted=0")or die(mysqli_error($con));
						while($crow = mysqli_fetch_assoc($csql)){
					?>
                    <option value="<?php echo $crow['pro_cat_id']; ?>" <?php if($crow['pro_cat_id']==$row['pro_cat_id']){echo 'selected';} ?> required><?php echo $crow['pro_cat_name']; ?></option>
						<?php }?>
                  </select>
                  </div>
                  <div class="form-group">
                  <label for="exampleInputBrand">Brand Name</label>
                  <select name="brand_name" class="form-control select2bs4" id="exampleInputBrand1" style="width: 100%;">
                    <option selected="selected">Select Brand</option>
                    <?php
						$sql = mysqli_query($con, "SELECT * FROM brand_master where Is_Deleted=0")or die(mysqli_error($con));
						while($brow = mysqli_fetch_assoc($sql)){
					?>
                    <option value="<?php echo $brow['brand_id']; ?>" <?php if($brow['brand_id']==$row['brand_id']){echo 'selected';} ?> required><?php echo $brow['brand_name']; ?></option>
						<?php }?>
                  </select>
                  </div>
				  <div class="form-group">
                    <label for="exampleInputProductPrice">Product Price</label>
                    <input type="text" name="price" value="<?php echo $row['price']; ?>" class="form-control" id="exampleInputProductPrice1" placeholder="Enter Product Price" required>
                  </div>
				  <div class="form-group">
                    <label for="exampleInputStock">Product Stock</label>
                    <input type="text" name="stock" value="<?php echo $row['stock']; ?>" class="form-control" id="exampleInputStock1" placeholder="Enter Product Stock" required>
                  </div>
				  <div class="form-group">
                  <label for="exampleInputUnit">Unit</label>
                  <select name="unit_name" class="form-control select2bs4" id="exampleInputUnit1" style="width: 100%;">
                    <option selected="selected">Select Unit</option>
                    <?php
						$usql = mysqli_query($con, "SELECT * FROM unit_master where Is_Deleted=0")or die(mysqli_error($con));
						while($urow = mysqli_fetch_assoc($usql)){
					?>
                    <option value="<?php echo $urow['unit_id']; ?>" <?php if($urow['unit_id']==$row['unit_id']){echo 'selected';} ?> required><?php echo $urow['unit_name']; ?></option>
						<?php }?>
                  </select>
                  </div>
				  <div class="form-group">
                  <label for="exampleInputVendor">Vendor Name</label>
                  <select name="vendor_name" class="form-control select2bs4" id="exampleInputVendor1" style="width: 100%;">
                    <option selected="selected">Select Vendor</option>
                    <?php
						$vsql = mysqli_query($con, "SELECT * FROM vendor_master where Is_Deleted=0")or die(mysqli_error($con));
						while($vrow = mysqli_fetch_assoc($vsql)){
					?>
                    <option value="<?php echo $vrow['vendor_id']; ?>" <?php if($vrow['vendor_id']==$row['vendor_id']){echo 'selected';} ?> required><?php echo $vrow['vendor_name']; ?></option>
						<?php }?>
                  </select>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="edit" class="btn btn-primary">Submit</button>
				  <!--<strong>|</strong>*-->
				  <input type="reset" name="reset" class="btn btn-secondary float-right" value="Clear">
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
