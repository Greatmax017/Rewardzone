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
            <li>Sign Up</li>
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
                    <h4>“Spend each day trying to be a little wiser than you were when you woke up.” – Charlie Munger</h4>
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
                    <h4>Sign Up</h4>
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
                                    <form class="form" role="form" method="POST" action="<?php echo e(url('/register'), false); ?>">
    									<?php echo e(csrf_field(), false); ?>

    									<input type="hidden" value="<?php if($referrer != null): ?><?php echo e($referrer->email, false); ?><?php endif; ?>" name="referrer">

    									<div class="form-group <?php echo e($errors->has('name') ? ' has-error' : '', false); ?>">
    										<label class="control-label">Name (Account Name)<span style="color:red;">*</span></label>
    										<input type="text" class="form-control" placeholder="Full Name" name="name" value="<?php echo e(old('name'), false); ?>" required autofocus>
    										<?php if($errors->has('name')): ?>
    										    <span class="badge badge-danger">
    											<strong><?php echo e($errors->first('name'), false); ?></strong>
    										    </span>
    										<?php endif; ?>
    									</div>

    									<div class="form-group<?php echo e($errors->has('email') ? ' has-error' : '', false); ?>">
    										<label class="control-label">Email address<span style="color:red;">*</span></label>
    										<input type="email" class="form-control" placeholder="email@example.com" name="email" value="<?php echo e(old('email'), false); ?>" required>
    										<?php if($errors->has('email')): ?>
    										    <span class="badge badge-danger">
    											<strong><?php echo e($errors->first('email'), false); ?></strong>
    										    </span>
    										<?php endif; ?>
    									</div>

    									<div class="form-group<?php echo e($errors->has('phone') ? ' has-error' : '', false); ?>">
    										<label class="control-label">Phone Number<span style="color:red;">*</span></label>
    										<input type="text" class="form-control" placeholder="Phone Number" value="<?php echo e(old('phone'), false); ?>" name="phone" required>
    										<?php if($errors->has('phone')): ?>
    										    <span class="badge badge-danger">
    											<strong><?php echo e($errors->first('phone'), false); ?></strong>
    										    </span>
    										<?php endif; ?>
    									</div>

                                        <div class="form-group">
    										<label class="control-label">Investment Plan<span style="color:red;">*</span></label>
                                            <select class="form-control" name="plan">
                                                <option value="0" <?php if(app('request')->input('plan') == '0'): ?> selected <?php endif; ?>> Gold </option>
                                                <option value="1" <?php if(app('request')->input('plan') == '1'): ?> selected <?php endif; ?>> Premium </option>
                                            </select>
                                        </div>

										<div class="form-group<?php echo e($errors->has('password') ? ' has-error' : '', false); ?>">
											<label class="control-label">Password<span style="color:red;">*</span></label>
											<input type="password" class="form-control" placeholder="Password" name="password" required>
											<?php if($errors->has('password')): ?>
											    <span class="badge badge-danger">
												<strong><?php echo e($errors->first('password'), false); ?></strong>
											    </span>
											<?php endif; ?>
										</div>

										<div class="form-group">
											<label class="control-label">Confirm password<span style="color:red;">*</span></label>
											<input type="password" placeholder="Confirm Password" class="form-control" name="password_confirmation" required>
										</div>

                                        <div class="form-group<?php echo e($errors->has('bitcoin_wallet_id') ? ' has-error' : '', false); ?>">
    										<label class="control-label">Bitcoin Wallet Address<span style="color:red;">*</span></label>
    										<input type="text" class="form-control" placeholder="Bitcoin Wallet Address" value="<?php echo e(old('bitcoin_wallet_id'), false); ?>" name="bitcoin_wallet_id">
    										<?php if($errors->has('bitcoin_wallet_id')): ?>
    										    <span class="badge badge-danger">
    											<strong><?php echo e($errors->first('bitcoin_wallet_id'), false); ?></strong>
    										    </span>
    										<?php endif; ?>
    									</div>

    									<div class="form-group">
    										<center>
    											<button style="margin-top:20px;" type="submit" class="btn btn-lg btn-primary">
    											    Sign Up
    											</button>
    										</center>
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