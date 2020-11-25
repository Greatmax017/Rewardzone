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
					      <center> <?php echo e(session('success-status')); ?></center>
					    </div>
					</div>
				<?php endif; ?>
				
				<?php if($settings->match_status == 0): ?>
				<center>
					<div class="alert alert-info">
					  <h5>Matching Paused</h5>
					</div>
				<center>
				<?php endif; ?>
              <div class="row">
                  <div class="col-lg-12">
                  	<div class="row">
                  		<div class="col-md-3 col-sm-3 hidden-xs box0">
	                  			<div class="box1">
						  			<h3><i class="fa fa-credit-card"></i> Amount Received <br />&#8358;<?php echo e(number_format(Auth::user()->amount_received)); ?></h3>
	                  			</div>
	                  	</div>
	                  	<div class="col-md-3 col-sm-3 hidden-xs box0">
	                  			<div class="box1">
	                  				<h3><i class="fa fa-credit-card"></i> Amount Paid <br />&#8358;<?php echo e(number_format(Auth::user()->amount_payed)); ?> </h3>
	                  			</div>
	                  	</div>
	                  	<div class="col-md-3 col-sm-3 box0">
	                  			<div class="box1">
	                  				<h3 style="color:red;"><i class="fa fa-credit-card"></i> Locked Balance <br />&#8358;<?php echo e(number_format(Auth::user()->locked_balance)); ?></h3>
	                  			</div>
	                  	</div>
	                  	<div class="col-md-3 col-sm-3 box0">
	                  			<div class="box1">
	                  				<h3 style="color:green;"><i class="fa fa-credit-card"></i> Cleared Balance <br />&#8358;<?php echo e(number_format(Auth::user()->cleared_balance)); ?></h3>
	                  			</div>
	                  	</div>
                  	</div><!-- /row mt -->
                  	<?php if(Auth::user()->status_id == 1): ?>
                  	<div class="row">
                  		<form id="get-donation-form" class="form" role="form" method="POST" action="<?php echo e(url('/get_donation')); ?>">
							<?php echo e(csrf_field()); ?>

							<div class="form-group">
							    <div class="col-sm-6 col-sm-offset-3">
								<center>
									<a onclick="<?php if(Auth::user()->cleared_balance >= $min_withdraw): ?> submitForm(this); <?php else: ?> showLessThan(this); <?php endif; ?>" data="<?php echo e($min_withdraw); ?>" form-id="get-donation-form" form-action="get donation of all cleared balance" style="margin-top:10px; margin-bottom:25px;" class="btn btn-lg btn-success">
									    Get Help
									</a>
								</center>
							    </div>
							</div>
						</form>
                  	</div>
                  	<?php endif; ?>	
		            <hr />
                    <div style="background:white;" class="row mt">
                    <!-- SERVER STATUS PANELS -->
                    <div class="col-md-6">
                    <?php if(Auth::user()->status_id != 4): ?>
						<?php if(Auth::user()->status_id == 1 || Auth::user()->status_id == 6): ?>
						<div class="col-lg-12">
							
							<div class="row">
				                <div class="col-md-12">
				                	<br />
				                    <div class="panel panel-danger">
				                    	<center>
											<?php if(Auth::user()->status_id == 1): ?>
												<h4>Click on the package option to view details and Provide Help</h4>
											<?php else: ?>
												<i><h4>You will soon be matched to provide help under your current selected package please hold on. If you choose to change the package before you are matched you can PH on another package below</h4></i>
												<br>
											<?php endif; ?>
										</center>
				                        <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
				                        <div class="panel-body">
				                            <div class="panel-group" id="accordion">
				                                <div class="panel panel-success">
				                                    <div class="panel-heading">
				                                        <h4 class="panel-title">
				                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo e($c->id); ?>" class="<?php if(Auth::user()->category_id != $c->id): ?> collapsed <?php endif; ?>"><?php echo e($c->name); ?> package - &#8358;<?php echo e(number_format($c->amount)); ?> <b>(Click Here)</b></a>
				                                        </h4>
				                                    </div>
				                                    <div id="collapse<?php echo e($c->id); ?>" class="panel-collapse collapse <?php if(Auth::user()->category_id == $c->id): ?> in <?php endif; ?>">
				                                        <div class="panel-body">
				                                            <?php if($c->status == 1): ?>
				                                            This is the <?php echo e($c->name); ?> package valued at &#8358;<?php echo e(number_format($c->amount)); ?><br /> 
				                                            <span style="color:red; font-weight:20px;">Please ensure you have the money at hand before clicking on the Provide help button because if you do not make donation within <?php echo e($settings->payment_time); ?> hour(s), your account will be deleted</span></p>
					                                        <center>
					                                        <?php if(Auth::user()->status_id == 1 || (Auth::user()->status_id == 6 && Auth::user()->category_id != $c->id)): ?>
					                                        <a onclick="submitForm(this);" form-id="provide-help-form-<?php echo e($c->id); ?>" form-action="provide help of &#8358;<?php echo e(number_format($c->amount)); ?>" class="btn btn-lg btn-success">
															    Provide Help
															</a>
															<?php endif; ?>
															<?php if(Auth::user()->status_id == 6 && Auth::user()->category_id == $c->id): ?>
																	<i><b>Matching... Please Give us a moment</b></i>
															<?php endif; ?>
															</center>
															<form id="provide-help-form-<?php echo e($c->id); ?>" class="form" role="form" method="POST" action="<?php echo e(url('/ph')); ?>" style="display: none;">
																<?php echo e(csrf_field()); ?>

																<input type="hidden" value="<?php echo e($c->id); ?>" name="category">
															</form>
															<?php else: ?>
																	<center><b><i>Package Loading...</i></b></center>
															<?php endif; ?>
				                                        </div>
				                                    </div>
				                                </div>
				                            </div>
				                        </div>
				                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
				                        <center><i>No Packages</i></center>
										<?php endif; ?>
				                    </div>
				                </div>
				            </div>
						</div>
						<?php elseif(Auth::user()->status_id == 2 && $ph_trans != null): ?>
						<div class="row">
							<div class="col-sm-8 col-sm-offset-2">
								<?php if($ph_trans->sender_confirm == 0): ?>
								<div class="row">
									<center>
										<div class="alert alert-danger">
										  <h5>Time Left: <b><span id="ph-clock" time="<?php echo e(($settings->payment_time * 3600) + $ph_trans->created_at->timestamp); ?>" class="clock"></span></b></h5>
										</div>
									</center>
								</div>
								<?php endif; ?>
								<div>
									<table class="table table-condensed">
										<tbody>
											<tr><td><b>Transaction#:</b></td><td> <?php echo e(substr($ph_trans->id,0,13)); ?><br /></td></tr>
											<tr><td><b>Account Name:</b></td><td><b><?php echo e(isset($ph_trans->receiver_data->name) ? $ph_trans->receiver_data->name : ''); ?></b></td></tr>
											<tr><td><b>Account Number:</b></td><td><b><?php echo e(isset($ph_trans->receiver_data->account_number) ? $ph_trans->receiver_data->account_number : ''); ?></b></td></tr>
											<tr><td><b>Bank:</b></td><td><b><?php echo e(isset($ph_trans->receiver_data->bank->name) ? $ph_trans->receiver_data->bank->name : ''); ?></b></td></tr>
											<tr><td><b>Amount:</b></td><td> <b>&#8358;<?php echo e(number_format($ph_trans->category_data->amount)); ?></b></td></tr>
											<tr><td><b>Phone Number:</b></td><td><?php echo e(isset($ph_trans->receiver_data->phone) ? $ph_trans->receiver_data->phone : ''); ?></td></tr>
										</tbody>
									</table>
								</div>
							
								<br />
								<?php if($ph_trans->sender_confirm == 0): ?>
									<form id="confirm-payment-form" class="form" role="form" method="POST" action="<?php echo e(url('/confirm_ph')); ?>" enctype="multipart/form-data">
										<?php echo e(csrf_field()); ?>

										<input type="hidden" value="<?php echo e($ph_trans->id); ?>" name="transaction" >
										<div class="col-sm-6 col-sm-offset-3">
											<label for="confirmation_image">Upload Proof of Payment (optional):</label>
											<input type="file" name="confirmation_image" accept="image/*">
										</div>
										<br />
										<div class="form-group">
										    <div class="col-sm-6 col-sm-offset-3">
											<center>
												<a onclick="submitForm(this);" form-id="confirm-payment-form" form-action="confirm payment of the amount" style="margin-top:10px; margin-bottom:25px;" class="btn btn-sm btn-info">
												    Confirm Payment
												</a>
											</center>
										    </div>
										</div>
									</form>
									<form id="refresh-match-form" class="form" role="form" method="POST" action="<?php echo e(url('/refresh_ph')); ?>">
										<?php echo e(csrf_field()); ?>

										<input type="hidden" value="<?php echo e($ph_trans->id); ?>" name="transaction" >
										<div class="col-sm-6 col-sm-offset-3">
										<div class="form-group">
											<label class="control-label">Package</label>
											<select class="form-control" name="category">
											<?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
												<?php if(Auth::user()->category_id == $c->id): ?>
													<option value="<?php echo e($c->id); ?>" selected="selected">&#8358;<?php echo e(number_format($c->amount)); ?></option>
												<?php else: ?>
													<option value="<?php echo e($c->id); ?>">&#8358;<?php echo e(number_format($c->amount)); ?></option>
												<?php endif; ?>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
												<option>none</option>
											<?php endif; ?>
											</select>
										</div>
										</div>
										<div class="form-group">
										    <div class="col-sm-6 col-sm-offset-3">
											<center>
												<a onclick="submitForm(this);" form-id="refresh-match-form" form-action="refresh match user" class="btn btn-xs btn-info">
												    Refresh Match
												</a>
												<br />
												<i>Refresh <b><?php echo e(Auth::user()->refresh_count); ?></b> out of <b><?php echo e($settings->refresh_count); ?></b></i>
											</center>
										    </div>
										</div>
									</form>
								<?php else: ?>
									<center>
										<h5><i>Confirmed. Waiting for receiver to confirm</i></h5>
									</center>
								<?php endif; ?>
						 
							</div>
						</div>
						<?php elseif(Auth::user()->status_id == 3): ?>
							<center><i><h5>Matching to Get Donation... <br /> Please have patience</h5></i></center>
						<?php elseif(Auth::user()->status_id == 5): ?>
							<center>
								<i><h4><span style="color:red; font-weight:20px;">Your account was suspended due to <b>non-completion of transaction</b>. 
								If you do not complete your next payment transaction, your account will be deleted</span></h4></i>
							</center>
						
							<center>
								<a onclick="submitForm(this);" form-id="unsuspend-form" form-action="unsuspend account" class="btn btn-xs btn-primary">
								    Release My Account
								</a>
							</center>
						
							<form id="unsuspend-form" class="form" role="form" method="POST" action="<?php echo e(url('/unsuspend_acct')); ?>">
								<?php echo e(csrf_field()); ?>

							</form>
						<?php else: ?>
							<center>
								<i><h5><span style="color:red; font-weight:20px;">Please Contact support, there is a problem with this account</span></h5></i>
							</center>
							<?php if(Auth::user()->status_id == 7): ?>
								<center><i><h5><span style="color:red; font-weight:20px;"><b>PURGE ALERT</b> You have purged 4 times consecutively in a row therefore this account was suspended</span></h5></i></center>
							<?php endif; ?>

						<?php endif; ?>
					     <?php else: ?>
						<div class="col-md-12">
							<center>
								<i><h4>A report has caused this account to be suspended pending resolution of this complaint. 
								We assure you that this issue will be resolved <b>within 30minutes</b>. To resolve this issue much faster, you can send a message to support</h4></i>
							</center>
						</div>				
					     <?php endif; ?>
		                    </div>
		                    <div class="col-md-6">
		                    	<br />
		                    	<div class="panel panel-danger">
		                    		<div class="panel-heading">Uncleared Donations</div>
									<div class="panel-body">
										<table class="table table-condensed">
											<thead>
												<tr>
													<th>ID</th>
													<th>Locked Amount</th>
													<th>Unlock date</th>
												</tr>
											</thead>
											<tbody>
												<?php $__empty_1 = true; $__currentLoopData = $ucld_trans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $uc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
													<?php if($uc->half_locked == 0): ?>
													<tr>
														<td><?php echo e(substr($uc->id,0,13)); ?></td>
														<td>&#8358;<?php echo e(number_format($uc->category_data->amount * 2)); ?></td>
														<td><?php echo e($uc->updated_at->addHours($settings->get_donation_time + 1)->toDayDateTimeString()); ?></td>
													</tr>
													<?php else: ?>
														<?php if($uc->cleared_status == 0): ?>
														<tr>
															<td><?php echo e(substr($uc->id,0,13)); ?></td>
															<td>&#8358;<?php echo e(number_format($uc->category_data->amount)); ?></td>
															<td><?php echo e($uc->updated_at->addHours($settings->get_donation_time + 1)->toDayDateTimeString()); ?></td>
														</tr>
														<?php endif; ?>
														<tr>
															<td><?php echo e(substr($uc->id,0,13)); ?></td>
															<td>&#8358;<?php echo e(number_format($uc->category_data->amount)); ?></td>
															<td>Locked till next PH</td>
														</tr>
														
													<?php endif; ?>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
													<tr>
														<td colspan="3"><center><i><b>You have no locked balance. provide help now to get Help</b></i></center></td>
													</tr>
												<?php endif; ?>
											</tbody>
										</table>
										
									</div>
								</div>
		                    </div>
		                </div>
		                <br />
		                <hr />
		                <br />
		                <div>
		                <div class="panel panel-success">
						<div class="panel-body">
						<?php $__empty_1 = true; $__currentLoopData = $gh_trans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
							<div class="col-lg-6">
								<div style="max-width:380px;" class="receipt-card table-responsive">
									<?php if($t->type == 1): ?>
									<center>
										<p><b>BONUS</b></p>
									</center>
									<?php endif; ?>
									<table class="table">
										<tbody>
										<tr><td><b>Transaction#:</b></td><td><?php echo e(substr($t->id, 0, 13)); ?></td></tr>
										<tr><td><b>Sender:</b></td><td><b><?php echo e(isset($t->sender_data->name) ? $t->sender_data->name : 'WP System'); ?></b></td></tr>
										<tr><td><b>Amount:</b></td><td><b>&#8358;<?php echo e(number_format($t->category_data->amount)); ?></b></td></tr>
										<tr><td><b>Phone:</b></td><td><?php echo e(isset($t->sender_data->phone) ? $t->sender_data->phone : 'none'); ?></td></tr>
										</tbody>
									</table>
									<center>
										<a style="margin-left:20px;margin-bottom:10px;" onclick="submitForm(this);" form-id="rc-form-<?php echo e($t->id); ?>" form-action="confirm receipt of &#8358;<?php echo e($t->category_data->amount); ?> from <?php echo e(isset($t->sender_data->name) ? $t->sender_data->name : 'WP System'); ?>" class="btn btn-sm btn-success">
											    Confirm Receipt
										</a>
									</center>
									<?php if($t->sender_confirm == 1): ?>
										<br />
										<p class="card-info">The sender has confirmed payment into your account. You have <b><span style="color:red;" form-id="rc-form-<?php echo e($t->id); ?>" time="<?php echo e(($settings->confirmation_time * 3600) + $t->updated_at->timestamp); ?>" class="clock"></span></b> to confirm receipt of the money. If after a while you dont receive the money
										<a onclick="submitForm(this);" form-id="complain-form-<?php echo e($t->id); ?>" form-action="Dispute this transaction">Report this transaction</a></p><br />
										<?php if($t->confirmation_image != null): ?>
											<center>Click <a href="<?php echo e($t->confirmation_image); ?>">here</a> to view proof of payment</center>
										<?php endif; ?>
										<form id="complain-form-<?php echo e($t->id); ?>" class="form" role="form" method="POST" action="<?php echo e(url('/complain_rc')); ?>">
											<?php echo e(csrf_field()); ?>

											<input type="hidden" value="<?php echo e($t->id); ?>" name="transaction" >
										</form>
									<?php else: ?>
										<center class="card-info">The sender has <b><span time="<?php echo e(($settings->payment_time * 3600) + $t->created_at->timestamp); ?>" class="clock"></span></b> left to make payment</center> 
									<?php endif; ?>
									<form id="rc-form-<?php echo e($t->id); ?>" class="form" role="form" method="POST" action="<?php echo e(url('/confirm_rc')); ?>">
										<?php echo e(csrf_field()); ?>

										<input type="hidden" value="<?php echo e($t->id); ?>" name="transaction" >
									</form>
									<hr />
								</div> 
							</div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
							<center><i><h5>No pending GD transactions </h5></i></center>
						<?php endif; ?>
				</div>
           </div><!-- /rw -->					
         </div><!-- /col-lg-9 END SECTION MIDDLE -->
      	<?php if(session('show_testimony_modal')): ?> 
      	<div id="newTestimony" class="modal fade" role="dialog">
			  <div class="modal-dialog">

			    <!-- Modal content-->
			    <div class="modal-content">
			      <div class="modal-header">
				<h4 class="modal-title">Your Testimony is important to us</h4>
			      </div>
			      <div class="modal-body">
				<form id="new_cat" action="<?php echo e(url('/share_testimony')); ?>" method="POST">
					<?php echo e(csrf_field()); ?>

					<div class="form-group">
						<label class="control-label">Testimony (Please let others know what you think of Achievers Empire):</label>
						<textarea class="form-control" name="testimony"></textarea>
					</div>
					<div class="form-group">
						<center>
							<button type="submit" class="btn btn-sm btn-danger">Publish</button>
						</center>
					</div>
				</form>
			      </div>
			    </div>

			  </div>
		</div>
		<?php endif; ?>
    </body>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.d_app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>