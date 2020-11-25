<?php $__env->startSection('content'); ?>
<!-- Inner Page Header serction start here -->
<div class="inner-page-header">
    <div class="container">
        <div class="row">
             <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                 <div class="header-page-title">
                     <h2>Welcome <?php echo e(Auth::user()->name, false); ?> </h2>
                 </div>
             </div>
             <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                 <div class="header-page-locator">
                     <ul>
                         <li><a href="/">Home /</a> <a href="/dashboard">Back-Office /</a> Affiliates</li>
                     </ul>
                 </div>
             </div>
        </div>
    </div>
</div>
<!-- **********************************************************************************************************************************************************
  MAIN CONTENT
  *********************************************************************************************************************************************************** -->
<!--main content start-->
<section id="main-content">
	<section class="wrapper" style="margin-top:10px;">
<!-- Inner Page Header serction end here -->
		<div class="row">
	        <div class="col-lg-10 col-lg-offset-1">
	            <div class="container-fluid">
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
	                        <center><?php echo e(session('success-status'), false); ?></center>
	                        </div>
	                    </div>
	                <?php endif; ?>
	              <div class="row">
					  <div class="col-md-12">
						  <p>Below is a comprehensive list of our affiliates and trusted representatives in <?php echo e(Auth::user()->country, false); ?>. In order to
						  , you have to contact any of these people via their contact email or phone number. They will guide you on the process and your transactions can begin.</p>
						  <br><p>After making Payment, Please Text to the affiliate the Depositor's name, Amount paid and email address to be credited.</p>
                          <div class="alert alert-info alert-dismissable">
                           <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                           <div class="container-fluid">
                           <center>Shares are only going to be available for purchase on <b>Mondays</b>, <b>Tuesdays</b>, <b>Wednesdays</b> and <b>Fridays</b>.
                           <br></b>We are recruiting Affiliates!</b> Note that all Affiliates are investors with 10in10tradaing therefore, before you can be considered you must be an investor
                           with active shares.<br>To apply, From your Back-Office/Dashboard Click on Referral panel, there you will see the form fill it and submit.</center>
                           </div>
                       </div>
					  </div>
	                  <?php $__empty_1 = true; $__currentLoopData = $affiliates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
	                    <div class="col-md-4">
	                        <section class="panel panel-primary scrollable" style="height:325px;">
	                           <header class="panel-heading">
	                               <h3 class="panel-title">Affiliate <?php echo e(++$k, false); ?> </h3>
								   <a class="btn btn-xs btn-success pull-right" data-toggle="modal" data-target="#affiliate-<?php echo e($k, false); ?>" href="#">Buy Shares</a>
	                           </header>
	    						<div class="panel-body">
		    						<div class="col-lg-12 table-responsive">
	                                    <table class="table table-xs" style="font-size:12px;">
											<tbody>
												<tr><td><b>Name:</b></td><td> <?php echo e($d->name, false); ?><br /></td></tr>
												<tr><td><b>Email:</b></td><td><b><?php echo e($d->email, false); ?></b></td></tr>
												<tr><td><b>Acct No:</b></td><td><b><?php echo e($d->account_number, false); ?></b></td></tr>
												<tr><td><b>Bank:</b></td><td><b><?php echo e($d->bank_name, false); ?></b></td></tr>
												<tr><td><b>Phone:</b></td><td><b><?php echo e($d->phone, false); ?></b></td></tr>
												<tr><td><b>Country:</b></td><td><b><?php echo e($d->country, false); ?></b>
												<tr><td><b>BTC Id:</b></td><td><b>1Q7Nir3jVfCnfCjztMPZDo9Cg8V9zvxA2t</b></td></tr>
                                                <tr><td><b>Status:</b></td><td><?php if(\App\Transaction::where('sender', $d->id)->where('status', 0)->sum('amount') > 0): ?><span class="label label-success"><b>Available - <?php echo $d->currency; ?><?php echo e(number_format(\App\Transaction::where('sender', $d->id)->where('status', 0)->sum('amount')), false); ?></b></span><?php else: ?> <span class="label label-danger">Unavailable</span> <?php endif; ?></td></tr>
											</tbody>
										</table>
		    						</div>
	    						</div>
	                        </section>
							<div id="affiliate-<?php echo e($k, false); ?>" class="modal fade" role="dialog">
							  <div class="modal-dialog">

							    <!-- Modal content-->
							    <div class="modal-content">
							      <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal">&times;</button>
							        <h4 class="modal-title">Buy Shares - <?php echo e($d->name, false); ?></h4>
							      </div>
							      <div class="modal-body">
									  <form action="<?php echo e(url('/purchase_request'), false); ?>" method="POST">
  										<?php echo e(csrf_field(), false); ?>

  										<input type="hidden" name="affiliate" value="<?php echo e($d->id, false); ?>" />
  										<div class="form-group col-md-12">
  											<label class="control-label">Amount to purchase(<?php echo Auth::user()->currency; ?>):</label>
  											<input type="number" class="form-control" name="amount" value="5" />
  											<small><b>Note:</b> You have to transfer the equivalent of the shares to the seller to activate your purchase</small>
  										</div>
  										<div class="form-group">
  											<center>
  												<button type="submit" class="btn btn-sm btn-danger">Make Request</button>
  											</center>
  										</div>
  									</form>
							      </div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							      </div>
							    </div>

							  </div>
							</div>

	                    </div>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                      <div class="col-md-8 col-md-offset-2">
                           <center>There are currently no affiliates in <?php echo e(Auth::user()->country, false); ?>. Shares can only be purchased via bitcoin. Make a payment to the bitcoin account below and send a support message to get your shares activated. Then you can start receiving your profit. <br><br>Bitcoin Wallet ID: <b><?php echo e(\App\Setting::first()->bitcoin_wallet_id, false); ?></b><br></center>
                      </div>
	                  <?php endif; ?>
                      <div class="col-md-8 col-md-offset-2">
                          <center><p><a href="https://t.me/at10in10trading">Click here to join us on Telegram</a></p></center>
                      </div>
	              </div><!-- /row -->
	          </div><!-- /col-lg-9 END SECTION MIDDLE -->
	    	</div>
		</div>
	</section>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>