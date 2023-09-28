<style>
  .user-img {
    position: absolute;
    height: 45px;
    width: 45px;
    object-fit: cover;
    left: -13%;
    top: -20%;
  }

  .btn-rounded {
    border-radius: 50px;
  }
</style>
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar border border-light border-top-0  border-left-0 border-right-0 navbar-light text-sm ">
  <!-- Left navbar links -->
  <ul class="navbar-nav">

    <li class="nav-item d-none d-sm-inline-block">
      <a href="<?php echo base_url ?>" class="nav-link text-white text-bold "><?php echo (!isMobileDevice()) ? $_settings->info('name') : $_settings->info('short_name'); ?></a>
    </li>
  </ul>
  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Navbar Search -->
    <!-- <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
              <form class="form-inline">
                <div class="input-group input-group-sm">
                  <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                  <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                    </button>
                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                    <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </li> -->
    <!-- Messages Dropdown Menu -->
    <li class="nav-item">
      <div class="btn-group nav-link mb-3 p-1">
        <button type="button" class="btn mr-4 btn-rounded  btn-outline-info dropdown-toggle dropdown-icon " data-toggle="dropdown">
          <span><img src="<?php echo validate_image($_settings->userdata('avatar')) ?>" class="img-circle elevation-2 user-img" alt="User Image"></span>
          <span class="ml-3 text-bold text-white "><?php echo ucwords($_settings->userdata('firstname') . ' ' . $_settings->userdata('lastname')) ?></span>
          <span class="sr-only">Toggle Dropdown</span>
        </button>
        <div class="dropdown-menu ml-4 mt-1" role="menu">
          <a class="dropdown-item" href="<?php echo base_url . 'admin/?page=user' ?>"><span class="fa fa-user"></span> My Account</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?php echo base_url . '/classes/Login.php?f=logout' ?>"><span class="fas fa-sign-out-alt"></span> Logout</a>
        </div>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars text-white text-bold size-32 "></i></a>
    </li>
    <!--  <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
            </a>
          </li> -->
  </ul>
</nav>
<!-- /.navbar -->
<style>
  .navbar {
    background-image: linear-gradient(to right top, #d16ba5, #c777b9, #ba83ca, #aa8fd8, #9a9ae1, #8aa7ec, #79b3f4, #69bff8, #52cffe, #41dfff, #46eefa, #5ffbf1);

    ;
  }
</style>