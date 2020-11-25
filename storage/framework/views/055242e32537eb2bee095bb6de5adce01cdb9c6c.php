<?php $__env->startSection('content'); ?>

<!-- banner -->
<div class="inner_page-banner">
</div>
<!--//banner -->
<!-- short -->
<div class="using-border py-3">
    <div class="inner_breadcrumb  ml-4">
        <ul class="short_ls">
            <li>
                <a href="<?php echo e(url('/'), false); ?>">Home</a>
                <span>/</span>
            </li>
            <li>Sign In</li>
        </ul>
    </div>
</div>
<!-- //short-->
<!--about-->
<!-- register -->
<section class="register py-lg-4 py-md-3 py-sm-3 py-3">
    <div class="container py-lg-5 py-md-5 py-sm-4 py-3">
        <div class="row">
            <div class="col-lg-6 jst-must-info">
                <div class=" wthree-form-list">
                    <h4>“Diversification is protection against ignorance. It makes little sense if you know what you are doing.” - Warren Buffet</h4>
                </div>
                <div class="stats-info row pt-lg-4 pt-md-3 pt-sm-3 pt-2">
                    <div class="col-lg-6 col-md-6 col-sm-6 stats-grid stats-grid-1">
                        <div class="register-left-agile">
                            <div class="counter">1225</div>
                            <div class="stat-info py-lg-3 py-md-3 py-sm-3 py-3">
                                <h4>Registered Investors</h4>
                            </div>
                            <span class="fas fa-coffee"></span>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 stats-grid stats-grid-2">
                        <div class="register-left-agile">
                            <div class="counter">14055</div>
                            <div class="stat-info py-lg-3 py-md-3 py-sm-3 py-3">
                                <h4>Running Investments</h4>
                            </div>
                            <span class="far fa-smile" aria-hidden="true"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 text-center register-form">
                <div class="wls-register-form">
                    <h4>Sign In</h4>
                    <div class="col-md-12">
                        <?php if(session('error-status')): ?>
                                <div class="alert alert-danger">
                                <div class="container-fluid">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                                  </button>
                                  <b>Error:</b> <?php echo e(session('error-status'), false); ?>

                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if(session('success-status')): ?>
                                <div class="alert alert-success">
                                <div class="container-fluid">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                                  </button>
                                  <?php echo e(session('success-status'), false); ?>

                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="panel panel-primary">
                                <div class="panel-body">
                                    <form class="form" role="form" method="POST" action="<?php echo e(url('/login'), false); ?>">
                                        <?php echo e(csrf_field(), false); ?>


                                        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : '', false); ?>">
                                           <label for="email" class="control-label">E-Mail Address</label>
                                           <input id="email" type="email" class="form-control" placeholder="email@example.com" name="email" value="<?php echo e(old('email'), false); ?>" required autofocus>
                                            <?php if($errors->has('email')): ?>
                                                <span class="label label-danger">
                                                <strong><?php echo e($errors->first('email'), false); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>

                                        <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : '', false); ?>">
                                            <label for="password" class="control-label">Password</label>
                                            <input id="password" type="password" placeholder="Password" class="form-control" name="password" required>
                                            <?php if($errors->has('password')): ?>
                                            <span class="label label-danger">
                                                <strong><?php echo e($errors->first('password'), false); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-6 col-sm-offset-3">
                                            <div class="checkbox text-center">
                                                <label>
                                                <input type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : '', false); ?>>
                                                Remember Me
                                                </label>
                                            </div>
                                            </div>
                                        </div>

                                        <div class="form-group text-center">
                                            <div style="margin-top:20px;">
                                            <button type="submit" class="btn btn-lg btn-primary">
                                                Sign In
                                            </button><br /><br />
                                            <a href="<?php echo e(url('/password/reset'), false); ?>">
                                                Forgot Your Password?
                                            </a><br /><br />
                                            Do not have an account? <a href="<?php echo e(url('/register'), false); ?>">
                                                Create an account
                                            </a>
                                            </div>
                                        </div>
                                        </form>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--// register -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>