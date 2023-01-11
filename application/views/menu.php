<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#" role="button" id="header-title"></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="Controller_login/logout" role="button">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>

        </li>
    </ul>
</nav>
<!-- /.navbar -->

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
        <span class="brand-text font-weight-light">HYOO NAILS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item" id="nav-home">
                    <a href="<?php echo base_url() ?>Controller_main" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p id="title-header">Home</p>
                    </a>
                </li>
                <li class="nav-item"  id="nav-transaksi">
                    <a href="<?php echo base_url() ?>Controller_transaksi" class="nav-link">
                        <i class=" nav-icon fas fa-exchange-alt"></i>
                        <p id="title-header">Transaksi</p>
                    </a>
                </li>
                <li class="nav-item"  id="nav-user">
                    <a href="<?php echo base_url() ?>Controller_user" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p id="title-header">Data User</p>
                    </a>
                </li>
                <li class="nav-item"  id="nav-warna">
                    <a href="<?php echo base_url() ?>Controller_warna" fieldname="Data Warna" class="nav-link">
                        <i class="nav-icon fas fa-list"></i>
                        <p id="title-header">Data Warna</p>
                    </a>
                </li>
                <li class="nav-item"  id="nav-produk">
                    <a href="<?php echo base_url() ?>Controller_produk" fieldname="Data Produk" class="nav-link">
                        <i class="nav-icon fas fa-list"></i>
                        <p id="title-header">Data Produk</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>