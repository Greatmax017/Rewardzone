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
              			<div class="panel panel-default">
							<div class="panel-heading">Statistics</div>
							<div class="panel-body">
								<div class="col-md-4 col-md-offset-4">
									<table class="table table-condensed">
										<tr><td><b>Total Transactions</b></td><td><b><?php echo e(isset($transactions_count) ? $transactions_count : 0); ?></b></td></tr>
										<tr><td><b>Transactions Today</b></td><td><b><?php echo e($transactions_today_count); ?></b></td></tr>
										<tr class="warning"><td><b>Waiting Transactions</b></td><td><b><?php echo e($waiting_transactions_count); ?></b></td></tr>
										<tr class="success"><td><b>Successful Transactions</b></td><td><b><?php echo e($successful_transactions_count); ?></b></td></tr>
										<tr class="danger"><td><b>Failed Transactions</b></td><td><b><?php echo e($failed_transactions_count); ?></b></td></tr>
										<tr class="success"><td><b>Cleared Transactions</b></td><td><b><?php echo e($cleared_transactions_count); ?></b></td></tr>
										<tr class="warning"><td><b>Uncleared Transactions</b></td><td><b><?php echo e($uncleared_transactions_count); ?></b></td></tr>
									</table>
								</div>
							</div>
					</div>
						<div class="panel panel-default">
							<div class="panel-heading">All Transactions</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-lg-6 col-lg-offset-6">
									    <form method="GET" action="/admin/transactions">
										    <div class="input-group">
										      <input type="text" name="search" class="form-control" value="<?php echo e(app('request')->input('search')); ?>" placeholder="Transaction ID or Email">
										      <span class="input-group-btn">
											<button class="btn btn-sm btn-default" type="submit">Search</button>
										      </span>
										    </div>
									    </form>
									  </div>
									</div>
								</div>
								
								<div class="table-responsive">
								<table class="table">
									<thead>
										<tr>
											<th>ID</th>
											<th>Detail</th>
											<th>Upload</th>
											<th>Date</th>
										</tr>
									</thead>
									<tbody>
										<?php $__empty_1 = true; $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
										<tr <?php if($t->status == 1): ?> class="success" <?php elseif($t->status == 2): ?> class="danger" <?php else: ?> class="warning" <?php endif; ?> >
											<td class="col-md-2"><?php echo e(isset($t->id) ? $t->id : ''); ?></td>
											<td class="col-md-6"><b>Amount:</b><?php if($t->category_data !== null): ?>&#8358;<?php echo e(number_format($t->category_data->amount)); ?><?php endif; ?><br />
											<b>Sender:</b> <?php if($t->sender != 0): ?> <?php echo e(isset($t->sender_data->email) ? $t->sender_data->email : ''); ?> <?php else: ?> <?php echo e(isset($t->category_data->default_user_data->email) ? $t->category_data->default_user_data->email : ''); ?> <?php endif; ?><br />
											<b>Receiver:</b> <?php if($t->receiver != 0): ?> <?php echo e(isset($t->receiver_data->email) ? $t->receiver_data->email : ''); ?> <?php else: ?> <?php echo e(isset($t->category_data->default_user_data->email) ? $t->category_data->default_user_data->email : ''); ?> <?php endif; ?><br /><br />
											<center><i><b><?php if($t->status == 1): ?> Completed <?php elseif($t->status == 2): ?> Failed <?php else: ?> Waiting <?php endif; ?></b></i></center></td>
											<td class="col-md-1"><?php if($t->confirmation_image != null): ?> <a href="/<?php echo e($t->confirmation_image); ?>" target="_blank">View</a> <?php endif; ?></td>
											<td class="col-md-4"><?php echo e($t->created_at->toDayDateTimeString()); ?></td>
										</tr>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
										<tr>
											<td colspan="3"><center><i>No Transactions</i></center></td>
										</tr>
										<?php endif; ?>
									</tbody>
								</table>
								</div>
								<?php echo e($transactions->links()); ?>

							</div> 
                    </div>
              </div><!-- /row -->					
          </div><!-- /col-lg-9 END SECTION MIDDLE -->
    </body>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.d_app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>