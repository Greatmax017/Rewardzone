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
                <div class="col-md-12">
					  <div class="col-lg-12">
                    	<div class="panel panel-default">
							<div class="panel-heading">Statistics</div>
							<div class="panel-body">
								<div class="col-md-4 col-md-offset-4">
									<table class="table table-condensed">
										<tr><td><b>Total Users</b></td><td><b><?php echo e($users_count, false); ?></b></td></tr>
										<tr class="success"><td><b>Active Users</b></td><td><b><?php echo e($active_users_count, false); ?></b></td></tr>
										<tr class="danger"><td><b>Suspended Users</b></td><td><b><?php echo e($suspended_users_count, false); ?></b></td></tr>
									</table>
								</div>
							</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading">Users</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-lg-6 col-lg-offset-6">
								<form method="get" action="<?php echo e(url('/admin/users'), false); ?>">
								    <div class="input-group">
								      <input type="text" name="search" class="form-control" value="<?php echo e(app('request')->input('search'), false); ?>" placeholder="Name, Email or Phone">
								      <span class="input-group-btn">
									<button class="btn btn-sm btn-default" type="submit">Search</button>
								      </span>
								    </div>
								    </form>
								  </div>
								</div>
							</div>
							<div style="margin:10px; overflow-x:auto;" class="table-responsive">
								<table class="table table-striped">
									<thead>
										<tr>
											<th>S/No</th>
											<th>Name</th>
											<th>Email</th>
											<th>Role</th>
											<th>Active Investments</th>
										</tr>
									</thead>
									<tbody>
										<?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
										<tr <?php if($u->suspended): ?> class="danger" <?php elseif(!$u->activated): ?> class="warning" <?php endif; ?>>
											<td class="col-md-1"><b><?php echo e($index+1, false); ?></b></td>
											<td class="col-md-2">
												<a href="<?php echo e(url('/admin/user/'.$u->id), false); ?>"><?php echo e($u->name, false); ?></a>
											</td>
											<td class="col-md-2"><?php echo e($u->email, false); ?></td>
											<td class="col-md-1">
												<?php if($u->role != 2): ?>
													<span>User</span>
												<?php else: ?>
													<b>Admin</b>
												<?php endif; ?>
											</td>
											<td class="col-md-2">
												<strong>$<?php echo e(number_format(\App\Transaction::where('sender', $u->id)->where('status', 1)->sum('amount'), 2), false); ?></strong><br>
											</td>
										</tr>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
										<tr>
											<td colspan="2"><center><i>No users exist</i></center></td>
										</tr>
										<?php endif; ?>
									</tbody>
								</table>
								<?php echo e($users->links(), false); ?>

							</div>
						</div>
                    </div>
                </div>
              </div><!-- /row -->
          </div><!-- /col-lg-9 END SECTION MIDDLE -->
    </body>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.d_app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>