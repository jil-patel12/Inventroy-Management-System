<?php 
include'db_connect.php';
include("function-sales.php");
$actived="Sales Order";
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon"  href="dist/images/favicon.png" type="image/png">
  <title>Peedee Electronics - Dashboard | Sales Orders</title>
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
  <link href="bsdatepicker/css/gijgo.min.css" rel="stylesheet" type="text/css">
</head>
<body class="hold-transition sidebar-mini">
<script type="text/javascript">
	function generateReceipt(getID)
	{
		var c = Math.floor((Math.random() * 10000) + 1);
		    c = "SO-" + c.toString() ;
			document.getElementById('orderno').setAttribute('value', c);
	}
	function delrow(no) {
		var row  = document.getElementById(no);
		row.parentNode.removeChild(row);
	}
	function actquantity(rowno)
	{
		  rowno = rowno.replace('qua[','');
          rowno = rowno.replace(']','');
        //alert(rowno);
          var qua,price,unitprice;
		  qua = parseInt(document.getElementById("qua["+rowno+"]").value);
          stk = parseInt(document.getElementById("stock["+rowno+"]").value)
		  
		  if(stk >= qua)
		  {
			  document.getElementById('errmsg['+rowno+']').innerHTML="<a class='btn btn-primary'><i class='fa fa-check'>Ok</i></a>";
		      unitprice = document.getElementById("price["+rowno+"]").value;
              //alert(qua);
              
			  price = qua*unitprice;
		
		      document.getElementById("amt["+rowno+"]").setAttribute('value', price);
		
		      var x = document.getElementById("addrow1").getAttribute("name");
              x = parseInt(x);
              var total = 0;
              for(i = 1;i < x; i++ )
				  {
					  if(document.getElementById('amt['+i+']'))
					  {
						  var val = document.getElementById('amt['+i+']').value;
                          val = parseFloat(val);
                          total = val + total;
					  }
				  }
				  document.getElementById('bill_amount').setAttribute('value', total);
		  }
		  else
		  {
			  document.getElementById('errmsg['+rowno+']').innerHTML="<a class='btn btn-danger'><i class='fas fa-times'>Quantity Must be Less Or Equal To stock</i></a>";
		  }
	}
						  
	function resetValue(rowno)
	{
		var x = document.getElementById("addrow1").getAttribute("name");
		var total = 0;
		for(i = 1;i < x; i++ ){
			if(document.getElementById('amt['+i+']')){
				var val = document.getElementById('amt['+i+']').value;
                    val = parseFloat(val);
                    total = val + total;
			}
		}
		document.getElementById('bill_amount').setAttribute('value', total);
	}

  
	function finalamount()
	{
		var bill_amount =  parseFloat(document.getElementById('bill_amount').value); 
        selectElement = document.querySelector('#GST'); 
                      
        var GST = parseFloat(selectElement.value);
        var gstamt = (bill_amount*GST)/100;        
        var dis =  String(document.getElementById('discount').value);
        var lenDis = dis.length;
        var disamt;
        if(dis[lenDis - 1] == "%"){
          val = dis.replace("%","");
          val = parseFloat(val);
          // window.alert(val);
          dis =val;
          // window.alert(dis);
          disamt = (bill_amount*dis)/100;
        }
        else{
          disamt = parseFloat(dis);
        }
        var ship =  parseFloat(document.getElementById('shipping').value); 
        var total_amount = bill_amount+gstamt+ship-disamt;              
        document.getElementById('total_amount').setAttribute('value', total_amount);
	}
	
	function getprice(gid,rowno)
	{
		if (gid== 0) {
			document.getElementById("state").innerHTML = "";
            return;
            } else {
				var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    var a = xmlhttp.responseText;
					a = a.split(",");
                    document.getElementById("price["+rowno+"]").setAttribute('value', a[0]);
					document.getElementById("stock["+rowno+"]").setAttribute('value', a[1]);
					}
				};
				xmlhttp.open("GET", "ajax/getsprice.php?pid="+gid, true);
                xmlhttp.send();
				}
	}
	
	function addRow1(no)
	{
		var app;
		
		app= '<tr id="row_'+no+'">';
		<?php
            $prd = mysqli_query($con,"select * from product_master where stock>0");
            //$prow = mysqli_fetch_array($prd); 
        ?>
            app+='<td><select class="form-control" id="'+no+'" name="product_name['+no+']" style="width:300px;" onchange="getprice(this.value,this.id);"><option>Select Product</option>';
            <?php 
                
            while($prow = mysqli_fetch_array($prd))
            {  
             ?>
              app+='<option value="<?php echo $prow['product_id']; ?>"> <?php echo $prow['product_name']; ?> </option>';
            <?php } 
                ?>
				app+='</select></td>';
				
				app+='<td><input type="text" style="width:100px;" name="price['+no+']" id="price['+no+']" readonly></td>';
                app+='<td><input type="text" style="width:80px; name="stock['+no+']" id="stock['+no+']" readonly></td>';
                app+='<td><input type="text" name="qua['+no+']" id="qua['+no+']" style="width:100px;"  onkeyup="actquantity(this.id);"><br/><label id="errmsg['+no+']"></label></td>';				
                app+='<td><input type="text" name="amt['+no+']" id="amt['+no+']" style="width:100px;" readonly style="background-color: #D8FDBA"></td>'; 
				
				app +='<td><a class="btn btn-danger" id="delete" name="row_'+no+'" value="Delete Row" onclick="delrow(this.name);resetValue(this.name);finalamount();" ><i class="fas fa-times"> Remove</i></a></td></tr>';
				
				$("#prdtbl").append(app);
				
				no = parseInt(no);
                no = no + 1;
                document.getElementById('addrow1').setAttribute('name', no);
                $('.desc').msDropDown();
	}
   		
		
</script>
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
            <h1>Add New Sales Orders</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Sales Orders</li>
			  <li class="breadcrumb-item active">Add Sales Orders</li>
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
            <div class="card">
              <div class="card-header">
                <h3>Add Sales Orders
				  <a href="saleorder.php" class="btn btn-success float-right btn-sm"><i class="fas fa-list"></i> Sales Orders List</a>
				</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="saleorderaddcode.php" method="post" id="createOrderForm" role="form" enctype="multipart/form-data">
                <div class="card-body">
				 <div class="form-group">
                  <label class="col-md-12">Customer Name</label>
				  <div class="col-md-8">
                  <select name="customer_id" class="form-control select2bs4" id="customer_id" style="width: 100%;" required>
                    <option selected="selected">Select Customer</option>
                    <?php
						$csql = mysqli_query($con, "SELECT * FROM customer_master where Is_Deleted=0")or die(mysqli_error($con));
						while($crow = mysqli_fetch_assoc($csql)){
					?>
                    <option value="<?php echo $crow['customer_id']; ?>"><?php echo $crow['cust_name']; ?></option>
						<?php }?>
                  </select>
				  </div>
                 </div>
				 <div class="form-group">
				  <label class="col-md-12">Sales Order Date</label>
				      <div class="col-md-6">
					  <input type="text" name="order_date" id="datepicker" class="form-control" placeholder="dd/mm/yyyy">
					  </div>
                 </div>				
				 <div class="form-group">
                      <label class="col-md-12">Receipt No:</label>
					  <div class="col-md-6">
					  <button type="button" class="btn bg-gradient-primary" id="gorderno" onclick="generateReceipt(this.id);"><i class="fas fa-cog"></i> Generate Receipt</button>
                      <input type="text" name="receipt_no" class="form-control" id="orderno" readonly required>
					  </div>
                 </div>
				 <table border="1px solid black" cellpadding="0" cellspacing="0" class="table table-bordered table-striped" id="prdtbl" style="width:100%">
				      <thead>
					  <tr>
                        <th colspan="10">
                        <a id="addrow1" style="color:blue;" name="1" value="Add Row" onclick="addRow1(this.name);"><strong>
                          <i class="fas fa-plus"> Add More Item
                          </i></strong>
                        </a>
                         </th>
                      </tr>
					  <tr>
					    <th>Product Name</th>
						<th>Unit Price</th>
						<th>Stock</th>
						<th>Quantity</th>						
						<th>Product Price</th>
						<th>Action</th>
					  </tr>
					  </thead>
				 </table><br>
				  <div class="form-group">
                    <label class="col-md-12">Sub Total</label>
					 <div class="col-md-6">
                    <input type="text" name="bill_amount" value="0" class="form-control" id="bill_amount" readonly style="background-color: #D8FDBA">
					</div>
                  </div>
				  <div class="form-group">
            <label class="col-md-12">GST</label>
            <div class="col-md-6">
              <!-- <input type="text" name="GST" class="form-control" id="GST" placeholder="for e.g 18%" required> -->
              <select name="GST" id="GST" class="form-control" required>
                <option selected disabled>Select one</option>
                <?php
                  getGSTPercentage();
                ?>
              </select>
            </div>
          </div>
				  <div class="form-group">
                    <label class="col-md-12">Discount</label>
					 <div class="col-md-6">
                    <input type="text" name="discount" class="form-control" id="discount" placeholder="for e.g 10% or in rupee eg. 100" required>
					</div>
                  </div>
				  <div class="form-group">
                    <label class="col-md-12">Shipping</label>
					 <div class="col-md-6">
                    <input type="text" name="shipping" class="form-control" id="shipping" onblur="finalamount();"	required>
					</div>
                  </div>
				  <div class="form-group">
                    <label class="col-md-12">Total Amount(₨)</label>
					 <div class="col-md-6">
                    <input type="text" name="total_amount" class="form-control" id="total_amount" readonly style="background-color: #D8FDBA">
					</div>
                  </div>
				  <div class="form-group">
                    <label class="col-md-12">Payment Status</label>
				    <div class="col-md-6">
                    <select name="payment_status" class="form-control custom-select" required>
                      <option selected disabled>Select one</option>
                      <option value="paid">Paid</option>
					            <option value="unpaid">UnPaid</option>
                      <!--<option>Canceled</option>-->                    
                    </select>
                    </div>
				  </div>
				  <div class="form-group">
                    <label class="col-md-12">Order Status</label>
				    <div class="col-md-6">
                    <select name="order_status" class="form-control custom-select" required>
                      <option selected disabled>Select one</option>
					  <option value="Shipped" <span class="badge badge-success">Shipped</span></option>
                      <option value="Pending">Pending</option>
					  <option value="Delivered">Delivered</option>
                      <option value="Dispatch">Dispatch</option>                      
					  <option value="Cancelled">Cancelled</option>
                    </select>
                    </div>
				  </div>
				  <div class="form-group">
                    <label class="col-md-12">Receive By</label>
					 <div class="col-md-6">
                    <input type="text" name="receive_by" class="form-control" id="receive_by" placeholder="" required>
					</div>
                  </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <input type="submit" name="salesorder_add" class="btn btn-primary btn-lg" value="Submit Sales">
				  <input type="reset" class="btn btn-default btn-lg float-right" value="Clear">
                </div>
              </form>
			  </div>
            </div>
            <!-- /.card -->
         </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
	
	<a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
      <i class="fas fa-chevron-up"></i>
    </a>
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
<script src="bsdatepicker/js/gijgo.min.js" type="text/javascript"></script>
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
	
  });
  
</script>
<script>
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4',
			format :"dd-mm-yyyy"
        });
</script>
</body>
</html>
