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
              		<div class="col-md-10 col-md-offset-1">
						 <div class="panel panel-danger">
							<div class="panel-heading">General</div>
							<div class="panel-body">
								<form id="profile-form" class="form" role="form" method="POST" action="<?php echo e(url('/admin_settings'), false); ?>">
								<?php echo e(csrf_field(), false); ?>


								<div class="form-group <?php echo e($errors->has('bitcoin_wallet_id') ? ' has-error' : '', false); ?>">
									<label class="control-label">Bitcoin Wallet Address:</label>
									<input type="text" class="form-control" name="bitcoin_wallet_id" value="<?php echo e($settings->bitcoin_wallet_id, false); ?>" required autofocus>
									<?php if($errors->has('bitcoin_wallet_id')): ?>
									    <span class="label label-danger">
										<strong><?php echo e($errors->first('bitcoin_wallet_id'), false); ?></strong>
									    </span>
									<?php endif; ?>
								</div>
								<div class="form-group <?php echo e($errors->has('usd_bitcoin') ? ' has-error' : '', false); ?>">
									<label class="control-label">USD to Bitcoin Current Rate:</label>
									<input type="text" class="form-control" name="usd_bitcoin" value="<?php echo e($settings->usd_bitcoin, false); ?>" required autofocus>
									<?php if($errors->has('usd_bitcoin')): ?>
									    <span class="label label-danger">
										<strong><?php echo e($errors->first('usd_bitcoin'), false); ?></strong>
									    </span>
									<?php endif; ?>
								</div>

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
			  <?php if(Auth::user()->isAdmin()): ?>
			  <div class="row">
              		<div class="col-md-10 col-md-offset-1">
						 <div class="panel panel-primary">
							<div class="panel-heading">Notification
								<label class="label label-default pull-right"><?php echo e($queue, false); ?> Left in queue</label>
							</div>
							<div class="panel-body">
								<form id="notify-form" class="form" role="form" method="POST" action="<?php echo e(url('/admin_notify'), false); ?>">
								<?php echo e(csrf_field(), false); ?>


								<div class="form-group <?php echo e($errors->has('type') ? ' has-error' : '', false); ?>">
									<label class="control-label">Notification Type:</label>
									<select class="form-control" name="type">
										<option value="">-- Select Type --</option>
										<option value="1">SMS Notification</option>
										<option value="2">Email Notification</option>
									</select>
									<?php if($errors->has('type')): ?>
									    <span class="label label-danger">
										<strong><?php echo e($errors->first('type'), false); ?></strong>
									    </span>
									<?php endif; ?>
								</div>
								<div class="form-group <?php echo e($errors->has('bitcoin_wallet_id') ? ' has-error' : '', false); ?>">
									<label class="control-label">Message:</label>
									<textarea name="message"  rows="5" class="form-control"></textarea>
									<?php if($errors->has('message')): ?>
									    <span class="label label-danger">
										<strong><?php echo e($errors->first('message'), false); ?></strong>
									    </span>
									<?php endif; ?>
								</div>


									<div class="form-group">
									    <div class="col-sm-6 col-sm-offset-3">
										<center>
											<a onclick="submitForm(this);" form-id="notify-form" form-action="Send notification to everyone" style="margin-top:20px;" type="submit" class="btn btn-primary">
											    Send
											</a><br />
										</center>
									    </div>
									</div>
							    </form>
							</div>
						</div>
                    </div>
              </div><!-- /row -->
			  <?php endif; ?>
          </div><!-- /col-lg-9 END SECTION MIDDLE -->
    </body>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.d_app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>