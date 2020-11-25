

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
						<div class="panel panel-danger">
							<div class="panel-heading">Testimonies</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-sm-6 col-sm-offset-6">
									    <div class="input-group">
									      <input type="text" id="search" class="form-control" value="<?php echo e(app('request')->input('search')); ?>" placeholder="Name or testimony">
									      <span class="input-group-btn">
											<button onclick="searchTable();" class="btn btn-sm btn-default" type="submit">Search</button>
									      </span>
									    </div>
									  </div>
									</div>
								</div>
								<div style="margin:10px; overflow-x:auto;" class="table-responsive">
									<table class="table table-striped">
										<thead>
											<tr>
												<th>S/No</th>
												<th>Name</th>
												<th>Testimony</th>
												<th>Status</th>
												<?php if(Auth::user()->isAdmin()): ?>
													<th>Action</th>
												<?php endif; ?>
											</tr>
										</thead>
										<tbody>
											<?php $__empty_1 = true; $__currentLoopData = $testimonies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
											<tr>
												<td class="col-md-1"><b><?php echo e($index+1); ?></b></td>
												<td class="col-md-2"><?php echo e($t->name); ?></td>
												<td class="col-md-5"><?php echo e($t->testimony); ?></td>
												<td class="col-md-2">
													<select style="min-width:100px;" class="form-control" id="enabled_<?php echo e($t->id); ?>">
														<option value="0" <?php if($t->enabled == 0): ?> selected="selected" <?php endif; ?>>Disabled</option>
														<option value="1" <?php if($t->enabled == 1): ?> selected="selected" <?php endif; ?>>Enabled</option>
													</select>
												</td>
												<?php if(Auth::user()->isAdmin()): ?>
												<td class="col-md-2">
													<a onclick="submitTestimonyForm(this);" id="<?php echo e($t->id); ?>" class="btn btn-sm btn-primary">
														Save
													</a>
													<a onclick="submitForm(this);" form-id="delete-form-<?php echo e($t->id); ?>" form-action="DELETE this testimony" class="btn btn-sm btn-primary">
														<i style="color:red;" class="fa fa-trash-o" aria-hidden="true"></i>
													</a>
													<form id="delete-form-<?php echo e($t->id); ?>" action="<?php echo e(url('/admin_delete_testimony')); ?>" method="POST" style="display: none;">
														<?php echo e(csrf_field()); ?>

														<input type="hidden" name="testimony" value="<?php echo e($t->id); ?>" />
													</form>												
												</td>
												<?php endif; ?>
											</tr>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
											<tr>
												<td colspan="5"><center><i>No testimony exist</i></center></td>
											</tr>
											<?php endif; ?>
										</tbody>
									</table>
									<?php echo e($testimonies->links()); ?>

								</div>
								<form id="testimony-form" action="<?php echo e(url('/admin_save_testimony')); ?>" method="POST" style="display:none">
									<?php echo e(csrf_field()); ?>

									<input type="hidden" name="testimony" value="0" />
									<input type="hidden" name="enabled" value="0" />
								</form>
							</div>	
                    </div>  
                </div>
              </div><!-- /row -->					
          </div><!-- /col-lg-9 END SECTION MIDDLE -->
    </body>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.d_app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>