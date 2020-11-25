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


								<div class="form-group <?php echo e($errors->has('bitcoin_wallet_id') ? ' has-error' : ''); ?>">
									<label class="control-label">Bitcoin Wallet ID:</label>
									<input type="text" class="form-control" name="bitcoin_wallet_id" value="<?php echo e($settings->bitcoin_wallet_id); ?>" required autofocus>
									<?php if($errors->has('bitcoin_wallet_i')): ?>
									    <span class="label label-danger">
										<strong><?php echo e($errors->first('bitcoin_wallet_id')); ?></strong>
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
          </div><!-- /col-lg-9 END SECTION MIDDLE -->
    </body>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.d_app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>