<?php $__env->startSection('content'); ?>
<body class="not-landing landing-page landing-page1">
        
        <?php echo $__env->make('sections.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<div class="wrapper">
		<br />
		<br />
		<br />
		<br />
		<div class="parallax filter-gradient blue" data-color="blue">
                <div class= "container">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                           	<br />
							<br />
							<br />
                        </div>
                    </div>
                </div>
            </div>
            <div class="section section-clients">
                <div class="container">
		    <div class="row">
		    	<div class="col-lg-12">
				<div class="col-md-8 col-md-offset-2">
					<?php if(session('error-status')): ?>
					    	<div class="alert alert-danger">
						    <div class="container-fluid">
							  <div class="alert-icon">
							    <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
							  </div>
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
							  </button>
						      <b>Error:</b> <?php echo e(session('error-status')); ?>

						    </div>
						</div>
					<?php endif; ?>
					<div class="panel panel-danger">
							<div class="panel-heading">Registration Form</div>
							<div class="panel-body">
								<p>Please ensure that you provide the correct email addresses because it will be verified.</p><br />
							    <form class="form" role="form" method="POST" action="<?php echo e(url('/register')); ?>">
									<?php echo e(csrf_field()); ?>

								
									<input type="hidden" value="<?php echo e($referrer); ?>" name="referrer">

									<div class="form-group <?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
										<label class="control-label">Name (Account Name)</label>
										<input type="text" class="form-control" placeholder="Full Name" name="name" value="<?php echo e(old('name')); ?>" required autofocus>
										<?php if($errors->has('name')): ?>
										    <span class="label label-danger">
											<strong><?php echo e($errors->first('name')); ?></strong>
										    </span>
										<?php endif; ?>
									</div>
									
									<div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
										<label class="control-label">Email address</label>
										<input type="email" class="form-control" placeholder="email@example.com" name="email" value="<?php echo e(old('email')); ?>" required>
										<?php if($errors->has('email')): ?>
										    <span class="label label-danger">
											<strong><?php echo e($errors->first('email')); ?></strong>
										    </span>
										<?php endif; ?>
									</div>
							
									<div class="form-group<?php echo e($errors->has('phone') ? ' has-error' : ''); ?>">
										<label class="control-label">Phone Number</label>
										<input type="text" class="form-control" placeholder="Phone Number" value="<?php echo e(old('phone')); ?>" name="phone" required>
										<?php if($errors->has('phone')): ?>
										    <span class="label label-danger">
											<strong><?php echo e($errors->first('phone')); ?></strong>
										    </span>
										<?php endif; ?>
									</div>

									
									<div class="col-md-6">
										<div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
											<label class="control-label">Password</label>
											<input type="password" class="form-control" placeholder="Password" name="password" required>
											<?php if($errors->has('password')): ?>
											    <span class="label label-danger">
												<strong><?php echo e($errors->first('password')); ?></strong>
											    </span>
											<?php endif; ?>
										</div>
									</div>
									
									<div class="col-md-6">
										<div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
											<label class="control-label">Confirm password</label>
											<input type="password" placeholder="Confirm Password" class="form-control" name="password_confirmation" required>
										</div>
									</div>

									
						
									<div class="form-group">
										<label class="control-label">Bank</label>
										<select class="form-control" name="bank">
										<?php $__empty_1 = true; $__currentLoopData = $banks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
											<option value="<?php echo e($b->id); ?>"><?php echo e($b->name); ?></option>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
											<option>none</option>
										<?php endif; ?>
										</select>
									</div>
						
									<div class="form-group<?php echo e($errors->has('account_number') ? ' has-error' : ''); ?>">
										<label class="control-label">Account Number</label>
										<input type="text" class="form-control" placeholder="Account Number" value="<?php echo e(old('account_number')); ?>" name="account_number" required>
										<?php if($errors->has('account_number')): ?>
										    <span class="label label-danger">
											<strong><?php echo e($errors->first('account_number')); ?></strong>
										    </span>
										<?php endif; ?>
									</div>
						

									<div class="form-group">
									    <div class="col-sm-6 col-sm-offset-3">
										<center>
											<button style="margin-top:20px;" type="submit" class="btn btn-lg btn-danger">
											    Register
											</button>
										</center>
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
		
		 <?php echo $__env->make('sections.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>

    </body>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>