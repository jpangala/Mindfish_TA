<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
    <?php $username = $_SESSION['username'];?>


        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
          <?php if(isset($_SESSION['id_user'])) { ?>
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo site_url('dashboard/index') ?>">
                <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-fish"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Mindfish</div>
            </a>
            <li class="nav-item active">
                <a class="nav-link">

                    <span>Selamat datang <?php echo $username; ?>  !!</span>
                </a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->


            <!-- Heading -->

              <li class="nav-item active">
                  <a class="nav-link" href="<?php echo site_url('dashboard/'); ?>">
                      <i class="fas fa-columns"></i>
                      <span>Dashboard</span>
                  </a>
              </li>

            <li class="nav-item active">
                <a class="nav-link" href="<?php echo site_url('dashboard/task'); ?>">
                    <i class="fas fa-tasks"></i>
                    <span>Task</span>
                </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo site_url('dashboard/logout'); ?>">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </li>
          <?php } else { ?>

        <?php  } ?>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">



                        <div class="topbar-divider d-none d-sm-block"></div>



                    </ul>

                </nav>
                <!-- End of Topbar -->
