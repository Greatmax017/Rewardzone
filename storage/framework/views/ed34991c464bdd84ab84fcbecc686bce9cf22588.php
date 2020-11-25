<?php $__env->startSection('content'); ?>
<body class="not-landing landing-page landing-page1">
        
        <?php echo $__env->make('sections.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<div class="wrapper">
		<div class="parallax filter-gradient blue" data-color="blue">
                <div class= "container">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="description text-center">
                                <h2>Reset Password</h2>
                            </div>
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
					<div class="panel panel-success">
						<div class="panel-heading">Reset Password</div>
						<div class="panel-body">
						    <?php if(session('status')): ?>
							<div class="alert alert-success">
							    <center><?php echo e(session('status')); ?><br /> <i>If you dont see the mail in your inbox please check your spam</i></center>
							</div>
						    <?php endif; ?>

						    <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/password/email')); ?>">
							<?php echo e(csrf_field()); ?>


							<div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
							    <label for="email" class="col-md-4 control-label">E-Mail Address</label>

							    <div class="col-md-6">
								<input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required>

								<?php if($errors->has('email')): ?>
								    <span class="help-block">
									<strong><?php echo e($errors->first('email')); ?></strong>
								    </span>
								<?php endif; ?>
							    </div>
							</div>

							<div class="form-group">
							    <div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
								    Send Password Reset Link
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
		
		 <?php echo $__env->make('sections.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>

    </body>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>