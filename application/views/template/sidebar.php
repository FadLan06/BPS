<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <div class="sidebar-brand-icon rotate-n-15">
                <img src="<?= base_url() ?>assets/img/BPS.png" width="50" alt="">
            </div>
            <div class="sidebar-brand-text mx-3">SI RABA <sup>1</sup></div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <?php $query = $this->db->get_where('user', ['role_id' => $this->session->userdata('role_id')])->row(); ?>
        <?php if ($query->role_id == 1) : ?>

            <?php if ($title == 'Dashboard') : ?>
                <!-- Nav Item - Dashboard -->
                <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url('Admin') ?>">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span></a>
                </li>
            <?php else : ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('Admin') ?>">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span></a>
                </li>
            <?php endif; ?>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Data Master
            </div>

            <?php if ($title == 'Data Pegawai') : ?>
                <!-- Nav Item - Tables -->
                <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url('Admin/Pegawai') ?>">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Data Pegawai</span></a>
                </li>
            <?php else : ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('Admin/Pegawai') ?>">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Data Pegawai</span></a>
                </li>
            <?php endif; ?>

            <?php if ($title == 'Data POK') : ?>
                <!-- Nav Item - Tables -->
                <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url('Admin/POK') ?>">
                        <i class="fas fa-fw fa-chart-bar"></i>
                        <span>Data POK</span></a>
                </li>
            <?php else : ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('Admin/POK') ?>">
                        <i class="fas fa-fw fa-chart-bar"></i>
                        <span>Data POK</span></a>
                </li>
            <?php endif; ?>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <div class="sidebar-heading">
                Pegawai
            </div>

            <?php if ($title == 'Permintaan') : ?>
                <!-- Nav Item - Tables -->
                <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url('Admin/Permin') ?>">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Permintaan</span></a>
                </li>
            <?php else : ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('Admin/Permin') ?>">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Permintaan</span></a>
                </li>
            <?php endif; ?>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <div class="sidebar-heading">
                PPK
            </div>

            <?php if ($title == 'Data Permintaan') : ?>
                <!-- Nav Item - Tables -->
                <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url('PPK/Permin') ?>">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Data Permintaan</span></a>
                </li>
            <?php else : ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('PPK/Permin') ?>">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Data Permintaan</span></a>
                </li>
            <?php endif; ?>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <div class="sidebar-heading">
                Kepala
            </div>

            <?php if ($title == 'Data Permintaan') : ?>
                <!-- Nav Item - Tables -->
                <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url('Kepala/Permin') ?>">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Data Permintaan</span></a>
                </li>
            <?php else : ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('Kepala/Permin') ?>">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Data Permintaan</span></a>
                </li>
            <?php endif; ?>

        <?php elseif ($query->role_id == 2) : ?>

            <?php if ($title == 'Home') : ?>
                <!-- Nav Item - Dashboard -->
                <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url('Pegawai') ?>">
                        <i class="fas fa-fw fa-user"></i>
                        <span>Home</span></a>
                </li>
            <?php else : ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('Pegawai') ?>">
                        <i class="fas fa-fw fa-user"></i>
                        <span>Home</span></a>
                </li>
            <?php endif; ?>

            <hr class="sidebar-divider">

            <div class="sidebar-heading">
                Pegawai
            </div>

            <?php if ($title == 'Form Permintaan') : ?>
                <!-- Nav Item - Tables -->
                <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url('Pegawai/FormPer') ?>">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Form Permintaan</span></a>
                </li>
            <?php else : ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('Pegawai/FormPer') ?>">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Form Permintaan</span></a>
                </li>
            <?php endif; ?>

            <?php if ($title == 'Permintaan') : ?>
                <!-- Nav Item - Tables -->
                <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url('Pegawai/Permin') ?>">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Permintaan</span></a>
                </li>
            <?php else : ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('Pegawai/Permin') ?>">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Permintaan</span></a>
                </li>
            <?php endif; ?>

            <!-- Divider -->

        <?php elseif ($query->role_id == 3) : ?>

            <?php if ($title == 'Home') : ?>
                <!-- Nav Item - Dashboard -->
                <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url('PPK') ?>">
                        <i class="fas fa-fw fa-user"></i>
                        <span>Home</span></a>
                </li>
            <?php else : ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('PPK') ?>">
                        <i class="fas fa-fw fa-user"></i>
                        <span>Home</span></a>
                </li>
            <?php endif; ?>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <div class="sidebar-heading">
                PPK
            </div>

            <?php if ($title == 'Data Permintaan') : ?>
                <!-- Nav Item - Tables -->
                <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url('PPK/Permin') ?>">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Data Permintaan</span></a>
                </li>
            <?php else : ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('PPK/Permin') ?>">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Data Permintaan</span></a>
                </li>
            <?php endif; ?>

        <?php elseif ($query->role_id == 5) : ?>

            <?php if ($title == 'Home') : ?>
                <!-- Nav Item - Dashboard -->
                <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url('Kepala') ?>">
                        <i class="fas fa-fw fa-user"></i>
                        <span>Home</span></a>
                </li>
            <?php else : ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('Kepala') ?>">
                        <i class="fas fa-fw fa-user"></i>
                        <span>Home</span></a>
                </li>
            <?php endif; ?>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <?php if ($title == 'Data Permintaan') : ?>
                <!-- Nav Item - Tables -->
                <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url('Kepala/Permin') ?>">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Data Permintaan</span></a>
                </li>
            <?php else : ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('Kepala/Permin') ?>">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Data Permintaan</span></a>
                </li>
            <?php endif; ?>

        <?php endif; ?>



        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Auth
        </div>

        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('Auth/logout') ?>">
                <i class="fas fa-fw fa-sign-out-alt"></i>
                <span>Logout</span></a>
        </li>

        <hr class="sidebar-divider d-none d-md-block">
        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->