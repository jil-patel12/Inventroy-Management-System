<?php 
include'db_connect.php';
$actived="Category";
	if(empty($_SESSION['id'])) {
		header('location:login.php');
	}
	if(!empty($_GET['id'])) {
		$id = $_GET['id'];
		$sql1 = mysqli_query($con,"SELECT * FROM product_categories_master where pro_cat_id='$id'") or die (mysqli_error($con));
    $row = mysqli_fetch_assoc($sql1);
    $_SESSION["catId"] = $_GET['id'];
  }	

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon"  href="dist/images/favicon.png" type="image/png">
  <title>Admin | Category</title>
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
            <h1>Edit Category</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Category</li>
			        <li class="breadcrumb-item active">Edit Category</li>
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
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-edit"></i> Edit Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="categoryedit.php" method="POST" role="form">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputCategory">Category name</label>
                    <input type="text" name="category_name" value="<?php echo $row['pro_cat_name']; ?>" class="form-control" id="exampleInputCategory1" placeholder="Category Name">
				          	<input type="hidden" name="brand_id"class="form-control" value="<?php echo $row['pro_cat_id']; ?>">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <input type="submit" name="category" value="Update" class="btn btn-primary">
				            <!--<strong>|</strong>*-->
				            <!-- <input type="reset" name="reset" class="btn btn-secondary float-right" value="Cancel"> -->
                </div>
              </form>
              
            </div>
            <!-- /.card -->
         </div>
         <?php
                if(isset($_POST["category"])){
                    $catId = $_SESSION["catId"];
                    unset($_SESSION["catId"]);
                    include("category-edit-function.php");
                    if($val = editCategory($_POST["category_name"],$catId)){
                      header("location:category.php");
                    }
                    else{
                      echo "Category is Not Updated.";
                    }
                }
              ?>
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
