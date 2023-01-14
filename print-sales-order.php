<?php
    $salesId = $_GET["salesId"];
    session_start();
    ob_start();
    include("function-print-sales-order.php");
    $actived="Sales Order";
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon"  href="dist/images/favicon.png" type="image/png">
  <title>Peedee Electronics | Print Sales Order Details</title>
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
            <h1>Print</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home.php"><i class="fas fa-home"></i> Home</a></li>
              <li class="breadcrumb-item active">Sales</li>
              <li class="breadcrumb-item active">View Sales Order Details</li>
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
            <div class="callout callout-info">
              <h5><i class="fas fa-info"></i> Note:</h5>
              This page has been enhanced for printing. Click the print button at the bottom of the invoice.
            </div>


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
                  From
                  <address>
                    3/9, Rachana, Station Road,<br> 
                    Navsari, Gujarat - 396445<br>
                    Phone: (02637) 257020<br>
                    Email: pdelectronics@gmail.com
                  </address>
                </div>
                <!-- /.col -->
                <?php
                    $customerInfo = getCustomerInfo($salesId);
                ?>
                <div class="col-sm-4 invoice-col">
                  To
                  <address>
                    <strong><?php echo $customerInfo["cust_name"]; ?></strong><br>
                    <?php echo $customerInfo["cust_address"]; ?></br>
                    Phone: <?php echo $customerInfo["cust_contact"] ?><br>
                    Email: <?php echo $customerInfo["cust_email"] ?>
                  </address>
                </div>
                <!-- /.col -->
                <?php
                    $orderInfo = getOrderInfo($salesId);
                ?>
                <div class="col-sm-4 invoice-col">
                  <b>Invoice <?php echo $orderInfo["receipt_no"]; ?></b><br>
                  <br>
                  <b>Order ID:</b> <?php echo $salesId; ?><br>
                  <!-- <b>Payment Due:</b> 2/22/2014<br>
                  <b>Account:</b> 968-34567 -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
                
              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Qty</th>
                      <th>Product Name</th>
                      <th>Serial #</th>
                      <th>Subtotal</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            $totamt = getOrderDetails($salesId);
                        ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  <p class="lead">Payment Methods:</p>
                  <img src="dist/img/credit/visa.png" alt="Visa">
                  <img src="dist/img/credit/mastercard.png" alt="Mastercard">
                  <img src="dist/img/credit/american-express.png" alt="American Express">
                  <img src="dist/img/credit/paypal2.png" alt="Paypal">

                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                    Note:</br> 
                    1) Due date of Payment is 10 days within date of bill date.</br>
                    2) This is computer generated copy not requries signature.
                </p>
            
                </div>
                <!-- /.col -->
                <div class="col-6">
                  <!-- <p class="lead">Amount Due 2/22/2014</p> -->

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td>Rs <?php echo $totamt; ?></td>
                      </tr>
                      <tr>
                        <th>GST (<?php echo $orderInfo["GST"] ?>)</th>
                        <td>
                            <?php
                                $gst = "{$orderInfo["GST"]}";
                                $gst = (int)substr($gst,0,2);
                                $gstamt = ($totamt*$gst)/100;
                                echo "Rs. " . $gstamt;
                            ?>
                        </td>
                      </tr>
                      <tr>
                        <th>Shipping:</th>
                        <td><?php echo "Rs. " . $shipping = $orderInfo["shipping"]; ?></td>
                      </tr>
                      <tr>
                        <th>Discount:</th>
                        <td>
                            <?php 
                                $discount = $orderInfo["discount"];
                                $dis1= NULL;
                                if(strpos($discount,"%")){
                                    $dis = str_replace("%","",$discount);
                                    $dis = (int)$discount;
                                    echo "Rs. " . $dis1 = ($totamt*$discount)/100;
                                }
                                else{
                                    echo "Rs. " . $dis1=$discount;
                                } 
                            ?>
                        </td>
                      </tr>
                      <tr>
                        <th>Total:</th>
                        <td><?php echo "Rs. " . $finalamt = ($totamt + $gstamt + $shipping) - $dis1;  ?></td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <a href="print-sales.php?salesId=<?php echo $salesId; ?>" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
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
</body>
</html>
