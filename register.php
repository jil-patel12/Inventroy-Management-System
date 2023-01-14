<?php
include'db_connect.php';
	if (isset($_POST['register'])){
		$name = $_POST['admin_user_nm'];
		$email = $_POST['admin_email'];
		$password = $_POST['admin_password'];
		$retypepassword = $_POST['admin_rpassword'];
		$date = date('Y-m-d h:i:s');
		if($password==$retypepassword){
			$pass=md5($password);
			$sql = mysqli_query($con,"INSERT INTO admin_master(admin_user_nm,admin_email,admin_password,Is_Actived,Is_Deleted,Insert_At)VALUES('$name','$email','$pass',0,0,'$date')")or die(mysqli_error($con));
			header('location:home.php');
		}else{
			echo "<script>alert('Your password and confirm password does\'t match');</script>";
			echo "<script>window.location.href='register.php'</script>";
		}
	}
	
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon"  href="dist/images/favicon.png" type="image/png">
  <title>Peedee Electronics - Admin | Registration Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="home.php"><img src="dist/images/product/PD-Logo.png" alt="brand image" width='250px'></a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new membership</p>

      <form action="#" method="post" id="quickForm">
	    <div class="form-group">
		   <input type="hidden" name="id" value="<?php echo $row['id']; ?>"/>
		</div>
        <div class="input-group mb-3">
          <input type="text" name="admin_user_nm" class="form-control" id="exampleInputName1" autocomplete="off" placeholder="Full name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" name="admin_email" class="form-control" id="exampleInputEmail1" autocomplete="off" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="admin_password" class="form-control" id="exampleInputPassword1" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="admin_rpassword" class="form-control" id="exampleInputrPassword1" placeholder="Retype password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms" required>
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <input type="submit" name="register" class="btn btn-primary btn-block" value="Register">
          </div>
          <!-- /.col -->
        </div>
      </form>

 <!-- <div class="social-auth-links text-center">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i>
          Sign up using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i>
          Sign up using Google+
        </a>
      </div> -->

      <a href="login.php" class="text-center">I already have an account</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jquery-validation -->
<script src="plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="plugins/jquery-validation/additional-methods.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<script type="text/javascript">
$(document).ready(function () {
 /* $.validator.setDefaults({
    submitHandler: function () {
      alert( "Form successful submitted!" );
    }
  });*/
  $('#quickForm').validate({
    rules: {
	  admin_user_nm: {
		  required: true,
	  },
      admin_email: {
        required: true,
        admin_email: true,
      },
      admin_password: {
        required: true,
        minlength: 5
      },
	  admin_rpassword: {
		  required: true,
		  minlength: 5
	  },
      terms: {
        required: true
      },
    },
    messages: {
	  admin_user_nm: {
		required: "Please enter a user name",
	  },
      admin_email: {
        required: "Please enter a email address",
        admin_email: "Please enter a vaild email address"
      },
      admin_password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
	  admin_rpassword: {
		  required: "Please enter a confirm password",
		  minlength: "Your password must be at least 5 characters long"
	  },
      terms: "Please accept our terms"
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.input-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>
</body>
</html>
