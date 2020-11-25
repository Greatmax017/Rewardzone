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
                        <br>
                    	<div class="panel panel-danger">
							<div class="panel-heading">Generated PIN Codes</div>
							<div class="panel-body table-responsive">
								<table class="table">
									<thead>
										<tr>
											<th>PIN</th>
											<th>Value</th>
											<th>User</th>
                                            <th>Created</th>
                                            <th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php $__empty_1 = true; $__currentLoopData = $pincodes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
										<tr>
											<td class="col-md-2"><b><?php echo e($c->pincode); ?></b></td>
											<td class="col-md-2"><b><?php echo e($c->value_in_months); ?></b></td>
                                            <td class="col-md-2"><b><?php if(!is_null($c->user)): ?><?php echo e($c->user->email); ?><?php endif; ?></b></td>
                                            <td class="col-md-2"><b><?php echo e($c->created_at->toDayDateTimeString()); ?></b></td>
											<td class="col-md-2">
                                                <?php if(Auth::user()->isAdmin()): ?>
                                                <div class="col-sm-3">
                                                    <a onclick="submitForm(this);" form-id="pin-delete-form-<?php echo e($c->id); ?>" form-action="delete this pin code" class="btn btn-sm btn-danger">
                                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                    </a>
                                                </div>
                                                <?php endif; ?>
												<form id="pin-delete-form-<?php echo e($c->id); ?>" class="form" role="form" method="POST" action="<?php echo e(url('/admin_delete_pin')); ?>">
													<?php echo e(csrf_field()); ?>

													<input type="hidden" value="<?php echo e($c->id); ?>" name="pin" >
												</form>
											</td>
										</tr>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
										<tr>
											<td colspan="5"><center><i>No Pin Codes Created yet</i></center></td>
										</tr>
										<?php endif; ?>
									</tbody>
								</table>
								<?php if(Auth::user()->isAdmin()): ?>
								<div class="form-group">
									<center>
										<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#newCategory">Add New Activation Pin</button>
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
				<h4 class="modal-title">New Activation Pin</h4>
			      </div>
			      <div class="modal-body">
				<form id="new_cat" action="<?php echo e(url('/admin_add_pin')); ?>" method="POST">
					<?php echo e(csrf_field()); ?>

					<div class="form-group">
						<label class="control-label">Value In Months:</label>
						<input type="number" class="form-control" name="value" required autofocus>
					</div>
					<div class="form-group">
						<center>
							<button type="submit" class="btn btn-sm btn-danger">Generate</button>
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