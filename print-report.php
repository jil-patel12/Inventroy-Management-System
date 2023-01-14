<?php
    $reportType = $_GET["reportType"];
    $sd = $_GET["startDate"];
    $ed = $_GET["endDate"];
    session_start();
    ob_start();
    if($reportType == "purchaseorder" || $reportType == "purchaseorderdetails"){
        include("function-purchase-Report.php");
    }
    else{
        include("function-sales-Report.php");
    }

    $actived="Reports";
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon"  href="dist/images/favicon.png" type="image/png">
  <title>Peedee Electronics | Print Purchase Report</title>
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
            <h1>Print Report</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home.php"><i class="fas fa-home"></i> Home</a></li>
              <li class="breadcrumb-item active">Reports</li>
              <li class="breadcrumb-item active">Print</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
   <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                    <img src="dist/images/product/PD-Logo.png" alt="PDElectronics Logo" height="40px" class="brand-image">
                  <h4>
                    <!-- <i class="fas fa-globe"></i> AdminLTE, Inc. -->
                    <small class="float-right">Date: <?php echo date("d/m/Y") ?></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  <address>
                    3/9, Rachana, Station Road,<br> 
                    Navsari, Gujarat - 396445<br>
                    Phone: (02637) 257020<br>
                    Email: pdelectronics@gmail.com
                  </address>
                </div>
                <!-- /.col -->
                
                <!-- /.col -->
                <?php
                    if($reportType=="purchaseorder"){
                ?>
                        <div class="col-sm-4 invoice-col">
                            <h5><b>Report Type: <a style="color:blue;">Purchase Order<a></b></h5><br>
                        </div>
                <?php
                    }
                    else if($reportType=="purchaseorderdetails"){
                ?>
                        <div class="col-sm-4 invoice-col">
                            <h6><b>Report Type: <a style="color:blue;">Purchase Order Details<a></b></h6><br>
                        </div>
                <?php
                    }
                    else if($reportType=="salesorder"){
                ?>
                        <div class="col-sm-4 invoice-col">
                            <h5><b>Report Type: <a style="color:blue;">Sales Order<a></b></h5><br>
                        </div>
                <?php
                    }
                    else{
                ?>
                        <div class="col-sm-4 invoice-col">
                            <h6><b>Report Type: <a style="color:blue;">Sales Order Details<a></b></h6><br>
                        </div>
                <?php   
                    }
                ?>
                <!-- /.col -->
              </div>
              <!-- /.row -->
                
            <?php
                if($reportType=="purchaseorder"){
            ?>
                <!-- Table row -->
                <div class="row">
                    <div class="col-12 table-responsive">
                        <?php
                            getReportData($sd,$ed);
                        ?>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            <?php
                }
                else if($reportType=="purchaseorderdetails"){
            ?>
                <!-- Table row -->
                <div class="row">
                    <div class="col-12 table-responsive">
                        <?php
                            getPurchaseDetailsData($sd,$ed);
                        ?>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            <?php
                }
                else if($reportType=="salesorder"){
            ?>
                <!-- Table row -->
                <div class="row">
                    <div class="col-12 table-responsive">
                        <?php
                            getSalesData($sd,$ed);
                        ?>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            <?php
                }
                else{
            ?>
                <!-- Table row -->
                <div class="row">
                    <div class="col-12 table-responsive">
                        <?php
                            getSalesDetailsData($sd,$ed)
                        ?>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            <?php   
                }
            ?>
              

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                    <Button name="print" class="btn btn-default" id="print" onclick="pagePrint()"><i class="fas fa-print"></i>Print</Button>
                  <!-- <a href="#" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a> -->
                  <!-- <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                    Payment
                  </button>
                  <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generate PDF
                  </button> -->
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  

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
<script type="text/javascript"> 
    function pagePrint(){
        window.print();
    }
//   window.addEventListener("click", window.print());
</script>
</body>
</html>
