<?php $__env->startSection('content'); ?>
<!-- Inner Page Header serction start here -->
<div class="inner-page-header">
    <div class="container">
        <div class="row">
             <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                 <div class="header-page-title">
                     <h2>Welcome <?php echo e(Auth::user()->name); ?> </h2>
                 </div>
             </div>
             <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                 <div class="header-page-locator">
                     <ul>
                         <li><a href="/">Home /</a> Back-Office</li>
                     </ul>
                 </div>
             </div>
        </div>
    </div>
</div>
<!-- Inner Page Header serction end here -->
<div class="container">
  <iframe height="400" scrolling="no" src="https://www.dailyforex.com/forex-widget/widget/25079" style="width: 100%; height:300px; display: block;border:0px;overflow:hidden;"></iframe>
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

              <div class="row">
                  <div class="col-lg-12">
                  	<div class="row">
                  		<div class="col-md-3 col-sm-3">
	                  			<div class="alert alert-info">
                            <center>
          						  			<h4 style="margin-bottom: 10px;"><i class="fa fa-money"></i> Total Active Shares</h4>
                              <h3 style="margin-bottom: 10px;">&#36;<?php echo e(number_format(\App\Transaction::where('sender', Auth::user()->id)->where('created_at', '>=', \Carbon\Carbon::now()->subMonths(12)->toDateTimeString())->sum('amount'))); ?></h3>
                              <a href="<?php echo e(url('/transaction_history')); ?>" class="btn btn-xs btn-primary">Transaction History</a>
                            </center>
	                  			</div>
	                  	</div>

	                  	<div class="col-md-3 col-sm-3">
	                  			<div class="alert alert-success">
                            <center>
	                  				<h4 style="margin-bottom: 10px;"><i class="fa fa-money"></i> Next Profit</h4>
                              <h3 style="margin-bottom: 10px;">&#36;<?php if($next_share != null): ?><?php echo e(number_format($next_share->amount)); ?><?php else: ?> 0 <?php endif; ?></h3>
                              <br>
                            </center>
	                  			</div>
	                  	</div>

                      <div class="col-md-3 col-sm-3">
	                  			<div class="alert alert-warning">
                            <center>
                              <h4 style="margin-bottom: 10px;"><i class="fa fa-clock-o"></i> Date Due (Next Profit)</h4>
                              <h3 style="margin-bottom: 10px;"><?php if($next_share != null): ?><?php echo e($next_share->created_at->toFormattedDateString()); ?><?php else: ?> NA <?php endif; ?>
                              </h3>
                              <br>
                            </center>
	                  			</div>
	                  	</div>

                      <div class="col-md-3 col-sm-3">
                          <div class="alert alert-danger">
                            <center>
                              <h4 style="margin-bottom: 10px;"><i class="fa fa-user"></i> Referral Count</h4>
                              <h3 style="margin-bottom: 10px;"> <?php echo e(\App\User::where('referrer_id', Auth::user()->id)->count()); ?>

                              </h3>
                              <a href="<?php echo e(url('/referred_bonus')); ?>" class="btn btn-xs btn-danger">Referral/Affiliate Panel</a>
                            </center>
                          </div>
                      </div>
                  	</div><!-- /row mt -->
                    <div style="background:white;" class="row mt">
                        <!-- SERVER STATUS PANELS -->
	                    <div class="col-md-5">
                        <br />
                        <div class="panel panel-primary">
                          <div class="panel-heading">Active Purchased Shares</div>
                          <div class="panel-body">
                            <div class="table-responsive" style="height: 200px;">
                                <table class="table">
                                  <thead>
                                    <tr>
                                      <th>ID</th>
                                      <th>Amount</th>
                                      <th>Purchased</th>
                                      <th>Expires</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = $active_shares; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $uc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                      <tr>
                                        <td><?php echo e(substr($uc->id,0,13)); ?></td>
                                        <td>&#36;<?php echo e(number_format($uc->amount)); ?></td>
                                        <td><?php echo e($uc->created_at->toFormattedDateString()); ?></td>
                                        <td><?php echo e($uc->created_at->addMonths(12)->toFormattedDateString()); ?></td>
                                      </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                      <tr>
                                        <td colspan="5"><center><i><b>You have not purchased any shares yet</b></i></center></td>
                                      </tr>
                                    <?php endif; ?>
                                  </tbody>
                                </table>
                            </div>

                          </div>
                        </div>
                      </div>
                      <div class="col-md-7">
	                    	<br />
	                    	<div class="panel panel-primary">
	                    		<div class="panel-heading">10 Days Profit</div>
          								<div class="panel-body">
                            <div class="table-responsive" style="height: 200px;">
              									<table class="table">
              										<thead>
              											<tr>
              												<th>ID</th>
              												<th>Amount</th>
                                      <th>Date Requested</th>
                                      <th>Status</th>
              												<th>Action</th>
              											</tr>
              										</thead>
              										<tbody>
              											<?php $__empty_1 = true; $__currentLoopData = $gh_trans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $uc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
              												<tr>
              													<td><?php echo e(substr($uc->id,0,13)); ?></td>
              													<td>&#8358;<?php echo e(number_format($uc->amount)); ?></td>
              													<td><?php echo e($uc->created_at->toDayDateTimeString()); ?></td>
                                                                  <td>
                                                                      <?php if($uc->status == 0): ?>
                                                                      <?php if($uc->sender_confirm == 1): ?>
                                  										<p class="card-info"><span style="color:green;">PAID</span><br>You have <b><span style="color:red;" form-id="rc-form-<?php echo e($uc->id); ?>" time="<?php echo e(($settings->confirmation_time * 3600) + $uc->updated_at->timestamp); ?>" class="clock"></span></b><br>
                                                                          to confirm receipt of the money.<br>
                                  										<a onclick="submitForm(this);" form-id="complain-form-<?php echo e($uc->id); ?>" form-action="Dispute this transaction">I didnt see the money</a></p><br />
                                  										<form id="complain-form-<?php echo e($uc->id); ?>" class="form" role="form" method="POST" action="<?php echo e(url('/complain_rc')); ?>">
                                  											<?php echo e(csrf_field()); ?>

                                  											<input type="hidden" value="<?php echo e($uc->id); ?>" name="transaction" >
                                  										</form>
                                  									<?php else: ?>
                                  									    <span style="color:blue;">PENDING</span>
                                  									<?php endif; ?>
                                                                      <?php else: ?>
                                                                          <span style="color:red;">RESOLVING</span>
                                                                      <?php endif; ?>
                                                                  </td>
                                                                  <td>
                                                                      <a onclick="submitForm(this);" form-id="rc-form-<?php echo e($uc->id); ?>" form-action="confirm receipt of &#8358;<?php echo e($uc->amount); ?>" class="btn btn-xs btn-primary">
                                                                              Confirm Receipt
                                                                      </a>
                                                                      <form id="rc-form-<?php echo e($uc->id); ?>" class="form" role="form" method="POST" action="<?php echo e(url('/confirm_rc')); ?>">
                                  										<?php echo e(csrf_field()); ?>

                                  										<input type="hidden" value="<?php echo e($uc->id); ?>" name="transaction" >
                                  									</form>
                                                                  </td>
              												</tr>
              											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
              												<tr>
              													<td colspan="5"><center><i><b>You have no profit from shares yet</b></i></center></td>
              												</tr>
              											<?php endif; ?>
              										</tbody>
              									</table>
                            </div>

          								</div>
							          </div>
	                    </div>
                      <div class="col-md-12">
                        <br />
                        <div class="panel panel-warning">
                          <div class="panel-heading">Affiliates/Representatives</div>
                          <div class="panel-body" style="font-size: 18px;">
                            <?php if(count($affiliates) > 0): ?>
                            <p>Below is a comprehensive list of our affiliates and trusted representatives in <?php echo e(Auth::user()->country); ?>. In order to buy shares, you have to contact any of these people via their contact email or phone number. They will guide you on the process and your transactions can begin.</p>
                            <div class="table-responsive">
                                <table class="table">
                                  <thead>
                                    <tr>
                                      <th>Name</th>
                                      <th>Email</th>
                                      <th>Phone</th>
                                      <th>Country</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php $__currentLoopData = $affiliates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $uc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <tr>
                                        <td><?php echo e($uc->name); ?></td>
                                        <td><?php echo e($uc->email); ?></td>
                                        <td><?php echo e($uc->phone); ?></td>
                                        <td><?php echo e($uc->country); ?></td>
                                      </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  </tbody>
                                </table>
                            </div>
                            <?php else: ?>
                            <center>There are currently no affiliates in <?php echo e(Auth::user()->country); ?>. Shares can only be purchased via bitcoin. Make a payment to the bitcoin account below and send a support message to get your shares activated. Then you can start receiving your profit. <br><br>Bitcoin Wallet ID: <b><?php echo e($settings->bitcoin_wallet_id); ?></b><br></center>
                            <?php endif; ?>

                          </div>
                        </div>
                      </div>
	                </div>
                 </div><!-- /rw -->
              </div><!-- /col-lg-9 END SECTION MIDDLE -->
           </section>
        </section>
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
              						<label class="control-label">Testimony (Please let others know what you think of TodayLift):</label>
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
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>