<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body text-center">
      <!-- <p class="login-box-msg" style="font-size: 32px;">Sign in</p> -->
      <a href="<?= base_url('loginregister'); ?>"><img src="<?= base_url('assets/adminlte/dist/img/logocs(5).png'); ?>" class="mb-3" width="200px" alt="Directory logo"></a>

      <form action="<?= base_url('loginregister'); ?>" method="post">
      <?= $this->session->flashdata('message'); ?>  
      <div class="input-group mb-3" data-validate = "Username is required!!">
          <input type="text" class="form-control" placeholder="Username" id="username" name="username" autocomplete="off" value="<?= set_value('username'); ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3" data-validate = "Password is required!!">
          <input type="password" class="form-control" placeholder="Password" id="password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- <div class="col-8">
              <a href="#" class="">
                  Forgot Password
              </a>  
          </div> -->
          <!-- /.col col-4 start-->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!-- <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="<?= base_url('loginregister/registration'); ?>"" class="btn btn-block btn-danger">
          Sign Up
        </a>
      </div> -->
      <!-- /.social-auth-links -->

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->