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
						 <div class="panel panel-default">
							<div class="panel-heading">Statistics</div>
							<div class="panel-body">
								<div class="col-md-4 col-md-offset-4">
									<table class="table table-condensed">
										<tr><td><b>Total Users</b></td><td><b><?php echo e($users_count, false); ?></b></td></tr>
										<tr class="danger"><td><b>Suspended Users</b></td><td><b><?php echo e($suspended_users_count, false); ?></b></td></tr>
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
										<form id="empty-trash-form" class="form" role="form" method="POST" action="<?php echo e(url('/empty_trash'), false); ?>">
											<?php echo e(csrf_field(), false); ?>

										</form>
									</div>
									<div class="col-lg-6 col-lg-offset-3">
									<form method="get" action="/admin/deleted">
									    <div class="input-group">
									      <input type="text" name="search" class="form-control" value="<?php echo e(app('request')->input('search'), false); ?>" placeholder="Name or Email">
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
												<th>Withdrawal</th>

												<?php if(Auth::user()->isAdmin()): ?>
													<th>Action</th>
												<?php endif; ?>
											</tr>
										</thead>
										<tbody>
											<?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
											<tr <?php if($u->status_id == 4 || $u->status_id == 5): ?> class="danger" <?php elseif($u->status_id == 1 && $u->role == 0): ?> class="success" <?php endif; ?>>
												<td class="col-md-1"><b><?php echo e($index+1, false); ?></b></td>
												<td class="col-md-2"><a href="/admin/user/<?php echo e($u->id, false); ?>"><?php echo e($u->name, false); ?></a></td>
												<td class="col-md-2"><?php echo e($u->email, false); ?></td>
												<td class="col-md-2">
													<select style="min-width:70px;" class="form-control" id="role_<?php echo e($u->id, false); ?>">
													<?php if($u->role != 2): ?>
														<option value="0" <?php if($u->role == 0): ?> selected="selected" <?php endif; ?>>user</option>
														<option value="1" <?php if($u->role == 1): ?> selected="selected" <?php endif; ?>>reader</option>
														<option value="2">admin</option>
													<?php else: ?>
														<option value="2">admin</option>
													<?php endif; ?>
													</select>
												</td>
												<td class="col-md-2" >

												</td>
												<td class="col-md-2">
												 <?php echo e($u->withamt, false); ?>

												</td>
												<?php if(Auth::user()->isAdmin()): ?>
												<td class="col-md-4">
													<a onclick="submitForm(this);" form-id="restore-form-<?php echo e($u->id, false); ?>" form-action="Restore this user" class="btn btn-sm btn-primary">
														Restore
													</a>
													<a onclick="submitForm(this);" form-id="delete-form-<?php echo e($u->id, false); ?>" form-action="Permanently DELETE this user" class="btn btn-sm btn-default">
														<i style="color:red;" class="fa fa-trash-o" aria-hidden="true"></i>
													</a>
													<form id="restore-form-<?php echo e($u->id, false); ?>" action="<?php echo e(url('/restore/delete_user'), false); ?>" method="POST" style="display: none;">
														<?php echo e(csrf_field(), false); ?>

														<input type="hidden" name="user" value="<?php echo e($u->id, false); ?>" />
													</form>
													<form id="delete-form-<?php echo e($u->id, false); ?>" action="<?php echo e(url('/permanent/delete_user'), false); ?>" method="POST" style="display: none;">
														<?php echo e(csrf_field(), false); ?>

														<input type="hidden" name="user" value="<?php echo e($u->id, false); ?>" />
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
									<?php echo e($users->links(), false); ?>

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

<?php echo $__env->make('layouts.admin_app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>