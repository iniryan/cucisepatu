<body class="hold-transition register-page">
<div class="register-box">

  <div class="card">
    <div class="card-body register-card-body text-center">
      <!-- <p class="login-box-msg" style="font-size: 32px;">Sign in</p> -->
      <a href="<?= base_url('loginregister'); ?>"><img src="<?= base_url('assets/adminlte/dist/img/logocs(5).png'); ?>" class="mb-3" width="200px" alt="Directory logo"></a>
      <form action="<?= base_url('loginregister/registration'); ?>" method="post">
      <?= $this->session->flashdata('message'); ?>  
      <div class="input-group mb-3" data-validate = "Username is required!!">
          <input type="text" class="form-control" placeholder="Username" id="username" name="username" autocomplete="off" value="<?= set_value('username'); ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <?= form_error('username', '<small class="text-danger m-auto">', '</small>'); ?>
        <div class="input-group mb-3" data-validate = "Password is required!!">
          <input type="password" class="form-control" placeholder="Password" id="password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <?= form_error('password', '<small class="text-danger m-auto">', '</small>'); ?>
        <div class="input-group mb-3" data-validate = "Confirm Password is required!!">
          <input type="password" class="form-control" placeholder="Confirm password" id="password2" name="password2">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="form-group mb-3" data-validate = "Role is required!!">
          <select class="form-control level" name="role" id="role" style="width: 100%;">
            <option value="">-Pilih Role-</option>
                <option value="2">Kasir</option>
                <option value="3">Kang Cuci</option>
          </select>
        </div>
        <div class="row">
          <!-- <div class="col-8">
            
          </div> -->
          <!-- /.col col-4 start-->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center">
        <p>- OR -</p>
        <a href="<?= base_url('loginregister'); ?>" class="btn btn-block btn-danger">
        Sign In
        </a>
      </div>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->