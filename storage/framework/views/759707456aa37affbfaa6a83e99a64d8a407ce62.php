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
					  <div class="col-lg-12">
                    	<div class="panel panel-default">
							<div class="panel-heading">Statistics</div>
							<div class="panel-body">
								<div class="col-md-4 col-md-offset-4">
									<table class="table table-condensed">
										<tr><td><b>Total Users</b></td><td><b><?php echo e($users_count); ?></b></td></tr>
										<tr class="success"><td><b>Active Users</b></td><td><b><?php echo e($active_users_count); ?></b></td></tr>
										<tr class="danger"><td><b>Suspended Users</b></td><td><b><?php echo e($suspended_users_count); ?></b></td></tr>
									</table>
								</div>
							</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading">Users</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-lg-6 col-lg-offset-6">
								<form method="get" action="/admin/users">
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
							<div style="margin:10px; overflow-x:auto;" class="table-responsive">
								<table class="table table-striped">
									<thead>
										<tr>
											<th>S/No</th>
											<th>Name</th>
											<th>Email</th>
											<th>Role</th>
                      <th>License</th>
											<th>Balance</th>
											<?php if(Auth::user()->isAdmin()): ?>
												<th>Action</th>
											<?php endif; ?>
										</tr>
									</thead>
									<tbody>
										<?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
										<tr>
											<td class="col-md-1"><b><?php echo e($index+1); ?></b></td>
											<td class="col-md-2"><a href="/admin/user/<?php echo e($u->id); ?>"><?php echo e($u->name); ?></a></td>
											<td class="col-md-2"><?php echo e($u->email); ?></td>
											<td class="col-md-1">
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
                      <td class="col-md-2">
                        <?php if($u->license_id != null && $u->license->expires_at->gt(\Carbon\Carbon::now())): ?>
                        <span style="font-size:13px;color:white;background-color:green;padding:5px;">VALID - <?php echo e($u->license->expires_at->toFormattedDateString()); ?></span><br>

                        <?php else: ?>
                        <span style="font-size:13px;color:white;background-color:red;padding:5px;">INVALID</span>
                        <?php endif; ?>
                      </td>
											<td class="col-md-2">
												<input value="<?php echo e($u->balance); ?>" id="balance_<?php echo e($u->id); ?>" style="min-width:70px;" />
											</td>
											<?php if(Auth::user()->isAdmin()): ?>
											<td class="col-md-1">
												<a onclick="submitUserForm(this);" id="<?php echo e($u->id); ?>" class="btn btn-sm btn-primary">
													Save
												</a>
												<?php if(!$u->isAdmin() && ($u->status_id == 4 || $u->status_id == 5)): ?>
												<a onclick="submitForm(this);" form-id="delete-form-<?php echo e($u->id); ?>" form-action="DELETE this user" class="btn btn-sm btn-primary">
													<i style="color:red;" class="fa fa-trash" aria-hidden="true"></i>
												</a>
												<form id="delete-form-<?php echo e($u->id); ?>" action="<?php echo e(url('/delete_user')); ?>" method="POST" style="display: none;">
													<?php echo e(csrf_field()); ?>

													<input type="hidden" name="user" value="<?php echo e($u->id); ?>" />
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
								<?php echo e($users->links()); ?>

							</div>
							<form id="user-form" action="<?php echo e(url('/admin_save_user')); ?>" method="POST" style="display:none">
								<?php echo e(csrf_field()); ?>

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