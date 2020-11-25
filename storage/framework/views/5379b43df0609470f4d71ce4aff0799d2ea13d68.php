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
											<tr><td><b>Transactions Count</b></td><td><b><?php echo e($transactions_count, false); ?></b></td></tr>
											<tr><td><b>Transactions Today</b></td><td><b><?php echo e($transactions_today_count, false); ?></b></td></tr>
											<tr class="success"><td><b>Total Active Shares</b></td><td><b><?php echo e(number_format($active_shares), false); ?></b></td></tr>
										</table>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="panel panel-default">
								<div class="panel-heading">All Transactions</div>
								<div class="panel-body">
									<div class="row">
										<div class="col-lg-6">
											<a href="/admin/withdrawn" class="btn btn-primary">Show completed withdrawals</a>
										</div>
										<div class="col-lg-6">
										    <form method="GET" action="/admin/transactions">
											    <div class="input-group">
											      <input type="text" name="search" class="form-control" value="<?php echo e(app('request')->input('search'), false); ?>" placeholder="Transaction ID or Email">
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
	                                            <th>Amount</th>
	                                            <th>Sender/Description</th>
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
												<td  class="col-md-1">
													<b><?php echo isset($t->receiver_data->currency) ? $t->receiver_data->currency : $t->sender_data->currency; ?><?php echo e(number_format($t->amount), false); ?></b><br>
													<?php if($t->status == 0 && $t->receiver == 0): ?>
														<small>
														<?php echo isset($t->receiver_data->currency) ? $t->receiver_data->currency : $t->sender_data->currency; ?>

														<?php if($t->sender_data->is_executive): ?>
															<?php if($t->days < 90): ?>
															<?php echo e(number_format(round($t->amount * pow($setting->executive_rate, $t->days), 2)), false); ?>

															<?php else: ?>
															<?php echo e(number_format(round($t->amount * pow($setting->executive_rate, 90), 2)), false); ?>

															<?php endif; ?>
														<?php else: ?>
															<?php if($t->days < 15): ?>
															<?php echo e(number_format(round($t->amount * pow($setting->normal_rate, $t->days), 2)), false); ?>

															<?php else: ?>
															<?php echo e(number_format(round($t->amount * pow($setting->normal_rate, 15), 2)), false); ?>

															<?php endif; ?>
														<?php endif; ?>
														&nbsp;(<?php echo e($t->days, false); ?>)
														</small>
													<?php endif; ?>

												</td>
												<td class="col-md-2"><a href="/admin/user/<?php echo e($t->sender, false); ?>"><?php echo e(isset($t->sender_data->email) ? $t->sender_data->email : "", false); ?></a>
												<br><i><?php echo e($t->description, false); ?></i></td>
	                                            <td class="col-md-3">
	                                            	<?php if($t->receiver != 0): ?>
	                                            	<?php if($t->status == 0): ?>
													<b>Name:</b> <?php echo e(isset($t->receiver_data->name) ? $t->receiver_data->name : '', false); ?> <br />
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
												<td class="col-md-2"><?php echo e($t->created_at->toDayDateTimeString(), false); ?><br><small><?php echo e($t->updated_at->toDayDateTimeString(), false); ?></small></td>
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
	                                                 <?php endif; ?>
													 												 <!--a data-url="/admin_transaction/<?php echo e($t->id, false); ?>" onclick="deleteRowDialog(this);" data-msg="this transaction" class="btn btn-xs btn-danger"><i class="fa fa-trash-o"></i></a-->
																									 <a href="#" data-toggle="modal" data-target="#tr-<?php echo e($t->id, false); ?>" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i></a>
																									 <div id="tr-<?php echo e($t->id, false); ?>" class="modal fade" role="dialog">
																										 <div class="modal-dialog">
																											 <!-- Modal content-->
																											 <div class="modal-content">
																												 <div class="modal-header">
																												 <h4 class="modal-title">Edit Transaction</h4>
																												</div>
																												<div class="modal-body">
																													 <form action="<?php echo e(url('/admin_edit_transaction'), false); ?>" method="POST">
																														 <?php echo e(csrf_field(), false); ?>

																														 <input type="hidden" name="transaction" value="<?php echo e($t->id, false); ?>">
																														 <div class="form-group">
																															 <label class="control-label">Amount:</label>
																															 <input class="form-control" type="number" name="amount" step="3" value="<?php echo e($t->amount, false); ?>" />
																														 </div>
																														 <div class="form-group">
																															 <label class="control-label">Description:</label>
																															 <textarea class="form-control" name="description"><?php echo e($t->description, false); ?></textarea>
																														 </div>
																														 <div class="form-group">
																															 <label class="control-label">Status:</label>
																															 <select name="status" class="form-control" value="<?php echo e($t->status, false); ?>">
																																 <option value="0">Pending</option>
																																 <option value="1">Completed</option>
																																 <option value="2">Cancel (Failed)</option>
																															 </select>
																														 </div>
																														 <div class="form-group">
																															 <center>
																																 <button type="submit" class="btn btn-sm btn-primary">Edit</button><br>
																																 <small>Please be very sure before you save because these changes have no history and the update time is affected thus the user might be aware of the change</small>
																															 </center>
																														 </div>
																													 </form>
																												 </div>
																											 </div>
																										 </div>
																									</div>
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