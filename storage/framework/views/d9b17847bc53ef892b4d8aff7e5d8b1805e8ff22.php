<?php $__env->startSection('content'); ?>
<!-- Inner Page Header serction start here -->
<div class="inner-page-header">
    <div class="container">
        <div class="row">
             <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                 <div class="header-page-title">
                     <h2>Transaction History </h2>
                 </div>
             </div>
             <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                 <div class="header-page-locator">
                     <ul>
                         <li><a href="<?php echo e(url('/dashboard'), false); ?>">Back-Office /</a> Transactions</li>
                     </ul>
                 </div>
             </div>
        </div>
    </div>
</div>
<!-- Inner Page Header serction end here -->
<div class="container">
  <iframe height="25" scrolling="no" src="https://www.dailyforex.com/forex-widget/widget/25080" style="width: 100%; height:25px; display: block;border:0px;overflow:hidden;"></iframe><span style="position:relative;display:block;text-align:center;color:#333333;width:100%;font-family:Tahoma,sans-serif;font-size:10px;"></span>

	<!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper" style="margin-top:10px;">

          		<?php if(session('error-status')): ?>
					<div class="alert alert-danger alert-dismissable">
					    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					    <div class="container-fluid">
					      <center><b>Error:</b> <?php echo e(session('error-status'), false); ?></center>
					    </div>
					</div>
				<?php endif; ?>
				<?php if(session('success-status')): ?>
					<div class="alert alert-success alert-dismissable">
					    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					    <div class="container-fluid">
					      <center> <?php echo e(session('success-status'), false); ?></center>
					    </div>
					</div>
				<?php endif; ?>

              <div class="row">
                <div class="col-md-10 col-md-offset-1">
					 <div class="panel panel-primary">
							<div class="panel-heading">Transaction History List</div>
							<div class="panel-body">
                <div class="row">
                  <div class="col-lg-6 col-lg-offset-6">
                      <form method="GET" action="/transaction_history">
                        <div class="input-group">
                          <input type="text" name="search" class="form-control" value="<?php echo e(app('request')->input('search'), false); ?>" placeholder="Transaction ID or Email">
                          <span class="input-group-btn">
                      <button class="btn btn-sm btn-default" type="submit">Search</button>
                          </span>
                        </div>
                      </form>
                    </div>
                  </div>
								<div class="table-responsive">
								<table class="table">
									<thead>
										<tr>
											<th>ID</th>
											<th>Amount</th>
                                            <th>Desc</th>
                                            <?php if(Auth::user()->is_affiliate || Auth::user()->role ==2): ?>
                                            <th>Receiver</th>
                                            <?php endif; ?>
											<th>Date</th>
											<th>Status</th>
										</tr>
									</thead>
									<tbody>
										<?php $__empty_1 = true; $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
										<tr <?php if($t->status == 1): ?> class="success" <?php elseif($t->status == 2): ?> class="danger" <?php else: ?> class="warning" <?php endif; ?> >
											<td class="col-md-2"><?php echo e(substr($t->id, 0, 13), false); ?></td>
											<td class="col-md-1"><?php echo Auth::user()->currency; ?><?php echo e(number_format($t->amount), false); ?></td>
                                            <td class="col-md-3"><?php echo e($t->description, false); ?></td>
                                            <?php if(Auth::user()->is_affiliate || Auth::user()->role ==2): ?>
                                            <td class="col-md-3"><?php if($t->receiver_data != null): ?><?php echo e($t->receiver_data->email, false); ?><?php else: ?> SYSTEM <?php endif; ?></td>
                                            <?php endif; ?>
											<td class="col-md-4"><?php echo e($t->created_at->toDayDateTimeString(), false); ?></td>
											<td><i><?php if($t->status == 1): ?> Completed <?php elseif($t->status == 2): ?> Failed <?php else: ?> Waiting <?php endif; ?></i></td>
										</tr>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
										<tr>
											<td colspan="4"><center><i>No Transactions yet</i></center></td>
										</tr>
										<?php endif; ?>
									</tbody>
								</table>
								</div>
								<?php echo e($transactions->links(), false); ?>

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
           </section>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>