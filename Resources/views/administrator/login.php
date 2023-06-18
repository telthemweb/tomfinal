<?php 
// $options = [
//     'cost' => 12,
// ];
// echo password_hash('123456', PASSWORD_BCRYPT, $options);

?>
<div class="container mt-lg-5 mb-lg-5">
<div class="row justify-content-center">
<div class="col-md-6">
            <form action="<?php route('/admin/authenticate'); ?>" method="POST">
            <input type="hidden" name="_crsftoken" value="<?php CSRFToken(); ?>">
                <div class="alert alert-danger" role="alert" id="alert" style="display: none;"></div>
                <h4 class="text-center">Sign-in to your account</h4>
                <p class="spacing-agent"> </p>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <span class="fa fa-envelope"></span>
                                </span>
                        </div>
                        <input type="text" class="form-control" name="username" placeholder="Username or email" required="required" id="email">
                    </div>
                </div>
                <div class="input-group mb-5">
                <div class="input-group-append">
                    <div class="input-group-text">
                    <span  class="fas fa-lock"></span>
                    </div>
                </div>
                <input type="password" class="form-control" name="password" id="password" autocomplete="off"  placeholder="Password">
                <div class="input-group-append">
                    <div class="input-group-text">
                    <span onclick="showPass()" class="fas fa-eye"></span>
                    </div>
                </div>
                </div>
                <div class="form-group text-center justify-content-center">
                    <button type="submit" class="btn btn-primary login-btn btn-block">Sign in</button>
                </div>
                <p class="spacing-agent"> </p>
                <div class="clearfix">
                    <a href="#" class="float-right">Forgot Password?</a>
                </div>
            </form>

        </div>
    </div>
</div>
</div>




