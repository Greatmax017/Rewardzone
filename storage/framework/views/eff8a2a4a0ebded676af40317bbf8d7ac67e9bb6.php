<?php $__env->startSection('content'); ?>

<!-- Inner Page Header serction end here -->
<section style="background:#eeeeee24;" class="about-inner py-lg-4 py-md-3 py-sm-3 py-3">
    <!-- Inner Page Header serction end here -->
    <div class="container py-lg-5 py-md-4 py-sm-4 py-3">
        <?php if(session('error-status')): ?>
        <div class="alert alert-danger alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <div class="container-fluid">
                <center><b>Error:</b> <?php echo e(session('error-status'), false); ?></center>
            </div>
        </div>
        <?php endif; ?>
        <?php if(session('success-status')): ?>
        <div class="alert alert-success alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <div class="container-fluid">
                <center><?php echo e(session('success-status'), false); ?></center>
            </div>
        </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="panel panel-primary">
                    <div class="panel-body">
                        <form id="profile-form" class="form" role="form" method="POST" action="<?php echo e(url('/profile'), false); ?>">
                            <?php echo e(csrf_field(), false); ?>


                            <div class="form-group <?php echo e($errors->has('name') ? ' has-error' : '', false); ?>">
                                <label class="control-label">Name</label>
                                <input type="text" class="form-control" placeholder="Full Name" name="name" value="<?php echo e(Auth::user()->name, false); ?>" required autofocus>
                                <?php if($errors->has('name')): ?>
                                <span class="label label-danger">
                                    <strong><?php echo e($errors->first('name'), false); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>

                            <div class="form-group<?php echo e($errors->has('phone') ? ' has-error' : '', false); ?>">
                                <label class="control-label">Phone Number</label>
                                <input type="text" class="form-control" placeholder="Phone Number" value="<?php echo e(Auth::user()->phone, false); ?>" name="phone" required disabled>
                                <?php if($errors->has('phone')): ?>
                                <span class="label label-danger">
                                    <strong><?php echo e($errors->first('phone'), false); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>

                            <div class="form-group<?php echo e($errors->has('bitcoin_wallet_id') ? ' has-error' : '', false); ?>">
                                <label class="control-label">Bitcoin Wallet Address</label>
                                <input type="text" class="form-control" placeholder="Bitcoin Wallet Address" value="<?php echo e(Auth::user()->bitcoin_wallet_id, false); ?>" name="bitcoin_wallet_id">
                                <?php if($errors->has('bitcoin_wallet_id')): ?>
                                <span class="label label-danger">
                                    <strong><?php echo e($errors->first('bitcoin_wallet_id'), false); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>

                            <div class="form-group">
                                    <center>
                                        <a onclick="submitForm(this);" form-id="profile-form" form-action="Save these changes" style="margin-top:20px;" type="submit" class="btn btn-lg btn-primary">
                                            Save
                                        </a><br />
                                        If you want to reset your password click on the <a onclick="event.preventDefault(); document.getElementById('reset-password').submit();">reset password</a> link and provide your email address
                                    </center>
                            </div>
                        </form>
                        <form id="reset-password" action="<?php echo e(url('/reset_password'), false); ?>" method="POST" style="display: none;">
                            <?php echo e(csrf_field(), false); ?>

                        </form>
                    </div>
                </div>
            </div>
        </div><!-- /row -->
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>