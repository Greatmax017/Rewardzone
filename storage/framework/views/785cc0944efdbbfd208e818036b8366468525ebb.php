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
              		<div class="col-md-8 col-md-offset-2">
                    	<div class="panel panel-danger">
							<div class="panel-heading">Categories</div>
							<div class="panel-body table-responsive">
								<table class="table">
									<thead>
										<tr>
											<th>Name</th>
											<th>Amount</th>
											<th>Next Match</th>
										</tr>
									</thead>
									<tbody>
										<?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
										<tr>
											<td class="col-md-2"><b><?php echo e($c->name); ?></b></td>
											<td class="col-md-2"><b>&#8358;<?php echo e(number_format($c->amount)); ?></b></td>
											<td class="col-md-8">
												<form id="cat-form-<?php echo e($c->id); ?>" action="<?php echo e(url('/admin_save_category')); ?>" method="POST">
													<?php echo e(csrf_field()); ?>

													<input type="hidden" name="category" value="<?php echo e($c->id); ?>" />
													<div class="col-sm-6">
														<input type="email" class="form-control" name="next_match" placeholder="Next match email" value="<?php echo e(isset($c->next_user_data->email) ? $c->next_user_data->email : ''); ?>" />
													</div>
													<div class="col-sm-1">
														<label><input type="checkbox" name="enable" <?php if($c->status == 1): ?> checked="checked" <?php endif; ?> /><b>En.</b></label>
													</div>
													<?php if(Auth::user()->isAdmin()): ?>
													<div class="col-sm-3">
														<a onclick="submitForm(this);" form-id="cat-form-<?php echo e($c->id); ?>" form-action="Save this user as the default user for this category" class="btn btn-sm btn-primary">
															 Save
														</a>
														<a onclick="submitForm(this);" form-id="cat-delete-form-<?php echo e($c->id); ?>" form-action="delete this category" class="btn btn-sm btn-danger">
															<i class="fa fa-trash-o" aria-hidden="true"></i>
														</a>
													</div>
													<?php endif; ?>
												</form>
												<form id="cat-delete-form-<?php echo e($c->id); ?>" class="form" role="form" method="POST" action="<?php echo e(url('/admin_delete_category')); ?>">
													<?php echo e(csrf_field()); ?>

													<input type="hidden" value="<?php echo e($c->id); ?>" name="category" >
												</form>
											</td>
										</tr>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
										<tr>
											<td colspan="3"><center><i>No Categories added yet</i></center></td>
										</tr>
										<?php endif; ?>
									</tbody>
								</table>
								<?php if(Auth::user()->isAdmin()): ?>
								<div class="form-group">
									<center>
										<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#newCategory">Add New Category</button>
									</center>
								</div>
								<?php endif; ?>
							</div>
						</div>	
                    </div>
              </div><!-- /row -->					
        </div><!-- /col-lg-9 END SECTION MIDDLE -->
        <div id="newCategory" class="modal fade" role="dialog">
			  <div class="modal-dialog">

			    <!-- Modal content-->
			    <div class="modal-content">
			      <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">New Category</h4>
			      </div>
			      <div class="modal-body">
				<form id="new_cat" action="<?php echo e(url('/admin_add_category')); ?>" method="POST">
					<?php echo e(csrf_field()); ?>

					<div class="form-group">
						<label class="control-label">Package name:</label>
						<input type="text" class="form-control" name="name" required autofocus>
					</div>
					<div class="form-group">
						<label class="control-label">Amount:</label>
						<input type="number" class="form-control" name="amount" required autofocus>
					</div>
					<div class="form-group">
						<center>
							<button type="submit" class="btn btn-sm btn-danger">Save</button>
						</center>
					</div>
				</form>
			      </div>
			    </div>

			  </div>
		</div>
    </body>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.d_app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>