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
              		<div class="col-md-8 col-md-offset-2">
                    	<div class="panel panel-default">
							<div class="panel-heading">User Detail</div>
							<div class="panel-body">
								<div class="table-responsive">
									<table class="table">
										<tbody>
											<tr><td><b>Name</b></td><td> <?php echo e(isset($user->name) ? $user->name : '', false); ?><br /></td></tr>
											<tr><td><b>Email:</b></td><td><b><?php echo e($user->email, false); ?></b>
												<?php if(!$user->suspended): ?>
												<a href="/admin/user/<?php echo e($user->id, false); ?>/suspend" class="btn btn-xs btn-danger">Suspend</a>
												<?php else: ?>
												<a  href="/admin/user/<?php echo e($user->id, false); ?>/release" class="btn btn-xs btn-success">UnSuspend</a>
												<?php endif; ?>
											</td></tr>
											<tr><td><b>Bitcoin Wallet ID:</b></td><td><b><?php echo e($user->bitcoin_wallet_id, false); ?></b></td></tr>
											<tr><td><b>Phone:</b></td><td><b><?php echo e(isset($user->phone) ? $user->phone : '', false); ?></b></td></tr>
											<tr><td><b>Referred(Active):</b></td><td><b><?php echo e(\App\User::where('referrer_id', $user->id)->count(), false); ?></b>(<?php echo e($user->referred_count(), false); ?>)</td></tr>
                                            <tr><td><b>Total Active Investments:</b></td><td>$<?php echo e(number_format(\App\Transaction::where('sender', $user->id)->where('status', 1)->sum('amount'), 2), false); ?>

											</td>
											</tr>
											<tr><td><b>Account Plan:</b></td><td><b><?php echo e($user->plan ? 'PREMIUM':'GOLD', false); ?></b>
												<a href="<?php echo e(url('/admin/user/'.$user->id.'/switch_account'), false); ?>" class="btn btn-xs btn-primary">Switch</a>
											</td></tr>
										</tbody>
									</table>
								</div>
								<div class="col-md-6">
									<div class="form-group">
									    <div style="margin-top:20px;" class="col-md-6 col-md-offset-5 text-center">
										<a href="/admin/transactions?search=<?php echo e($user->email, false); ?>" class="btn btn-sm btn-primary">
										    View Transactions
										</a><br /><br />
									    </div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
									    <div style="margin-top:20px;" class="col-md-6 text-center">
										<a href="<?php echo e(url()->previous(), false); ?>" class="btn btn-sm btn-primary">
										    Return back
										</a><br /><br />
									    </div>
									</div>
								</div>
							</div>
						</div>
							<div class="panel panel-default">
								<div class="panel-heading">Referred Users</div>
								<div class="panel-body">
									<div style="margin:10px; overflow-x:auto;" class="table-responsive">
										<table class="table table-striped">
											<thead>
												<tr>
													<th>S/No</th>
													<th>Name</th>
													<th>Email</th>
													<th>Country</th>
													<th>Active Shares</th>
													<?php if(Auth::user()->isAdmin()): ?>
														<th>Action</th>
													<?php endif; ?>
												</tr>
											</thead>
											<tbody>
												<?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
												<tr <?php if($u->suspended): ?> class="danger" <?php endif; ?>>
													<td class="col-md-1"><b><?php echo e($index+1, false); ?></b></td>
													<td class="col-md-2"><a href="<?php echo e(url('/admin/user/'.$u->id), false); ?>"><?php echo e($u->name, false); ?></a></td>
													<td class="col-md-2"><?php echo e($u->email, false); ?></td>
													<td class="col-md-1"><?php echo e($u->country, false); ?></td>
													<td class="col-md-2">
														<strong><?php echo $u->currency; ?><?php echo e(number_format(\App\Transaction::where('sender', $u->id)->where('status', 0)->where('receiver', 0)->sum('amount')), false); ?></strong>
													</td>
													<?php if(Auth::user()->isAdmin()): ?>
													<td class="col-md-1">
														<a onclick="submitUserForm(this);" id="<?php echo e($u->id, false); ?>" class="btn btn-sm btn-primary">
															Save
														</a>
														<?php if(!$u->isAdmin() && ($u->status_id == 4 || $u->status_id == 5)): ?>
														<a onclick="submitForm(this);" form-id="delete-form-<?php echo e($u->id, false); ?>" form-action="DELETE this user" class="btn btn-sm btn-primary">
															<i style="color:red;" class="fa fa-trash" aria-hidden="true"></i>
														</a>
														<form id="delete-form-<?php echo e($u->id, false); ?>" action="<?php echo e(url('/delete_user'), false); ?>" method="POST" style="display: none;">
															<?php echo e(csrf_field(), false); ?>

															<input type="hidden" name="user" value="<?php echo e($u->id, false); ?>" />
														</form>
														<?php endif; ?>
													</td>
													<?php endif; ?>
												</tr>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
												<tr>
													<td colspan="6"><center><i>No users exist</i></center></td>
												</tr>
												<?php endif; ?>
											</tbody>
										</table>
										<?php echo e($users->links(), false); ?>

									</div>
								</div>
					</div>
              </div><!-- /row -->
          </div><!-- /col-lg-9 END SECTION MIDDLE -->
    </body>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.d_app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>