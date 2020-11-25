<?php $__env->startSection('content'); ?>
<body>
	<div id="wrapper">
		<?php echo $__env->make('sections.d_header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<?php echo $__env->make('sections.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          		<?php if(session('error-status')): ?>
					<div class="alert alert-danger alert-dismissable">
					    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					    <div class="container-fluid">
					      <center><b>Error:</b> <?php echo e(session('error-status')); ?></center>
					    </div>
					</div>
				<?php endif; ?>
				<?php if(session('success-status')): ?>
					<div class="alert alert-success alert-dismissable">
					    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					    <div class="container-fluid">
						<center><?php echo e(session('success-status')); ?></center>
					    </div>
					</div>
				<?php endif; ?>
              <div class="row">
              		<div class="col-md-10 col-md-offset-1">
						 <div class="panel panel-danger">
							<div class="panel-heading">General</div>
							<div class="panel-body">
								<form id="profile-form" class="form" role="form" method="POST" action="<?php echo e(url('/admin_settings')); ?>">
								<?php echo e(csrf_field()); ?>


								<div class="form-group <?php echo e($errors->has('payment_time') ? ' has-error' : ''); ?>">
									<label class="control-label">Payment Time (hours):</label>
									<input type="number" class="form-control" name="payment_time" value="<?php echo e($settings->payment_time); ?>" required autofocus>
									<?php if($errors->has('payment_time')): ?>
									    <span class="label label-danger">
										<strong><?php echo e($errors->first('payment_time')); ?></strong>
									    </span>
									<?php endif; ?>
								</div>

								<div class="form-group <?php echo e($errors->has('confirmation_time') ? ' has-error' : ''); ?>">
									<label class="control-label">Confirmation Time (hours):</label>
									<input type="number" class="form-control" name="confirmation_time" value="<?php echo e($settings->confirmation_time); ?>" required>
									<?php if($errors->has('confirmation_time')): ?>
									    <span class="label label-danger">
										<strong><?php echo e($errors->first('confirmation_time')); ?></strong>
									    </span>
									<?php endif; ?>
								</div>

								<div class="form-group <?php echo e($errors->has('get_donation_time') ? ' has-error' : ''); ?>">
									<label class="control-label">Get Donation Time (hours):</label>
									<input type="number" class="form-control" name="get_donation_time" value="<?php echo e($settings->get_donation_time); ?>" required>
									<?php if($errors->has('get_donation_time')): ?>
									    <span class="label label-danger">
										<strong><?php echo e($errors->first('get_donation_time')); ?></strong>
									    </span>
									<?php endif; ?>
								</div>

								<div class="form-group <?php echo e($errors->has('daily_transaction_limit') ? ' has-error' : ''); ?>">
									<label class="control-label">Minimum withdrawable:</label>
									<input type="number" class="form-control" name="min_withdraw" value="<?php echo e($settings->min_withdraw); ?>" required>
									<?php if($errors->has('min_withdraw')): ?>
									    <span class="label label-danger">
										<strong><?php echo e($errors->first('min_withdraw')); ?></strong>
									    </span>
									<?php endif; ?>
								</div>

								<div class="form-group <?php echo e($errors->has('refresh_count') ? ' has-error' : ''); ?>">
									<label class="control-label">Daily Payment:</label>
									<input type="number" class="form-control" name="daily_payment" value="<?php echo e($settings->daily_payment); ?>" required autofocus>
									<?php if($errors->has('daily_payment')): ?>
									    <span class="label label-danger">
										<strong><?php echo e($errors->first('daily_payment')); ?></strong>
									    </span>
									<?php endif; ?>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">Referred Transaction count (No. of transactions to get bonus):</label>
										<input type="number" class="form-control" name="transaction_count" value="<?php echo e($settings->transaction_count); ?>" required>
										<?php if($errors->has('transaction_count')): ?>
										    <span class="label label-danger">
											<strong><?php echo e($errors->first('transaction_count')); ?></strong>
										    </span>
										<?php endif; ?>
										</div>
								</div>
								<div class="col-md-6">
									<div class="form-group <?php echo e($errors->has('percentage_per_transaction') ? ' has-error' : ''); ?>">
										<label class="control-label">Percentage of Referrer donation (percent):</label>
										<input type="number" class="form-control" name="percentage_per_transaction" value="<?php echo e($settings->percentage_per_transaction); ?>" required>
										<?php if($errors->has('percentage_per_transaction')): ?>
										    <span class="label label-danger">
											<strong><?php echo e($errors->first('percentage_per_transaction')); ?></strong>
										    </span>
										<?php endif; ?>
									</div>
								</div>

								<label class="control-label">Matching <i>(Start or stop the matching system)</i>:</label><br />
								<label class="switch">
								  <input type="checkbox" name="switch_match" <?php if($settings->match_status): ?> checked="checked" <?php endif; ?>>
								  <div class="slider round"></div>
								</label>

								<?php if(Auth::user()->isAdmin()): ?>
									<div class="form-group">
									    <div class="col-sm-6 col-sm-offset-3">
										<center>
											<a onclick="submitForm(this);" form-id="profile-form" form-action="Save these changes" style="margin-top:20px;" type="submit" class="btn btn-danger">
											    Save
											</a><br />
										</center>
									    </div>
									</div>
								<?php endif; ?>
							    </form>
							</div>
						</div>
                    </div>
              </div><!-- /row -->
          </div><!-- /col-lg-9 END SECTION MIDDLE -->
    </body>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.d_app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>