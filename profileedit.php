<?php 
	include'db_connect.php';
	if(empty($_SESSION['id'])) {
		header('location:login.php');
	}
	    $id=$_SESSION['id'];
		$sql1 = mysqli_query($con,"SELECT * FROM admin_master where admin_id='$id'")or die(mysqli_error($con));
		$row = mysqli_fetch_assoc($sql1);
		
		if(isset($_POST['edit'])){
		$admin_user_nm=$_POST['admin_user_nm'];
		$admin_email=$_POST['admin_email'];
		$Phone_no=$_POST['Phone_no'];
		$admin_photo=$_FILES['admin_photo']['name'];
		$type=$_FILES['admin_photo']['type'];
		$size=$_FILES['admin_photo']['size'];
		$tmp_name=$_FILES['admin_photo']['tmp_name'];
		move_uploaded_file($tmp_name,'dist/images/'.$admin_photo);
		$sql="UPDATE admin_user_nm SET admin_user_nm='$admin_user_nm',admin_email='$admin_email',Phone_no='$Phone_no',admin_photo='$admin_photo' WHERE admin_id=$id";
		mysqli_query($con,$sql)or die(mysqli_error($con));
		header('location:profile.php');
		}
	
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
          <div class="col-md-4 offset-md-4">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="dist/images/<?php if (empty($row['admin_photo'])) {echo'defulat.jpg';}else{echo $row['admin_photo'];} ?>"
                       alt="User profile picture">
                </div>
                <form action="#" method="post" role="form" enctype="multipart/form-data">
                <h3 class="profile-username text-center"><?php echo $row['admin_user_nm']; ?></h3>

                <p class="text-muted text-center">Software Engineer</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>User Name</b> <input type="text" name="admin_user_nm" value="<?php echo $row['admin_user_nm']; ?>" class="float-right" id="exampleInputName1">
                  </li>
                  <li class="list-group-item">
                    <b>Email Id</b> <input type="email" name="admin_email" value="<?php echo $row['admin_email']; ?>" class="float-right" id="exampleInputEmail1">
                  </li>
                  <li class="list-group-item">
                    <b>Phone number</b> <input type="tel" name="Phone_no" value="<?php echo $row['Phone_no']; ?>" class="float-right" id="exampleInputPhone1">
                  </li>
				  <li class="list-group-item">
                    <b>Profile Picture</b> <input type="file" name="admin_photo" value="<?php echo $row['admin_photo']; ?>"  id="admin_photo">
                  </li>
                </ul>

                <div class="card-footer">
                  <input type="submit" name="edit" value="Save Change" class="btn btn-success"/>
				  <!--<strong>|</strong>*-->
				  <input type="reset" name="reset" class="btn btn-secondary float-right" value="Clear">
                </div>
				</form>
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
