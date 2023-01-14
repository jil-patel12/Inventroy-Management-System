<?php 
	include'db_connect.php';
	if(empty($_SESSION['id'])) {
		header('location:login.php');
	}
	    $id=$_SESSION['id'];
		$sql1 = mysqli_query($con,"SELECT * FROM admin_master where admin_id='$id'")or die(mysqli_error($con));
		$row = mysqli_fetch_assoc($sql1);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon"  href="dist/images/favicon.png" type="image/png">
  <title>Peedee Electronics - Admin | User Profile</title>
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
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home.php"><i class="fas fa-home"></i> Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3 offset-md-4">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="dist/images/<?php if (empty($row['admin_photo'])) {echo'defulat.jpg';}else{echo $row['admin_photo'];} ?>"
                       alt="User profile picture">
                </div>
				
                <h3 class="profile-username text-center"><?php echo $row['admin_user_nm']; ?></h3>
                 
				<p class="text-muted text-center">Software Engineer</p>
				 
                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>User Name</b>   <a class="float-right"><?php echo $row['admin_user_nm']; ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Email Id</b>   <a class="float-right"><?php echo $row['admin_email']; ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Phone number </b>  <a class="float-right"><?php echo $row['Phone_no']; ?></a>
                  </li>
                </ul>

                <a href="profileedit.php" class="btn btn-primary btn-block"><b>Edit Profile</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php 
    include'footer.php';
  ?>
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
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
