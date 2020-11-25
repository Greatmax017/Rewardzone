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
            <li>Password Reset</li>
        </ul>
    </div>
</div>
<!-- //short-->
<!--about-->
<!--about-one-->
<section class="about-inner py-lg-4 py-md-3 py-sm-3 py-3">
    <!-- Inner Page Header serction end here -->
    <div class="container">
        <div class="section section-clients">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="col-md-8 offset-md-2">
                            <?php if(session('error-status')): ?>
                            <div class="alert alert-danger">
                                <div class="container-fluid">
                                    <div class="alert-icon">
                                        <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                                    </div>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                                    </button>
                                    <b>Error:</b> <?php echo e(session('error-status'), false); ?>

                                </div>
                            </div>
                            <?php endif; ?>
                            <div class="card">
                                <div class="card-header">Reset Password</div>
                                <div class="card-body">
                                    <?php if(session('status')): ?>
                                    <div class="alert alert-success">
                                        <?php echo e(session('status'), false); ?>

                                    </div>
                                    <?php endif; ?>

                                    <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/password/reset'), false); ?>">
                                        <?php echo e(csrf_field(), false); ?>


                                        <input type="hidden" name="token" value="<?php echo e($token, false); ?>" />

                                        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : '', false); ?>">
                                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                            <div class="col-md-6">
                                                <input id="email" type="email" class="form-control" name="email" value="<?php echo e(isset($email) ? $email : old('email'), false); ?>" required autofocus>

                                                <?php if($errors->has('email')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('email'), false); ?></strong>
                                                </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : '', false); ?>">
                                            <label for="password" class="col-md-4 control-label">Password</label>

                                            <div class="col-md-6">
                                                <input id="password" type="password" class="form-control" name="password" required>

                                                <?php if($errors->has('password')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('password'), false); ?></strong>
                                                </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <div class="form-group<?php echo e($errors->has('password_confirmation') ? ' has-error' : '', false); ?>">
                                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                                            <div class="col-md-6">
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                                <?php if($errors->has('password_confirmation')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('password_confirmation'), false); ?></strong>
                                                </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-4">
                                                <button type="submit" class="btn btn-primary">
                                                    Reset Password
                                                </button>
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
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>