<?php if(empty($_SESSION['id'])){
	header('location:login.php');
}	//check login 
?>
 <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="home.php" class="nav-link">Home</a>
      </li>
	    <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
     
    </ul>

    <!-- SEARCH FORM -->
    <!--<form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>-->

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
          <img src="dist/img/user2-160x160.jpg" class="user-image img-circle elevation-2" alt="User Image">
          <span class="d-none d-md-inline"><?php echo $_SESSION['name']; ?></span>
        </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <!-- User image -->
          <li class="user-header bg-primary">
            <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">

            <p>
              <?php echo $_SESSION['name']; ?>- Web Developer
              <small>Member since Jan. 2020</small>
            </p>
          </li>
          <!-- Menu Body -->
          <!-- Menu Footer-->
          <li class="user-footer">
            <a href="profile.php" class="btn btn-outline-info btn-flat">Profile</a>
            <a href="logout.php" class="btn btn-outline-danger btn-flat float-right" onclick="return confirm('Are you sure you wan\'t to logout?');" >Sign out</a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>