<?php $__env->startSection('content'); ?>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

        <?php echo $__env->make('sections.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?><br>
	<div class="wrapper">
		<section class="section-padding">
			<br />
	        <div class="section section-clients">
	            <div class="container">
				    <div class="row">
				   	<div class="col-lg-12">
						<div class="col-md-8 col-md-offset-2">
							<?php if(session('error-status')): ?>
							    	<div class="alert alert-danger">
								    <div class="container-fluid">
									  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
									  </button>
								      <b>Error:</b> <?php echo e(session('error-status')); ?>

								    </div>
								</div>
							<?php endif; ?>
							<?php if(session('success-status')): ?>
							    	<div class="alert alert-success">
								    <div class="container-fluid">
									  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
									  </button>
								      <?php echo e(session('success-status')); ?>

								    </div>
								</div>
							<?php endif; ?>
							<div class="panel panel-primary">
									<div class="panel-body">
										<form class="form" role="form" method="POST" action="<?php echo e(url('/login')); ?>">
											<?php echo e(csrf_field()); ?>


											<div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
											   <label for="email" class="control-label">E-Mail Address</label>
											   <input id="email" type="email" class="form-control" placeholder="email@example.com" name="email" value="<?php echo e(old('email')); ?>" required autofocus>
												<?php if($errors->has('email')): ?>
												    <span class="label label-danger">
													<strong><?php echo e($errors->first('email')); ?></strong>
												    </span>
												<?php endif; ?>
											</div>

											<div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
											    <label for="password" class="control-label">Password</label>
											    <input id="password" type="password" placeholder="Password" class="form-control" name="password" required>
											    <?php if($errors->has('password')): ?>
												<span class="label label-danger">
													<strong><?php echo e($errors->first('password')); ?></strong>
												</span>
											    <?php endif; ?>
											</div>

											<div class="form-group">
											    <div class="col-sm-6 col-sm-offset-3">
												<div class="checkbox text-center">
												    <label>
													<input type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>
													Remember Me
												    </label>
												</div>
											    </div>
											</div>

											<div class="form-group">
											    <div style="margin-top:20px;" class="col-md-8 col-md-offset-2 text-center">
												<button type="submit" class="btn btn-lg btn-primary">
												    Login
												</button><br /><br />
												<a href="<?php echo e(url('/password/reset')); ?>">
												    Forgot Your Password?
												</a><br /><br />
												Do not have an account? <a href="<?php echo e(url('/register')); ?>">
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
		 <?php echo $__env->make('sections.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
</body>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>