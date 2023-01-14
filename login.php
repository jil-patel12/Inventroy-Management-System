<?php 
include'db_connect.php'; 
  
	if(isset($_POST['login'])) {
		$email = $_POST['email'];
		$password = md5($_POST['password']);
	
		$sql = mysqli_query($con,"SELECT * FROM admin_master WHERE admin_email ='$email' AND admin_password ='$password'");
	    if(mysqli_num_rows($sql) >0) {
			$row = mysqli_fetch_assoc($sql);
			$_SESSION['id'] = $row['admin_id'];
			$_SESSION['name'] = $row['admin_user_nm'];
			 header('location:home.php');
		}else{
			echo "<script>alert('Login fail');</script>";
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon"  href="dist/images/favicon.png" type="image/png">
  <title>Peedee Electronics - Login</title>
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
  
<style>
a:link {
  text-decoration: none;
}

a:visited {
  text-decoration: none;
}

a:hover {
  text-decoration: underline;
}

a:active {
  text-decoration: underline;
}
</style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="home.php"><img src="dist/images/product/PD-Logo.png" alt="brand image" width='250px'></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="#" method="post" id="quickForm">
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" id="exampleInputEmail1" autocomplete="off" placeholder="Enter email" >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-6">
            <div class="icheck-primary">
              <input type="checkbox" name="remember_me" id="remember_me" value="1">
              <label for="remember_me" id="remember">
                Remember Me
              </label>
            </div>
		  </div>
          <!-- /.col -->
          <div class="col-12">
            <input type="submit" class="btn btn-primary btn-block" name="login" value="LOGIN">
          </div>
          <!-- /.col -->
        </div>
      </form></br>
          
      <p class="mb-1 text-center">
        <a href="forgot-password.php">Forgot password?</a>
      </p>	  
      <p class="mb-0">
        <p class="text-center">Don't have an account?<a href="register.php"> Sign Up</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

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
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
        minlength: 5
      },
    },
    messages: {
      email: {
        required: "Please enter a email address",
        email: "Please enter a vaild email address"
      },
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
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
