<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $title; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>adminlte/plugins/jqvmap/jqvmap.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- <link rel="stylesheet" href="<?= base_url('assets/'); ?>adminlte/plugins/sweetalert2/sweetalert2.min.css"> -->
  <!-- Toastr -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>adminlte/plugins/toastr/toastr.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>adminlte/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>adminlte/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>adminlte/plugins/summernote/summernote-bs4.css">
  <!-- jquery-ui -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>adminlte/plugins/jquery-ui/jquery-ui.min.css">

  <link rel="stylesheet" href="<?= base_url('assets/'); ?>adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/style.css">
</head>
<body class="hold-transition layout-footer-fixed">
  <div class="wrapper">
    
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-primary navbar-dark">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-light-primary elevation-4">
      <!-- Brand Logo -->
      <div class="text-center">
        <a href="<?= base_url('admin/dashboard'); ?>"><img src="<?= base_url('assets/adminlte/dist/img/logocs(5).png'); ?>" class="m-3" width="200px" alt="Directory logo"></a>
      </div>

      <!-- Sidebar -->
      <div class="sidebar">
        <div class="image text-center mt-5">
            <img src="<?= base_url('assets/'); ?>adminlte/dist/img/logocs.png" class="profile-user-img img-fluid img-circle" alt="Logo Cuci Sepatu">
          </div>
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 text-center">
          
          <div class="info">
            <a href="<?= base_url('admin/dashboard'); ?>">
              <h3 class="profile-username text-center text-capitalize"><?= $user['username']; ?></h3>
            </a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="<?= base_url('admin/dashboard');?>" class="nav-link <?= activate_menu('dashboard')?>">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <li class="nav-item has-treeview <?= activate_menu_open('master') ?>">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                  Master
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= base_url('admin/karyawan'); ?>" class="nav-link <?= activate_menu('karyawan')?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Karyawan</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('admin/customer'); ?>" class="nav-link <?= activate_menu('customer')?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Customer</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('admin/treatment'); ?>" class="nav-link <?= activate_menu('treatment')?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Treatment</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('admin/tipesepatu'); ?>" class="nav-link <?= activate_menu('tipesepatu')?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Tipe Sepatu</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview <?= activate_menu_open('transaksi') ?>">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-shopping-cart"></i>
                <p>
                  Transaksi
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= base_url('admin/transaksi'); ?>" class="nav-link <?= activate_menu('transaksi', 'addTransaksi')?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Kasir
                        <!-- New Transaction Come -->
                          <!-- <span class="badge badge-info right">2</span> -->
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('admin/sepatu'); ?>" class="nav-link <?= activate_menu('sepatu')?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Karyawan Cuci</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview <?= activate_menu_open('laporan') ?>">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-money-check-alt"></i>
                <p>
                  Laporan
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= base_url('admin/history_transaksi'); ?>" class="nav-link <?= activate_menu('history_transaksi')?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Transaksi Selesai
                        <!-- New Transaction Come -->
                          <!-- <span class="badge badge-info right">2</span> -->
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('admin/history_sepatu'); ?>" class="nav-link <?= activate_menu('history_sepatu')?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Sepatu</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('loginregister/logout'); ?>" class="nav-link btn-danger" data-toggle="modal" data-target="#Keluar">
                <i class="text-white nav-icon fas fa-fw fa-sign-out-alt"></i>
                <p class="text-white">
                  Log Out
                </p>
              </a>
            </li>
            <!-- <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon far fa-plus-square"></i>
                <p>
                  Extras
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="pages/examples/login.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Login</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/examples/register.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Register</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/examples/forgot-password.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Forgot Password</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/examples/recover-password.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Recover Password</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/examples/lockscreen.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Lockscreen</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/examples/legacy-user-menu.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Legacy User Menu</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/examples/language-menu.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Language Menu</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/examples/404.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Error 404</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/examples/500.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Error 500</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/examples/pace.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pace</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/examples/blank.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Blank Page</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="starter.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Starter Page</p>
                  </a>
                </li>
              </ul>
            
          </li> -->
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <div class="modal fade" id="Keluar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Apakah Anda Yakin Ingin Keluar ?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Batal</button>
            <a href="<?= base_url('loginregister/logout'); ?>" type="button" class="btn btn-danger">Keluar</a>
          </div>
        </div>
      </div>
    </div>