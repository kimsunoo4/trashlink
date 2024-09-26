<?php
require_once 'functions.php';
if (!_session('login'))
    header("location:login.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" type="image/png" href="assets/img/favicon.png">

    <title>TRASHLINK</title>

    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="assets/vendor/select2/css/select2.min.css" rel="stylesheet">
    <link href="assets/vendor/select2-bootstrap4-theme/select2-bootstrap4.min.css" rel="stylesheet">
    <style>
        .sidebar .sidebar-brand {
            font-size: 0.8rem;
        }
    </style>

    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/vendor/select2/js/select2.min.js"></script>
    <script>
        $(function() {
            $('select').select2({
                'theme': 'bootstrap4',
            });
        })
    </script>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="?">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-database"></i>
                </div>
                <div class="sidebar-brand-text mx-3">PASP</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->

            <li class="nav-item">
                <a class="nav-link" href="?m=home">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <li class="nav-item" <?= is_hidden('pengepul_profil') ?>>
                <a class="nav-link" href="?m=pengepul_profil">
                    <i class="fas fa-fw fa-address-book"></i>
                    <span>Profil Pengepul</span></a>
            </li>
            <li class="nav-item" <?= is_hidden('warga_profil') ?>>
                <a class="nav-link" href="?m=warga_profil">
                    <i class="fas fa-fw fa-address-book"></i>
                    <span>Profil Warga</span></a>
            </li>
            <li class="nav-item" <?= is_hidden('warga') ?>>
                <a class="nav-link" href="?m=warga">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Warga</span></a>
            </li>
            <li class="nav-item" <?= is_hidden('pengepul') ?>>
                <a class="nav-link" href="?m=pengepul">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Pengepul</span></a>
            </li>
            <li class="nav-item" <?= is_hidden('pengaduan') ?>>
                <a class="nav-link" href="?m=pengaduan">
                    <i class="fas fa-fw fa-signal"></i>
                    <span>Pengaduan</span></a>
            </li>
            <li class="nav-item" <?= is_hidden('tabungan') ?>>
                <a class="nav-link" href="?m=tabungan">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Tabungan</span></a>
            </li>
            <li class="nav-item" <?= is_hidden('saldo') ?>>
                <a class="nav-link" href="?m=saldo">
                    <i class="fas fa-fw fa-money-bill"></i>
                    <span>Saldo</span></a>
            </li>
            <li class="nav-item" <?= is_hidden('monitoring') ?>>
                <a class="nav-link" href="?m=monitoring">
                    <i class="fas fa-fw fa-signal"></i>
                    <span>Monitoring</span></a>
            </li>
            <li class="nav-item" <?= is_hidden('laporan') ?>>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#mnLaporan"
                    aria-expanded="true" aria-controls="mnLaporan">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Laporan</span>
                </a>
                <div id="mnLaporan" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Pengaduan:</h6>
                        <a class="collapse-item" href="?m=pengaduan_laporan">Pengaduan</a>
                        <a class="collapse-item" href="?m=pengaduan_per_hari">Pengaduan Per Hari</a>
                        <a class="collapse-item" href="?m=pengaduan_per_bulan">Pengaduan Per Bulan</a>
                        <h6 class="collapse-header">Tabungan:</h6>
                        <a class="collapse-item" href="?m=tabungan_laporan">Tabungan</a>
                        <a class="collapse-item" href="?m=tabungan_per_hari">Tabungan Per Hari</a>
                        <a class="collapse-item" href="?m=tabungan_per_bulan">Tabungan Per Bulan</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="aksi.php?act=logout">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Logout</span></a>
            </li>

            <hr class="sidebar-divider d-none d-md-block">
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

                    <ul class="navbar-nav">
                        <li class="nav-item">TRASHLINK</li>
                    </ul>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - Alerts -->
                        <?php
                        $rows = $db->getResults("SELECT * FROM tb_notif WHERE (level='$_SESSION[level]' AND ISNULL(id_user)) OR (level='$_SESSION[level]' AND id_user='$_SESSION[ID]') ORDER BY status_notif, id_notif DESC LIMIT 5");
                        $notif_count = 0;
                        foreach ($rows as $row) {
                            if ($row->status_notif == 0)
                                $notif_count++;
                        }
                        ?>
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter"><?= $notif_count ?></span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <?php foreach ($rows as $row): ?>
                                    <a class="dropdown-item <?= $row->status_notif ? '' : 'bg-danger text-white' ?> " href="aksi.php?act=notif_buka&id_notif=<?= $row->id_notif ?>"><?= $row->judul ?></a>
                                <?php endforeach ?>
                            </div>
                        </li>
                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <?php if (_session('login')) : ?>
                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= _session('login') ?> (<?= _session('level') ?>)</span>
                                    <img class="img-profile rounded-circle" src="assets/img/undraw_profile.svg">
                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="?m=password">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Password
                                    </a>
                                    <a class="dropdown-item" href="aksi.php?act=logout">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Logout
                                    </a>
                                </div>
                            </li>
                        <?php endif ?>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <?php
                    if (!_session('login') && !in_array($mod, array('', 'home', 'login', 'konsultasi', 'tabungan', 'subtabungan', 'warga')))
                        $mod = 'login';

                    if (file_exists($mod . '.php'))
                        include $mod . '.php';
                    else
                        include 'home.php';
                    ?>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; RumahSourceCode.Com <?= date('Y') ?></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <script src="assets/js/sb-admin-2.min.js"></script>
</body>

</html>