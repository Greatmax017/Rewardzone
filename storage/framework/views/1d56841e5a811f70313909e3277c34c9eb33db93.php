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
										<div class="col-lg-6 col-lg-offset-6">
										    <form method="GET" action="<?php echo e(url('/admin/transactions'), false); ?>">
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
											<tr>
												<td class="col-md-2"><?php echo e(isset($t->id) ? $t->id : '', false); ?></td>
												<td  class="col-md-1">
													<b>$<?php echo e(number_format($t->amount, 2), false); ?></b><br>
												</td>
												<td class="col-md-2"><a href="<?php echo e(url('/admin/user/'.$t->sender), false); ?>"><?php echo e(isset($t->sender_data->email) ? $t->sender_data->email : "", false); ?></a>
												<br><i><?php echo e($t->description, false); ?></i>
												<?php if($t->paid_to != null): ?><br> Generated Address: <?php echo e($t->paid_to, false); ?><?php endif; ?></td>
	                                            <td class="col-md-3">
	                                            	<?php if($t->receiver != 0): ?>
	                                            	<?php if($t->status == 0): ?>
													<b>Wallet ID:</b> <?php echo e(isset($t->receiver_data->bitcoin_wallet_id) ? $t->receiver_data->bitcoin_wallet_id : '', false); ?> <br />
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
													<?php if($t->status == 0): ?>
													<span class="label label-warning">Confirmation Requested</span>
													<?php elseif($t->status == 1): ?>
													<span class="label label-warning">Yielding Interest (<?php echo e($t->days, false); ?>)</span>
													<?php elseif($t->status == 2): ?>
													<span class="label label-primary">Payout Requested</span>
													<?php elseif($t->status == 3): ?>
													<span class="label label-success">Paid</span>
													<?php else: ?>
													<span class="label label-danger">Failed</span>
													<?php endif; ?>
													</b>
												</td>
	                                            <td>
	                                                <?php if($t->status == 0 && $t->sender != 0 && $t->paid_to == null): ?>
	                                                <a onclick="submitForm(this);" form-id="confirm-investment-form-<?php echo e($t->id, false); ?>" form-action="confirm this investment" style="margin-top:5px; margin-bottom:5px;" class="btn btn-sm btn-info">
													    Confirm Investment
													</a>
	                                                <form style="display:none;" id="confirm-investment-form-<?php echo e($t->id, false); ?>" class="form" role="form" method="POST" action="<?php echo e(url('/admin/confirm_investment'), false); ?>">
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
																			 <input class="form-control" type="number" name="amount" step="0.0000001" value="<?php echo e($t->amount, false); ?>" />
																		 </div>
																		 <div class="form-group">
																			 <label class="control-label">Description:</label>
																			 <textarea class="form-control" name="description"><?php echo e($t->description, false); ?></textarea>
																		 </div>
																		 <div class="form-group">
																			 <label class="control-label">Status:</label>
																			 <select name="status" class="form-control" value="<?php echo e($t->status, false); ?>">
																				 <option value="0">Confirmation Requested</option>
																				 <option value="1">Yielding Interest</option>
																				 <option value="2">Payout Requested</option>
																				 <option value="3">Paid</option>
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