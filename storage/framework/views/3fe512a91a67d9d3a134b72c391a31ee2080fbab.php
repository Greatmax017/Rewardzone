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
											<tr><td><b>Withdrawals Count</b></td><td><b><?php echo e($paid_users_count, false); ?></b></td></tr>

											<tr class="success"><td><b>Total Paid Amount</b></td><td><b>&#8358;<?php echo e(number_format($paid_withdrawals), false); ?></b></td></tr>
										</table>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="panel panel-default">
								<div class="panel-heading">Withdrawn Transactions</div>
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
											</tr>
										</thead>
										<tbody>
											<?php $__empty_1 = true; $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
											<tr  <?php if($t->suspended): ?> class="success" <?php elseif(!$t->activated): ?> class="warning" <?php endif; ?>>
												<td class="col-md-2"><?php echo e($index+1, false); ?></td>
												<td class="col-md-2"><a href="<?php echo e(url('/admin/user/'.$t->id), false); ?>"><?php echo e(isset($t->username) ? $t->username : '', false); ?></a></td>
												<td  class="col-md-1">&#8358;<?php echo e(number_format($t->withamt, 2), false); ?> <br>

												</td>
	                                            <td class="col-md-3">
													<b>Name:</b> <a href="/admin/user/<?php echo e($t->id, false); ?> "><?php echo e(isset($t->name) ? $t->name : '', false); ?></a> <br />
		                                            <b>Bank:</b> <?php echo e(isset($t->bank) ? $t->bank : '', false); ?> <br />
																								  <b>Account No:</b> <?php echo e(isset($t->accountno) ? $t->accountno : '', false); ?> <br />
		                                            <b>Phone:</b> <?php echo e(isset($t->phone) ? $t->phone : '', false); ?>

												</td>
												<td class="col-md-2"><?php echo e($t->updated_at->toDayDateTimeString(), false); ?></td>
	                                            <td class="col-md-2"><b>
													<?php if($t->suspended): ?>
													<span class="label label-success">Paid</span>
													<?php else: ?>
													<span class="label label-primary">Payout Requested</span>
													<?php endif; ?>
													</b>
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

<?php echo $__env->make('layouts.admin_app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>