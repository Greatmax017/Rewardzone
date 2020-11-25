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
							<div class="panel-heading">Profile Settings</div>
							<div class="panel-body">
								<form id="profile-form" class="form" role="form" method="POST" action="<?php echo e(url('/profile')); ?>">
									<?php echo e(csrf_field()); ?>


									<div class="form-group <?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
										<label class="control-label">Name</label>
										<input type="text" class="form-control" placeholder="Full Name" name="name" value="<?php echo e(Auth::user()->name); ?>" required autofocus>
										<?php if($errors->has('name')): ?>
										    <span class="label label-danger">
											<strong><?php echo e($errors->first('name')); ?></strong>
										    </span>
										<?php endif; ?>
									</div>
							
									<div class="form-group<?php echo e($errors->has('phone') ? ' has-error' : ''); ?>">
										<label class="control-label">Phone Number</label>
										<input type="text" class="form-control" placeholder="Phone Number" value="<?php echo e(Auth::user()->phone); ?>" name="phone" required>
										<?php if($errors->has('phone')): ?>
										    <span class="label label-danger">
											<strong><?php echo e($errors->first('phone')); ?></strong>
										    </span>
										<?php endif; ?>
									</div>
						
									<div class="form-group">
										<label class="control-label">Bank</label>
										<select class="form-control" name="bank">
										<?php $__empty_1 = true; $__currentLoopData = $banks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
											<?php if(Auth::user()->bank_id == $b->id): ?>
											<option value="<?php echo e($b->id); ?>" selected="selected"><?php echo e($b->name); ?></option>
											<?php else: ?>
											<option value="<?php echo e($b->id); ?>"><?php echo e($b->name); ?></option>
											<?php endif; ?>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
											<option>none</option>
										<?php endif; ?>
										</select>
									</div>
						
									<div class="form-group<?php echo e($errors->has('account_number') ? ' has-error' : ''); ?>">
										<label class="control-label">Account Number</label>
										<input type="text" class="form-control" placeholder="Account Number" value="<?php echo e(Auth::user()->account_number); ?>" name="account_number" required>
										<?php if($errors->has('account_number')): ?>
										    <span class="label label-danger">
											<strong><?php echo e($errors->first('account_number')); ?></strong>
										    </span>
										<?php endif; ?>
									</div>

									<div class="form-group">
									    <div class="col-sm-6 col-sm-offset-3">
										<center>
											<a onclick="submitForm(this);" form-id="profile-form" form-action="Save these changes" style="margin-top:20px;" type="submit" class="btn btn-lg btn-danger">
											    Save
											</a><br />
											If you want to reset your password click on the <a onclick="event.preventDefault(); document.getElementById('reset-password').submit();">reset password</a> link and provide your email address
										</center>
									    </div>
									</div>
								    </form>
								    <form id="reset-password" action="<?php echo e(url('/reset_password')); ?>" method="POST" style="display: none;">
									<?php echo e(csrf_field()); ?>

								</form>
							</div>
						</div>
					</div>
              </div><!-- /row -->					
          </div><!-- /col-lg-9 END SECTION MIDDLE -->
    </body>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.d_app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>