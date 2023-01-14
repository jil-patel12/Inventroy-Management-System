  <aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="dist/images/product/PD-Logo.png" alt="PDElectronics Logo" class="brand-image"
           style="opacity: .8;width: 70%;margin-left: 35px;margin-right: 35px;">
      <span class="brand-text font-weight-light"></br></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['name']; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="home.php" class="nav-link <?php if($actived=='dashboard'){echo 'active';} ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li> 
		  <li class="nav-item has-treeview">
            <a href="#" class="nav-link <?php if($actived=='Users'){echo 'active';} ?>">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Users
              <i class="fas fa-angle-left right"></i>
              <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="user.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Users</p>
                </a>
              </li>
            </ul>
          </li>
		  <li class="nav-item">
            <a href="product.php" class="nav-link <?php if($actived=='Product'){echo 'active';} ?>">
              <i class="nav-icon fab fa-product-hunt"></i>
              <p>
                Products
              </p>
            </a>
          </li>
		  <li class="nav-item">
            <a href="brand.php" class="nav-link <?php if($actived=='brand'){echo 'active';} ?>">
              <i class="nav-icon fab fa-btc"></i>
              <p>
                Brands
              </p>
            </a>
          </li>
		  <li class="nav-item">
            <a href="category.php" class="nav-link <?php if($actived=='Category'){echo 'active';} ?>">
              <i class="nav-icon fas fa-list-ul"></i>
              <p>
                Category
              </p>
            </a>
          </li>
		   <li class="nav-item">
            <a href="unit.php" class="nav-link <?php if($actived=='Unit'){echo 'active';} ?>">
              <i class="nav-icon fas fa-circle"></i>
              <p>
                Units
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="view-gst.php" class="nav-link <?php if($actived=='GST Percentage'){echo 'active';} ?>">
              <i class="nav-icon fas fa-percent"></i>
              <p>
                GST Percentage(%)
              </p>
            </a>
          </li>
		  <li class="nav-item">
            <a href="customer.php" class="nav-link <?php if($actived=='Customer'){echo 'active';} ?>">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Customers
              </p>
            </a>
          </li>
		   <li class="nav-item">
            <a href="saleorder.php" class="nav-link <?php if($actived=='Sales Order'){echo 'active';} ?>">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Sales Orders
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="vendor.php" class="nav-link <?php if($actived=='Vendor'){echo 'active';} ?>">
              <i class="nav-icon fas fa-store"></i>
              <p>
                Vendors
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="purchase.php" class="nav-link <?php if($actived=='Purchase Order'){echo 'active';} ?>">
              <i class="nav-icon fas fa-shopping-bag"></i>
              <p>
                Purchase Orders
              </p>
            </a>
          </li>
          
          
		  
		 
			<li class="nav-item has-treeview">
            <a href="#" class="nav-link" class="nav-link <?php if($actived=='Reports'){echo 'active';} ?>">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Reports
              <i class="fas fa-angle-left right"></i>
              <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="purchasereport.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Purchase Order</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="purchaseorderdetailsreport.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Purchase Order Details</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="salesreport.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sales Order</p>
                </a>
              </li>  
              <li class="nav-item">
                <a href="salesorderdetailsreport.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sales Order Details</p>
                </a>
              </li>
            </ul>
          </li>
			
     
         </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>