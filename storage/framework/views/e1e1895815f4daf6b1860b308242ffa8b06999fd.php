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
								<div class="col-lg-4">
									<?php if(app('request')->input('type') == 1): ?>
									<a class="btn btn-primary btn-block" href="<?php echo e(url('/admin/users'), false); ?>">Show All Users</a>
									<?php else: ?>
									<a class="btn btn-success btn-block" href="<?php echo e(url('/admin/users'), false); ?>?type=1">Show Executive Users</a>
									<?php endif; ?>
								</div>
								<div class="col-lg-6 col-lg-offset-2">
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
											<th>Country</th>
											<th>Role</th>
											<th>Active Shares</th>
											<th>Affilliate</th>
											<?php if(Auth::user()->isAdmin()): ?>
												<th>Action</th>
											<?php endif; ?>
										</tr>
									</thead>
									<tbody>
										<?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
										<tr <?php if($u->suspended): ?> class="danger" <?php endif; ?>>
											<td class="col-md-1"><b><?php echo e($index+1, false); ?></b></td>
											<td class="col-md-2">
												<a href="<?php echo e(url('/admin/user/'.$u->id), false); ?>"><?php echo e($u->name, false); ?></a>
												<br>
												<?php if($u->referred_count() > 19 && $u->referred_count() < 40): ?>
												<b>MANAGER</b>
												<?php elseif($u->referred_count() > 39 && $u->referred_count() < 80): ?>
												<b>PROFESSIONAL MANAGER</b>
												<?php elseif($u->referred_count() > 79 && $u->referred_count() < 160): ?>
												<b>ASSOCIATE</b>
												<?php elseif($u->referred_count() > 160): ?>
												<b>PARTNER</b>
												<?php endif; ?>
											</td>
											<td class="col-md-2"><?php echo e($u->email, false); ?></td>
											<td class="col-md-1"><?php echo e($u->country, false); ?></td>
											<td class="col-md-1">
												<?php if($u->role != 2): ?>
												<select style="min-width:70px;" class="form-control" id="role_<?php echo e($u->id, false); ?>">
													<option value="0" <?php if($u->role == 0): ?> selected="selected" <?php endif; ?>>user</option>
													<option value="1" <?php if($u->role == 1): ?> selected="selected" <?php endif; ?>>reader</option>
													<option value="2">admin</option>
												</select>
												<?php else: ?>
													<b>Admin</b>
												<?php endif; ?>
											</td>
											<td class="col-md-2">
												<strong><?php echo $u->currency; ?><?php echo e(number_format(\App\Transaction::where('sender', $u->id)->where('status', 0)->where('receiver', 0)->sum('amount')), false); ?></strong><br>
												<a href="#" data-toggle="modal" data-target="#share-<?php echo e($u->id, false); ?>" class="btn btn-xs btn-primary">
													<i class="fa fa-plus"></i>
													Add Share
												</a>
												<div id="share-<?php echo e($u->id, false); ?>" class="modal fade" role="dialog">
									  			  <div class="modal-dialog">
									    			    <!-- Modal content-->
									    			    <div class="modal-content">
									    			      <div class="modal-header">
									          				<h4 class="modal-title">Add Shares</h4>
									          			 </div>
									          			 <div class="modal-body">
									            				<form action="<?php echo e(url('/admin_add_shares'), false); ?>" method="POST">
									            					<?php echo e(csrf_field(), false); ?>

									            					<input type="hidden" name="user" value="<?php echo e($u->id, false); ?>">
									            					<div class="form-group">
									            						<label class="control-label">Value of shares Purchased(<?php echo $u->currency; ?>):</label>
									            						<input class="form-control" type="number" name="shares" />
									            					</div>
									            					<div class="form-group">
									            						<center>
									            							<button type="submit" class="btn btn-sm btn-primary">Add</button>
									            						</center>
									            					</div>
									            				</form>
									      			      </div>
									    			    </div>
									  			  </div>
  									  			</div>
											</td>
											<td class="col-md-1">
												<?php if($u->is_affiliate == 0): ?>
												<a href="<?php echo e(url('/admin_user_affiliate/'.$u->id), false); ?>" class="btn btn-xs btn-success">
													<i class="fa fa-check"></i>
													Make Affiliate
												</a>
												<?php else: ?>
												<a href="<?php echo e(url('/admin_user_affiliate/'.$u->id), false); ?>" class="btn btn-xs btn-danger">
													<i class="fa fa-times"></i>
													Disable Affiliate
												</a>
												<?php endif; ?>
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
											<td colspan="2"><center><i>No users exist</i></center></td>
										</tr>
										<?php endif; ?>
									</tbody>
								</table>
								<?php echo e($users->links(), false); ?>

							</div>
							<form id="user-form" action="<?php echo e(url('/admin_save_user'), false); ?>" method="POST" style="display:none">
								<?php echo e(csrf_field(), false); ?>

								<input type="hidden" name="user" value="0" />
								<input type="hidden" name="balance" value="0" />
								<input type="hidden" name="role" value="0" />
							</form>
						</div>
                    </div>
                </div>
              </div><!-- /row -->
          </div><!-- /col-lg-9 END SECTION MIDDLE -->
    </body>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.d_app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>