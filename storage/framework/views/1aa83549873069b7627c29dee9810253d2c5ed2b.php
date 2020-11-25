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
              <div class="row">
              		<div class="col-md-8 col-md-offset-2">
                    	<div class="panel panel-default">
							<div class="panel-heading">User Detail</div>
							<div class="panel-body">
								<div class="table-responsive">
									<table class="table">
										<tbody>
											<tr><td><b>Name</b></td><td> <?php echo e(isset($user->name) ? $user->name : 'Tansi System'); ?><br /></td></tr>
											<tr><td><b>Email:</b></td><td><b><?php echo e($user->email); ?></b></td></tr>
											<tr><td><b>Account Number:</b></td><td><b><?php echo e($user->account_number); ?></b></td></tr>
											<tr><td><b>Bank:</b></td><td><b><?php echo e($user->bank->name); ?></b></td></tr>
											<tr><td><b>Phone:</b></td><td><b><?php echo e(isset($user->phone) ? $user->phone : ''); ?></b></td></tr>
											<tr><td><b>Total Received:</b></td><td><b>&#8358;<?php echo e(number_format($user->amount_received)); ?></b></td></tr>
											<tr><td><b>Balance:</b></td><td><b>&#8358;<?php echo e(number_format($user->balance)); ?></b></td></tr>
											<tr><td><b>Last GH Time:</b></td><td><b><?php echo e($last_gh); ?></b></td></tr>
                                            <tr><td><b>License:</b></td><td><b><?php if($user->license_id != null && $user->license->expires_at->gt(\Carbon\Carbon::now())): ?>
                                            <span style="font-size:13px;color:white;background-color:green;padding:5px;">VALID till <?php echo e($user->license->expires_at->toFormattedDateString()); ?></span><br><br>
                                            <i><?php echo e($user->license->transaction_desc); ?></i>
                                            <?php else: ?>
                                            <span style="font-size:13px;color:white;background-color:red;padding:5px;">INVALID</span>
                                            <?php endif; ?></b></td></tr>
										</tbody>
									</table>
								</div>
								<div class="col-md-6">
									<div class="form-group">
									    <div style="margin-top:20px;" class="col-md-6 col-md-offset-5 text-center">
										<a href="/admin/transactions?search=<?php echo e($user->email); ?>" class="btn btn-sm btn-primary">
										    View Transactions
										</a><br /><br />
									    </div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
									    <div style="margin-top:20px;" class="col-md-6 text-center">
										<a href="<?php echo e(url()->previous()); ?>" class="btn btn-sm btn-primary">
										    Return back
										</a><br /><br />
									    </div>
									</div>
								</div>
							</div>
						</div>
                    </div>
              </div><!-- /row -->
          </div><!-- /col-lg-9 END SECTION MIDDLE -->
    </body>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.d_app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>