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
                    <div class="col-md-12">
						 <div class="panel panel-default">
							<div class="panel-heading">Statistics</div>
							<div class="panel-body">
								<div class="col-md-4 col-md-offset-4">
									<table class="table table-condensed">
										<tr><td><b>Total Users</b></td><td><b><?php echo e($users_count); ?></b></td></tr>
										<tr><td><b>Matched Users</b></td><td><b><?php echo e($matched_users_count); ?></b></td></tr>
										<tr class="warning"><td><b>GH Users</b></td><td><b><?php echo e($gh_users_count); ?></b></td></tr>
										<tr class="success"><td><b>PH Users</b></td><td><b><?php echo e($ph_users_count); ?></b></td></tr>
										<tr class="danger"><td><b>Suspended Users</b></td><td><b><?php echo e($suspended_users_count); ?></b></td></tr>
									</table>
								</div>
							</div>
						</div>
						<div class="panel panel-danger">
							<div class="panel-heading">Deleted Users</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-lg-3">
										<a class="btn btn-xs btn-danger" onclick="submitForm(this);" form-id="empty-trash-form" form-action="Permanently delete all users in trash"><i class="fa fa-trash-o"></i> Empty Trash</a></p><br />
										<form id="empty-trash-form" class="form" role="form" method="POST" action="<?php echo e(url('/empty_trash')); ?>">
											<?php echo e(csrf_field()); ?>

										</form>
									</div>
									<div class="col-lg-6 col-lg-offset-3">
									<form method="get" action="/admin/deleted">
									    <div class="input-group">
									      <input type="text" name="search" class="form-control" value="<?php echo e(app('request')->input('search')); ?>" placeholder="Name or Email">
									      <span class="input-group-btn">
										<button class="btn btn-sm btn-default" type="submit">Search</button>
									      </span>
									    </div>
									    </form>
									  </div>
									</div>
								</div>
								<div style="margin:10px;" class="table-responsive">
									<table class="table table-striped">
										<thead>
											<tr>
												<th>S/No</th>
												<th>Name</th>
												<th>Email</th>
												<th>Role</th>
												<th>Matched</th>
												<th>Status</th>
												<?php if(Auth::user()->isAdmin()): ?>
													<th>Action</th>
												<?php endif; ?>
											</tr>
										</thead>
										<tbody>
											<?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
											<tr <?php if($u->status_id == 4 || $u->status_id == 5): ?> class="danger" <?php elseif($u->status_id == 1 && $u->role == 0): ?> class="success" <?php endif; ?>>
												<td class="col-md-1"><b><?php echo e($index+1); ?></b></td>
												<td class="col-md-2"><a href="/admin/user/<?php echo e($u->id); ?>"><?php echo e($u->name); ?></a></td>
												<td class="col-md-2"><?php echo e($u->email); ?></td>
												<td class="col-md-2">
													<select style="min-width:70px;" class="form-control" id="role_<?php echo e($u->id); ?>">
													<?php if($u->role != 2): ?>
														<option value="0" <?php if($u->role == 0): ?> selected="selected" <?php endif; ?>>user</option>
														<option value="1" <?php if($u->role == 1): ?> selected="selected" <?php endif; ?>>reader</option>
														<option value="2">admin</option>
													<?php else: ?>
														<option value="2">admin</option>
													<?php endif; ?>
													</select>
												</td>
												<td class="col-md-2" <?php if($u->matched == 2): ?> style="background-color:red;" <?php endif; ?>>
													<select style="max-width:60px;" class="form-control" id="matched_<?php echo e($u->id); ?>">
														<option value="0" <?php if($u->matched == 0): ?> selected="selected" <?php endif; ?>>0</option>
														<option value="1" <?php if($u->matched == 1): ?> selected="selected" <?php endif; ?>>1</option>
														<option value="2" <?php if($u->matched == 2): ?> selected="selected" <?php endif; ?>>2</option>
													</select>
												</td>
												<td class="col-md-3">
													<select style="max-width:150px;" class="form-control" id="status_<?php echo e($u->id); ?>">
														<option value="1" <?php if($u->status_id == 1): ?> selected="selected" <?php endif; ?>>Can PH</option>
														<option value="2" <?php if($u->status_id == 2): ?> selected="selected" <?php endif; ?>>Matched to PH</option>
														<option value="3" <?php if($u->status_id == 3): ?> selected="selected" <?php endif; ?>>Can GH</option>
														<option value="4" <?php if($u->status_id == 4): ?> selected="selected" <?php endif; ?>>Suspended (Complaint)</option>
														<option value="5" <?php if($u->status_id == 5): ?> selected="selected" <?php endif; ?>>Suspended (System)</option>
													</select>
												</td>
												<?php if(Auth::user()->isAdmin()): ?>
												<td class="col-md-4">
													<a onclick="submitForm(this);" form-id="restore-form-<?php echo e($u->id); ?>" form-action="Restore this user" class="btn btn-sm btn-primary">
														Restore
													</a>
													<a onclick="submitForm(this);" form-id="delete-form-<?php echo e($u->id); ?>" form-action="Permanently DELETE this user" class="btn btn-sm btn-default">
														<i style="color:red;" class="fa fa-trash-o" aria-hidden="true"></i>
													</a>
													<form id="restore-form-<?php echo e($u->id); ?>" action="<?php echo e(url('/restore/delete_user')); ?>" method="POST" style="display: none;">
														<?php echo e(csrf_field()); ?>

														<input type="hidden" name="user" value="<?php echo e($u->id); ?>" />
													</form>
													<form id="delete-form-<?php echo e($u->id); ?>" action="<?php echo e(url('/permanent/delete_user')); ?>" method="POST" style="display: none;">
														<?php echo e(csrf_field()); ?>

														<input type="hidden" name="user" value="<?php echo e($u->id); ?>" />
													</form>													
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
									<?php echo e($users->links()); ?>

								</div>
							</div>
				                    </div>
				                </div>
				                <br />
				        </div>
				            <!-- /. PAGE INNER  -->
				    </div>	
              </div><!-- /row -->					
          </div><!-- /col-lg-9 END SECTION MIDDLE -->
    </body>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.d_app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>