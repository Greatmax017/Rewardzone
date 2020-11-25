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
                         <li><a href="/">Home /</a> Back-Office</li>
                     </ul>
                 </div>
             </div>
        </div>
    </div>
</div>
<!-- Inner Page Header serction end here -->

<div class="container">
<script type="text/javascript">
baseUrl = "https://widgets.cryptocompare.com/";
var scripts = document.getElementsByTagName("script");
var embedder = scripts[ scripts.length - 1 ];
var cccTheme = {"General":{"enableMarquee":true}};
(function (){
var appName = encodeURIComponent(window.location.hostname);
if(appName==""){appName="local";}
var s = document.createElement("script");
s.type = "text/javascript";
s.async = true;
var theUrl = baseUrl+'serve/v3/coin/header?fsyms=BTC,ETH,XMR,LTC&tsyms=USD,EUR,CNY,GBP';
s.src = theUrl + ( theUrl.indexOf("?") >= 0 ? "&" : "?") + "app=" + appName;
embedder.parentNode.appendChild(s);
})();
</script>
</div>
<div class="container">
<script type="text/javascript">
baseUrl = "https://widgets.cryptocompare.com/";
var scripts = document.getElementsByTagName("script");
var embedder = scripts[ scripts.length - 1 ];
(function (){
var appName = encodeURIComponent(window.location.hostname);
if(appName==""){appName="local";}
var s = document.createElement("script");
s.type = "text/javascript";
s.async = true;
var theUrl = baseUrl+'serve/v3/coin/chart?fsym=BTC&tsyms=USD,EUR,CNY,GBP';
s.src = theUrl + ( theUrl.indexOf("?") >= 0 ? "&" : "?") + "app=" + appName;
embedder.parentNode.appendChild(s);
})();
</script></div>
<div class="container">




	<!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper" style="margin-top:10px;">

              <?php if(Auth::user()->suspended): ?>
                  <div class="alert alert-danger">
                      <div class="container-fluid">
                        <center>This account is suspended due to multiple accounts detected. Contact support at <a href="mailto:support@10in10trading.com">support@10in10trading.com</a> for details and quick review</center>
                      </div>
                  </div>
              <?php endif; ?>

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
                  <div class="col-lg-12">
                  	<div class="row">
                  		<div class="col-md-4 col-sm-4">
	                  			<div class="alert alert-info">
                            <center>
          					  <h4 style="margin-bottom: 10px;"><i class="fa fa-money"></i> Total Active Shares</h4>
                              <h3 style="margin-bottom: 10px;"><?php echo Auth::user()->currency; ?><?php echo e(number_format(\App\Transaction::where('sender', Auth::user()->id)->where('status', 0)->where('receiver', 0)->sum('amount')), false); ?></h3>
                              <a href="<?php echo e(url('/transaction_history'), false); ?>" class="btn btn-xs btn-primary">Transaction History</a> <a href="<?php echo e(url('/affiliates'), false); ?>" class="btn btn-xs btn-success"><i class="fa fa-money"></i> Buy Shares</a>
                            </center>
	                  			</div>
	                  	</div>

	                  	<div class="col-md-4 col-sm-4">
	                  			<div class="alert alert-success">
                            <center>
	                  				<h4 style="margin-bottom: 10px;"><i class="fa fa-money"></i> Current Value of Active Shares</h4>
                              <h3 style="margin-bottom: 10px;"><?php echo Auth::user()->currency; ?><?php echo e(number_format($active_shares->sum('current_value')), false); ?> </h3>
                              <br>
                            </center>
	                  			</div>
	                  	</div>

                      <div class="col-md-4 col-sm-4">
                          <div class="alert alert-warning">
                            <center>
                              <h4 style="margin-bottom: 10px;"><i class="fa fa-user"></i> Referred Users <small>(Active)</small></h4>
                              <h3 style="margin-bottom: 10px;"> <?php echo e(\App\User::where('referrer_id', Auth::user()->id)->count(), false); ?> <small>(<?php echo e(Auth::user()->referred_count(), false); ?>)</small>
                              <?php if(Auth::user()->referred_count() > 19 && Auth::user()->referred_count() < 40): ?>
                              <small><b>- MANAGER</b></small>
                              <?php elseif(Auth::user()->referred_count() > 39 && Auth::user()->referred_count() < 80): ?>
                              <small><b>- PROFESSIONAL MANAGER</b></small>
                              <?php elseif(Auth::user()->referred_count() > 79 && Auth::user()->referred_count() < 160): ?>
                              <small><b>- ASSOCIATE</b></small>
                              <?php elseif(Auth::user()->referred_count() > 159): ?>
                              <small><b>- PARTNER</b></small>
                              <?php endif; ?>
                              </h3>
                              <a href="<?php echo e(url('/referred_bonus'), false); ?>" class="btn btn-xs btn-warning">Referral/Affiliate Panel</a>
                            </center>
                          </div>
                      </div>
                  	</div><!-- /row mt -->
                    <div style="background:white;" class="row mt">
                        <!-- SERVER STATUS PANELS -->
	                    <div class="col-md-6">
                        <br />
                        <div class="panel panel-primary">
                          <div class="panel-heading">Active Purchased Shares
                          <a id="_merge_shares_form_button" style="display:none;"  onclick="submitForm(this);" form-id="merge_shares_form" form-action="merge selected shares to new share with date of newest share and at a fee of 2.5%" class="btn btn-xs btn-default pull-right">Merge shares</a></div>
                          <div class="panel-body">
                            <div class="table-responsive" style="height: 200px;">
                                <form id="merge_shares_form" action="<?php echo e(url('/merge_shares'), false); ?>" method="post" />
                                <?php echo e(csrf_field(), false); ?>

                                 <input type="hidden" id="merge_transactions" name="transactions" value="" />
                                </form>
                                <table class="table">
                                  <thead>
                                    <tr>
                                      <th><input type="checkbox" id="_share_checkbox" /></th>
                                      <th>Amount</th>
                                      <th>Current Worth</th>
                                      <th>Purchased</th>
                                      <th>Can withdraw in</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = $active_shares; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $uc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                      <tr>
                                        <td><input type="checkbox" value="<?php echo e($uc->id, false); ?>" class="_share_checkbox" /></td>
                                        <td><?php echo Auth::user()->currency; ?><?php echo e(number_format($uc->amount), false); ?></td>
                                        <td style="color:black;"><b><?php echo Auth::user()->currency; ?><?php echo e(number_format($uc->current_value), false); ?></b></td>
                                        <td><?php echo e($uc->created_at->diffForHumans(), false); ?></td>
                                        <td>
                                        <?php if($uc->days >= 15 && !Auth::user()->suspended): ?>
                                            <?php if(strpos($uc->description, 'Referral Bonus') !== false): ?>
                                            <a data-toggle="modal" data-target="#withdraw-<?php echo e($uc->id, false); ?>" href="#withdraw-<?php echo e($uc->id, false); ?>" class="btn btn-xs btn-primary">Withdraw</a>
                                            <div id="withdraw-<?php echo e($uc->id, false); ?>" class="modal fade" role="dialog">
                                    			  <div class="modal-dialog">
                                      			    <!-- Modal content-->
                                      			    <div class="modal-content">
                                      			      <div class="modal-header">
                                            				<h4 class="modal-title">Withdrawal Request</h4>
                                            			 </div>
                                            			 <div class="modal-body">
                                              				<form id="other-options-form" action="<?php echo e(url('/withdrawal_request'), false); ?>" method="POST">
                                              					<?php echo e(csrf_field(), false); ?>

                                                                <input type="hidden" name="transaction" value="<?php echo e($uc->id, false); ?>" />
                                                                <div class="form-group col-md-12">
                                              						<label class="control-label">Amount to withdraw (<?php echo Auth::user()->currency; ?>):</label>
                                              						<input type="number" class="form-control" name="amount" value="<?php echo e($uc->current_value, false); ?>" />
                                                                    <small><b>Note:</b> Payment is proccessed between 0-48hrs <br>If you withdraw less than your current amount, the rest will be rolled over as a new shares and will start yielding profit</small>
                                              					</div>
                                              					<div class="form-group">
                                              						<center>
                                              							<button type="submit" class="btn btn-sm btn-danger">Make Withrawal</button>
                                              						</center>
                                              					</div>
                                              				</form>
                                        			      </div>
                                      			    </div>
                                    			  </div>
                                      		</div>
                                            <?php else: ?>
                                            <a data-toggle="modal" data-target="#withdraw-<?php echo e($uc->id, false); ?>" href="#withdraw-<?php echo e($uc->id, false); ?>" class="btn btn-xs btn-primary">Withdraw</a>
                                            <div id="withdraw-<?php echo e($uc->id, false); ?>" class="modal fade" role="dialog">
                                    			  <div class="modal-dialog">
                                      			    <!-- Modal content-->
                                      			    <div class="modal-content">
                                      			      <div class="modal-header">
                                            				<h4 class="modal-title">Withdrawal Request</h4>
                                            			 </div>
                                            			 <div class="modal-body">
                                                             <div class="row">
                                                                 <div class="col-md-12">
                                                                     <center>
                                                                         <a onclick="submitForm(this);" form-id="profit-form" form-action="withdraw your profit only and let your capital grow for interest again" class="btn btn-sm btn-primary">Withdraw Profit</a>
                                                                         <br><a onclick="document.getElementById('other-options-form').style.display='block';" href="#"><small style="font-size:10.5px;">Other withdrawal options</small></a>
                                                                         <form id="profit-form" style="display:none;" action="<?php echo e(url('/withdrawal_request'), false); ?>" method="POST">
                                                           					<?php echo e(csrf_field(), false); ?>

                                                                             <input type="hidden" name="transaction" value="<?php echo e($uc->id, false); ?>" />
                                                                             <input type="number" class="form-control" name="amount" value="<?php echo e($uc->current_value - $uc->amount, false); ?>" />
                                                           				</form>
                                                                     </center>
                                                                 </div>
                                                             </div>
                                              				<form id="other-options-form" style="display:none;" action="<?php echo e(url('/withdrawal_request'), false); ?>" method="POST">
                                              					<?php echo e(csrf_field(), false); ?>

                                                                <input type="hidden" name="transaction" value="<?php echo e($uc->id, false); ?>" />
                                                                <div class="form-group col-md-12">
                                              						<label class="control-label">Amount to withdraw (<?php echo Auth::user()->currency; ?>):</label>
                                              						<input type="number" class="form-control" name="amount" />
                                                                    <small><b>Note:</b>  Payment is proccessed between 0-48hrs  <br>If you withdraw less than your current amount, the rest will be rolled over as a new shares and will start yielding profit</small>
                                              					</div>
                                              					<div class="form-group">
                                              						<center>
                                              							<button type="submit" class="btn btn-sm btn-danger">Make Withrawal</button>
                                              						</center>
                                              					</div>
                                              				</form>
                                        			      </div>
                                      			    </div>
                                    			  </div>
                                      		</div>
                                            <?php endif; ?>
                                            <?php else: ?>
                                             <?php echo e(15 - $uc->days, false); ?> Trading days
                                            <?php endif; ?>
                                        </td>
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
                        <div class="panel panel-primary">
                          <div class="panel-heading">News and Information</div>
                          <div class="panel-body">
                            <div class="table-responsive" style="height: 200px;">
                                <ul>
                                    <?php $__empty_1 = true; $__currentLoopData = \App\Post::latest()->limit(20)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <li style="border-bottom: 1px solid #e4e1e1; margin-bottom:10px;"><b>-</b> <a href="/blog/<?php echo e($news->url, false); ?>"><?php echo e($news->title, false); ?></a><?php if($news->created_at->isToday()): ?> <small style="color:red;"><b>*NEW*</b></small> <?php endif; ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <center>
                                        <br>
                                        <i>No recent news articles. We are sure to keep you updated on recent activities</i>
                                    </center>
                                    <?php endif; ?>
                                </ul>
                            </div>

                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
	                    	<br />
                                 <?php if(Auth::user()->is_affiliate || Auth::user()->role == 2): ?>
                                 <div class="panel panel-primary">
                                     <div class="panel-heading">Transfer Shares</div>
                                             <div class="panel-body">
                                                <form id="transfer-form" class="form" role="form" method="POST" action="<?php echo e(url('/transfer'), false); ?>">
                                                     <?php echo e(csrf_field(), false); ?>

                                                     <br>
                                                     <div class="form-group <?php echo e($errors->has('email') ? ' has-error' : '', false); ?>">
                                                         <label class="control-label">User Email</label>
                                                         <input type="text" class="form-control" placeholder="user@example.com" name="email" value="<?php echo e(old('email'), false); ?>" required autofocus>
                                                         <?php if($errors->has('email')): ?>
                                                             <span class="label label-danger">
                                                             <strong><?php echo e($errors->first('email'), false); ?></strong>
                                                             </span>
                                                         <?php endif; ?>
                                                     </div>

                                                     <div class="form-group<?php echo e($errors->has('amount') ? ' has-error' : '', false); ?>">
                                                         <label class="control-label">Amount</label>
                                                         <input type="number" class="form-control" placeholder="Amount" value="<?php echo e(old('amount'), false); ?>" name="amount">
                                                         <?php if($errors->has('amount')): ?>
                                                             <span class="label label-danger">
                                                             <strong><?php echo e($errors->first('amount'), false); ?></strong>
                                                             </span>
                                                         <?php endif; ?>
                                                     </div>
                                                     <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : '', false); ?>">
                                                         <label class="control-label">Password</label>
                                                         <input type="password" class="form-control" placeholder="password" name="password">
                                                         <?php if($errors->has('password')): ?>
                                                             <span class="label label-danger">
                                                             <strong><?php echo e($errors->first('password'), false); ?></strong>
                                                             </span>
                                                         <?php endif; ?>
                                                     </div>

                                                     <div class="form-group">
                                                         <center>
                                                             <a onclick="submitForm(this);" form-id="transfer-form" form-action="transfer funds" style="margin-top:20px;" type="submit" class="btn btn-inline btn-success">
                                                                 Transfer Shares
                                                             </a><br />
                                                         </center>
                                                     </div>
                                             </form>
                                     </div>
                                 </div>
                                 <?php else: ?>
                                 <div class="panel panel-primary">
 	                    		 <div class="panel-heading">15 Days Profit</div>
           								<div class="panel-body">
                                             <div class="table-responsive" style="height: 200px;">
               									<table class="table">
               										<thead>
               											<tr>
               												<th>ID</th>
               												<th>Amount</th>
                                                             <th>Requested</th>
                                                             <th>Status</th>
               											</tr>
               										</thead>
               										<tbody>
               											<?php $__empty_1 = true; $__currentLoopData = $gh_trans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $uc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
               												<tr>
               													<td><?php echo e(substr($uc->id,0,13), false); ?></td>
               													<td><?php echo Auth::user()->currency; ?><?php echo e(number_format($uc->amount), false); ?></td>
               													<td><?php echo e($uc->created_at->diffForHumans(), false); ?></td>
                                                                 <td>
                                                                   <?php if($uc->status == 0): ?>
                                   									    <span style="color:blue;">PENDING</span>
                                                                   <?php elseif($uc->status == 1): ?>
                                         							    <span style="color:green;">COMPLETED</span>
                                                                   <?php else: ?>
                                                                        <span style="color:red;">FAILED (Rejected)</span>
                                                                   <?php endif; ?>
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
                                             <p style="line-height:1.4;">
                                                 <small><b>Note:</b> Profits are converted to your local currency and paid into your bank account. Payment processing is within 48 hours</small>
                                             </p>
                                         </div>
         					     </div>
                                  <br>
                                 <?php endif; ?>
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
              				<form id="new_cat" action="<?php echo e(url('/share_testimony'), false); ?>" method="POST">
              					<?php echo e(csrf_field(), false); ?>

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