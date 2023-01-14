<?php 
session_start();
ob_start();
$actived="Reports";
include("function-purchase-report.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon"  href="dist/images/favicon.png" type="image/png">
  <title>Peedee Electronics - Purchase Report</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  
  <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link href="bsdatepicker/css/gijgo.min.css" rel="stylesheet" type="text/css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
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
            <h1>Purchase Report</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Purchase Report</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Starting Date</h3>
                </div>
                <div class="card-body">
                <form id="report" action="purchasereport.php" method="post">
                  <!-- Date range -->
                  <div class="form-group">

                    <div class="input-group">
                      <div class="input-group-prepend">
                      </div>
                      <input type="text" name="startdate" id="startdate" class="form-control datepicker" placeholder="dd/mm/yyyy">
                    </div>
                    <!-- /.input group -->
                  </div>
                  <!-- /.form group -->
                  
                  <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                      </div>
                      <input type="text" name="enddate" id="enddate" class="form-control datepicker1" placeholder="dd/mm/yyyy">
                    </div>
                    <!-- /.input group -->
                  </div>

                  <div class="form-group">
                    <div class="input-group">
                      <!-- <form id="report" action="purchasereport.php" method="post"> -->
                        <input type="submit" class="btn btn-success float-sm-right" name="generatereport" value="Generate Report">
                      <!-- </form> -->
                    </div>
                    <!-- /.input group -->
                  </div>
                  </form>
                  <div class="form-group">
                    <?php
                      if(isset($_POST["generatereport"])){
                        $startDate = $_POST["startdate"];
                        $endDate = $_POST["enddate"];
                        header("location:print-report.php?reportType=purchaseorder&startDate=$startDate&endDate=$endDate");
                      }
                    ?>
                    
                  </div>
                </div>
                <!-- /.card-body -->
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
<!-- DataTables -->
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- date-range-picker -->
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<script src="bsdatepicker/js/gijgo.min.js" type="text/javascript"></script>

<script>
        $('.datepicker').datepicker({
            uiLibrary: 'bootstrap4',
			format :"dd-mm-yyyy"
        });
</script>
<script>
        $('.datepicker1').datepicker({
            uiLibrary: 'bootstrap4',
			format :"dd-mm-yyyy"
        });
</script>
</body>
</html>
