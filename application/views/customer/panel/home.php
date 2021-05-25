<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="<?= base_url('customer'); ?>" class="navbar-brand">
        <img src="<?= base_url('assets/adminlte/dist/img/logocs.png'); ?>" alt="Cuci Sepatu" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Cuci Sepatu</span>
      </a>
      
      <!-- <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button> -->

      <!-- <div class="collapse navbar-collapse order-3" id="navbarCollapse"> -->
        <!-- Left navbar links -->
        <!-- <ul class="navbar-nav">
          
        </ul> -->
      <!-- </div> -->

      <!-- Right navbar links -->
      <!-- <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <li class="nav-item">
            <a href="index3.html" class="nav-link">Home</a>
          </li>
      </ul> -->
    </div>
  </nav>
  <!-- /.navbar -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('<?= base_url('assets/adminlte/dist/img/gambar.png') ?>'); background-repeat: no-repeat; background-size: 100%;">
    <!-- Content Header (Page header) -->
    <div class="content">
      <div class="container">
        <div class="row mb-2 py-5">
          <div class="col-sm-12 text-center">
            <h1 class="mt-5 text-light" style="font-size: 64px; font-weight: 850"> Cek Status Sepatumu !
          </div><!-- /.col -->
        </div><!-- /.row -->
     
    <!-- /.content-header -->

    <!-- Main content -->
        <div class="row">
          <div class="col-2"></div>
          <div class="col-8">
            <div class="">
              <div class="card-body text-center">
              <div class="input-group-lg">
                        <input type="text" class="form-control" name="cari_kode" id="cari_kode" placeholder="Cari Kode Transaksi" />
                      </div>
                      <button class="btn btn-success mt-4 px-5 btn-lg">Search</button>
              </div>
            </div>
          </div>
          <div class="col-2"></div>

        </div> </div><!-- /.container-fluid -->
    </div>
        <!-- /.row -->
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->