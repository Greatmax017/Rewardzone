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
              <div class="row">
                <div class="col-md-10 col-md-offset-1">
					 <div class="panel panel-danger">
							<div class="panel-heading">Transaction History List</div>
							<div class="panel-body">
								<div class="table-responsive">
								<table class="table">
									<thead>
										<tr>
											<th>ID</th>
											<th>Detail</th>
											<th>Upload</th>
											<th>Date</th>
											<th>Status</th>
										</tr>
									</thead>
									<tbody>
										<?php $__empty_1 = true; $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
										<tr <?php if($t->status == 1): ?> class="success" <?php elseif($t->status == 2): ?> class="danger" <?php else: ?> class="warning" <?php endif; ?> >
											<td class="col-md-2"><?php echo e(substr($t->id, 0, 13)); ?></td>
											<td class="col-md-5"><b>Amount:</b> <?php if($t->category_data !== null): ?>&#8358;<?php echo e(number_format($t->category_data->amount)); ?><?php endif; ?><br />
											<b>Sender:</b> <?php if($t->sender != 0): ?> <?php echo e(isset($t->sender_data->email) ? $t->sender_data->email : ''); ?> <?php else: ?> <?php echo e(isset($t->category_data->default_user_data->email) ? $t->category_data->default_user_data->email : ''); ?> <?php endif; ?><br />
											<b>Receiver:</b> <?php if($t->receiver != 0): ?> <?php echo e(isset($t->receiver_data->email) ? $t->receiver_data->email : ''); ?> <?php else: ?> <?php echo e(isset($t->category_data->default_user_data->email) ? $t->category_data->default_user_data->email : ''); ?> <?php endif; ?></td>
											<td class="col-md-1"><?php if($t->confirmation_image != null): ?> <a href="/<?php echo e($t->confirmation_image); ?>" target="_blank">View</a> <?php endif; ?></td>
											<td class="col-md-4"><?php echo e($t->created_at->toDayDateTimeString()); ?></td>
											<td><i><b><?php if($t->status == 1): ?> Completed <?php elseif($t->status == 2): ?> Failed <?php else: ?> Waiting <?php endif; ?></b></i></td>
										</tr>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
										<tr>
											<td colspan="3"><center><i>No Transactions yet</i></center></td>
										</tr>
										<?php endif; ?>
									</tbody>
								</table>
								</div>
								<?php echo e($transactions->links()); ?>

								<div class="form-group">
								    <div style="margin-top:20px;" class="col-md-8 col-md-offset-2 text-center">
									<a href="/dashboard" class="btn btn-sm btn-danger">
									    Back to Dashboard
									</a><br /><br />
								    </div>
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