<div class="container mt-lg-5 mb-lg-5">
<div class="row justify-content-center">
<div class="col-md-6">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header bg-dark text-center">
    <b class="text-white"><?php echo strtoupper("Customer Panel"); ?></b>
    </div>
    <div class="card-body">
      <p class="login-box-msg text-center"><b>Login</b></p>

      <form action="<?php route('/customer/authenticate'); ?>" method="POST">
            <input type="hidden" name="_crsftoken" value="<?php CSRFToken(); ?>">
        <div class="input-group mb-3">
        <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
          <input type="email" class="form-control" autocomplete="none" aria-autocomplete="none" name="email"  autofocus placeholder="E-mail Address">
        </div>
        <div class="input-group mb-5">
          <input type="password" class="form-control" name="password" id="password" autocomplete="off"  placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span onclick="showPass()" class="fas fa-eye"></span>
            </div>
          </div>
        </div>
       
          <!-- /.col -->
          <div class="mt-4 mb-4">
            <button type="submit" class="btn btn-primary btn-block">Login</button>
          </div>
          <div class="col-12 text-center">
          <a href="/register">Create an Account</a>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <!-- /.social-auth-links -->

      <!-- <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p> -->
      
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>

</div>
</div>
</div>