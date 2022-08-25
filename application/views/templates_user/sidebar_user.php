<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-fw fa-wrench"></i>
                </div>
                <div class="sidebar-brand-text mx-3">User</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url('user/data_user/') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('user/data_user/katalog') ?>">
                    <i class="fas fa-fw fa-database"></i>
                    <span>Katalog</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('user/data_user/pembelian') ?>">
                    <i class="fas fa-fw fa-database"></i>
                    <span>Pembelian</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('dashboard/logout') ?>">
                    <i class="fas fa-fw fa-database"></i>
                    <span>Logout</span></a>
            </li>
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
                <?php foreach ($user as $usr) : ?>
                    <?= $usr->nama_user; ?>
                <?php endforeach; ?>
                </nav>
                <!-- End of Topbar -->
