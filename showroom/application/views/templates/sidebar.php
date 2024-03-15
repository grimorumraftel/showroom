        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center">
                <div class="sidebar-brand-icon rotate-n-15">

                </div>
                <div class="sidebar-brand-text mx-2">Inventori Barang </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Heading -->
            <div class="sidebar-heading">
                Administrator
            </div>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('user/halaman_awal'); ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Data Master</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Data :</h6>
                        <a class="collapse-item" href="<?= base_url('user/barang_v'); ?>">Data Barang</a>
                        <a class="collapse-item" href="<?= base_url('user/jenis_v'); ?>">Jenis Barang </a>
                        <a class="collapse-item" href="<?= base_url('user/satuan_v'); ?>">Satuan Barang </a>
                        <a class="collapse-item" href="<?php echo base_url() . 'user/suplier_v'; ?>">Data Supplier</a>


                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Transaksi</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Transaksi:</h6>
                        <a class="collapse-item" href="<?= base_url('user/barang_masuk'); ?>">Barang Masuk</a>
                        <a class="collapse-item" href="<?= base_url('user/barang_keluar'); ?>">Barang Keluar </a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Laporan</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Laporan</h6>
                        <a class="collapse-item" href="<?= base_url('user/tampil_bm'); ?>">Laporan Barang Masuk</a>
                        <a class="collapse-item" href="<?= base_url('user/tampil_bk'); ?>">Laporan Barang Keluar </a>
                    </div>
                </div>
            </li>




            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                User
            </div>

            <?php if ($user['role_id'] == 1) { ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('admin/member'); ?>">
                        <i class="fas fa-fw fa-user"></i>
                        <span>Member</span></a>
                </li>
            <?php } ?>


            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('user/index'); ?>">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Pengguna</span></a>
            </li>

            <!-- <li class="nav-item">
                <a class="nav-link" href="<?= base_url('user/edit'); ?>">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Edit Profile</span></a>
            </li> -->

            <!-- Divider -->
            <hr class="sidebar-divider">

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('auth/logout'); ?>" data-toggle="modal" data-target="#logoutModal">

                    <i class="fas fa-fw fa-sign-out-alt"></i>
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