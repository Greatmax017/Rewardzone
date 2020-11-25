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
				<br />
				<br />
              <div class="row">
              		<div class="col-md-8 col-md-offset-2">
						  <div class="panel panel-danger">
							<div class="panel-heading">Referral Bonus</div>
							<div class="panel-body">
								<div>
									<i><b>Total active users referred:</b> <?php echo e($ref_count); ?></i><br>
									<br>
									<br>
									<table class="table">
										<thead>
											<tr>
												<th>User</th>
												<th>Email</th>
											</tr>
										</thead>
										<tbody>
											<?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
											<tr>
												<td><?php echo e($m->name); ?></td>
												<td><?php echo e($m->email); ?></td>
											</tr>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
											<tr>
												<td colspan="3"><center><i>You have not referred anyone. share your referral link to get referral bonus</i></center></td>
											</tr>
											<?php endif; ?>
										</tbody>
									</table>
									<?php echo e($users->links()); ?>

									<div class="row">
										<div class="col-lg-12">
											<div class="alert alert-info">
												<p class="text-center">Your Referral Link is <a href="#"><b>https://www.mutualfund.community/register?ref=<?php echo e(Auth::user()->id); ?></b></a></p>
											</div>
										</div>
										<div style="padding:15px;" class="card-info">
											<p><i><b>Note:</b> You will earn 5% of the first three transactions of the people you refer</i></p>
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