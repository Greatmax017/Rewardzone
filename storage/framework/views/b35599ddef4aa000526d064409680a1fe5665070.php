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
              <div class="row">
              		<div class="col-md-12">
                        <div class="col-md-12">
	              			<div class="panel panel-default">
								<div class="panel-heading">Statistics</div>
								<div class="panel-body">
									<div class="col-md-12">
										<table class="table table-condensed">
											<tr><td><b>Withdrawals Count</b></td><td><b><?php echo e($transactions_count, false); ?></b></td></tr>
											<tr><td><b>Withdrawals Today</b></td><td><b><?php echo e($transactions_today_count, false); ?></b></td></tr>
											<tr class="success"><td><b>Total Paid Amount</b></td><td><b><?php echo e(number_format($paid_withdrawals), false); ?></b></td></tr>
										</table>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="panel panel-default">
								<div class="panel-heading">Withdrawal Transactions</div>
								<div class="panel-body">
									<div class="table-responsive">
									<table class="table">
										<thead>
											<tr>
												<th>ID</th>
	                                            <th>Amount</th>
												<th>Detail</th>
												<th>Date</th>
	                                            <th>Status</th>
	                                            <th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php $__empty_1 = true; $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
											<tr <?php if($t->status == 1): ?> class="success" <?php elseif($t->status == 2): ?> class="danger" <?php else: ?> class="warning" <?php endif; ?> >
												<td class="col-md-2"><?php echo e(isset($t->id) ? $t->id : '', false); ?></td>
												<td  class="col-md-1"><b><?php echo isset($t->receiver_data->currency) ? $t->receiver_data->currency : $t->sender_data->currency; ?><?php echo e(number_format($t->amount), false); ?></b></td>
	                                            <td class="col-md-3">
	                                            	<?php if($t->receiver != 0): ?>
	                                            	<?php if($t->status == 0): ?>
													<b>Name:</b> <a href="/admin/user/<?php echo e($t->receiver, false); ?> "><?php echo e(isset($t->receiver_data->name) ? $t->receiver_data->name : '', false); ?></a> <br />
		                                            <b>Bank:</b> <?php echo e(isset($t->receiver_data->bank_name) ? $t->receiver_data->bank_name : '', false); ?> <br />
		                                            <b>Account Number:</b> <?php echo e(isset($t->receiver_data->account_number) ? $t->receiver_data->account_number : '', false); ?> <br />
		                                            <b>Phone:</b> <?php echo e(isset($t->receiver_data->phone) ? $t->receiver_data->phone : '', false); ?>

		                                            <?php else: ?>
		                                            <a href="/admin/user/<?php echo e($t->receiver, false); ?>"><?php echo e(isset($t->receiver_data->email) ? $t->receiver_data->email : "", false); ?></a>
		                                            <?php endif; ?>
		                                            <?php else: ?>
		                                            <b> SYSTEM </b>
		                                            <?php endif; ?>
												</td>
												<td class="col-md-2"><?php echo e($t->created_at->toDayDateTimeString(), false); ?></td>
	                                            <td class="col-md-2"><b>
	                                            	    <?php if($t->status == 1): ?>
															<span style="color:green;">Completed</span>
														<?php elseif($t->status == 0): ?>
															<span style="color:orange;">Pending</span>
														<?php else: ?>
															<span style="color:red;">Failed</span>
														<?php endif; ?>
													</b>
												</td>
	                                            <td>
	                                                <?php if($t->status == 0 && $t->sender == 0): ?>
	                                                <a onclick="submitForm(this);" form-id="confirm-payment-form-<?php echo e($t->id, false); ?>" form-action="confirm payment of $<?php echo e(number_format($t->amount), false); ?>" style="margin-top:5px; margin-bottom:5px;" class="btn btn-sm btn-info">
													    Confirm Payment
													</a>
	                                                <form style="display:none;" id="confirm-payment-form-<?php echo e($t->id, false); ?>" class="form" role="form" method="POST" action="<?php echo e(url('/confirm_ph'), false); ?>">
	            										<?php echo e(csrf_field(), false); ?>

	            										<input type="hidden" value="<?php echo e($t->id, false); ?>" name="transaction" >
	            									</form>
                                                    <a onclick="submitForm(this);" form-id="reject-payment-form-<?php echo e($t->id, false); ?>" form-action="reject payment of $<?php echo e(number_format($t->amount), false); ?>" style="margin-top:5px; margin-bottom:5px;" class="btn btn-xs btn-danger">
													    Reject
													</a>
	                                                <form style="display:none;" id="reject-payment-form-<?php echo e($t->id, false); ?>" class="form" role="form" method="POST" action="<?php echo e(url('/reject_ph'), false); ?>">
	            										<?php echo e(csrf_field(), false); ?>

	            										<input type="hidden" value="<?php echo e($t->id, false); ?>" name="transaction" >
	            									</form>
	                                                 <?php endif; ?>
	                                             </td>
											</tr>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
											<tr>
												<td colspan="3"><center><i>No Transactions</i></center></td>
											</tr>
											<?php endif; ?>
										</tbody>
									</table>
									</div>
									<?php echo e($transactions->links(), false); ?>

								</div>
						</div>
                    </div>
              </div><!-- /row -->
          </div><!-- /col-lg-9 END SECTION MIDDLE -->
    </body>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.d_app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>