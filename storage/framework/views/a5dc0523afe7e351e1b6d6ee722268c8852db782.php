<?php $__env->startSection('content'); ?>
<body>
	<div id="wrapper">
		<?php echo $__env->make('sections.d_header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?><br>
		<?php echo $__env->make('sections.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?><br><br>
		<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/598de409dbb01a218b4dbf1f/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
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
                  		<div class="col-md-4 col-sm-4 box0">
	                  			<div class="box1">
						  			<h3><i class="fa fa-money"></i> All Earnings <br />&#8358;<?php echo e(number_format(Auth::user()->amount_received)); ?></h3>
	                  			</div>
	                  	</div>

	                  	<div class="col-md-4 col-sm-4 box0">
	                  			<div class="box1">
	                  				<h3 style="color:green;"><i class="fa fa-money"></i> E-wallet <br />&#8358;<?php echo e(number_format(Auth::user()->balance)); ?></h3>
	                  			</div>
	                  	</div>

                      <div class="col-md-4 col-sm-4 box0">
	                  			<div class="box1">
	                  				<h3><i class="fa fa-credit-card"></i> Account Status <br />
                              <?php if(Auth::user()->license_id != null && Auth::user()->license->expires_at->gt(\Carbon\Carbon::now())): ?>
                              <span style="font-size:13px;color:white;background-color:green;padding:5px;">VALID till <?php echo e(Auth::user()->license->expires_at->toFormattedDateString()); ?></span><br>

                              <?php else: ?>
                              <span style="font-size:13px;color:white;background-color:red;padding:5px;">INVALID</span>
                              <?php endif; ?>
                            </h3>
	                  			</div>
	                  	</div>
                  	</div><!-- /row mt -->
                  	<center><p>Dear Participant, all october eanings has now been paid, if you still have issues with your payment please send message to support,<br>
                  	we would be celeberating our three month anniversary next week monday and bonus will be given to the participant with over 10 referrals.<br>Thanks for your participation</p></center>
                  	<div class="row">
                      <?php if(Auth::user()->license_id != null && Auth::user()->license->expires_at->gt(\Carbon\Carbon::now())): ?>
                  		<form id="get-donation-form" class="form" role="form" method="POST" action="<?php echo e(url('/get_donation')); ?>">
          							<?php echo e(csrf_field()); ?>

                        <div class="form-group">
          							    <div class="col-sm-6 col-sm-offset-3">
          								<center>
          									<input type="number" placeholder="Withdrawal Amount" class="form-control" name="amount" style="margin-top:20px;font-size:28px;padding:15px;height:60px;max-width:350px;text-align:center;" />
          								</center>
          							    </div>
          							</div>
          							<div class="form-group">
          							    <div class="col-sm-6 col-sm-offset-3">
          								<center>
          									<a onclick="<?php if(Auth::user()->balance >= $settings->min_withdraw): ?> submitForm(this); <?php else: ?> showLessThan(this); <?php endif; ?>" data="<?php echo e($settings->min_withdraw); ?>" form-id="get-donation-form" form-action="make this withdrawal" style="margin-top:10px; margin-bottom:25px;" class="btn btn-lg btn-success">
          									    Withdraw Funds
          									</a>
          								</center>
          							    </div>
          							</div>
          						</form>
                      <?php else: ?>
                      <center>
                        <br>
                        Activate your membership on this platform by subscribing at &#8358;10,000. Click on the button below to subscribe via online payment using atm card. OR buy pin from accredited pin dealers by clicking on pin activation<br>
                        <a href="/make-payment" class="btn btn-sm btn-success" style="margin-top:10px;">Subscribe now</a>
                         <a data-toggle="modal" data-target="#newActivation" class="btn btn-sm btn-success" style="margin-top:10px;">Pin Activation</a>

                      </center>
                      <?php endif; ?>
                  	</div>
		            <hr />
                    <div style="background:white;" class="row mt">
                        <!-- SERVER STATUS PANELS -->
	                    <div class="col-md-10 col-md-offset-1">
	                    	<br />
	                    	<div class="panel panel-primary">
	                    		<div class="panel-heading">Pending Withdrawal Request</div>
								<div class="panel-body">
                                    <div class="table-responsive">
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
    													<td colspan="5"><center><i><b>You have no pending withdrawal requests</b></i></center></td>
    												</tr>
    											<?php endif; ?>
    										</tbody>
    									</table>
                                    </div>

								</div>
							</div>
	                    </div>
	                </div>
                 </div><!-- /rw -->
              </div><!-- /col-lg-9 END SECTION MIDDLE -->
              <!--=== Recent Posts ===-->
          	<div class="container content-sm">
          		<div class="headline-center-v2 headline-center-v2-dark">
          			<center><h3>Recent News</h3></center>
          		</div><!--/Headline Center V2-->

          		<div class="row">
                      <?php $__empty_1 = true; $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
          			<div class="col-sm-4">
          				<div class="thumbnails-v1">
          					<div class="thumbnail-img">
          						<img class="img-responsive" style="max-height:200px;width:100%;" src="<?php echo e($p->thumbnail); ?>" alt="">
          					</div>
          					<div class="caption">
          						<h4><a href="/blog/<?php echo e($p->url); ?>"><?php echo e($p->title); ?></a></h4>
          						<p style="text-align:justify;"><?php echo substr(strip_tags($p->content), 0, 300); ?>...</p>
          						<p><a class="read-more" href="/blog/<?php echo e($p->url); ?>">See More</a></p>
          					</div>
          				</div>
          			</div>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                      <?php endif; ?>
          		</div>
          	</div><!--/container-->
          	<!--=== End Recent Posts ===-->
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
        <div id="newActivation" class="modal fade" role="dialog">
			  <div class="modal-dialog">

			    <!-- Modal content-->
			    <div class="modal-content">
			      <div class="modal-header">
				<h4 class="modal-title">Pin Activation</h4>
			      </div>
			      <div class="modal-body">
				<form action="<?php echo e(url('/pin_activation')); ?>" method="POST">
					<?php echo e(csrf_field()); ?>

					<div class="form-group">
						<label class="control-label">Enter Valid Pin:</label>
						<input class="form-control" name="pin" placeholder="XXXXXXXXXX" />
					</div>
					<div class="form-group">
						<center>
							<button type="submit" class="btn btn-sm btn-danger">Activate</button>
						</center>
					</div>
				</form>
			      </div>
			    </div>

			  </div>
		</div>
    </body>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.d_app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>