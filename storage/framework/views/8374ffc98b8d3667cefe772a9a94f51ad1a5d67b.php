<?php $__env->startSection('content'); ?>
<!-- Inner Page Header serction start here -->
<div class="inner-page-header">
    <div class="container">
        <div class="row">
             <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                 <div class="header-page-title">
                     <h2>Referral/Affiliate Panel </h2>
                 </div>
             </div>
             <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                 <div class="header-page-locator">
                     <ul>
                         <li><a href="<?php echo e(url('/dashboard')); ?>">Back-Office /</a> Referral</li>
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
              		<div class="col-md-8 col-md-offset-2">
						  <div class="panel panel-primary">
							<div class="panel-heading">Referral/Affiliate</div>
							<div class="panel-body table-responsive">
								<div>
									<i><b>Total users referred:</b> <?php echo e($ref_count); ?></i><br>
									<br>
									<br>
									<table class="table">
										<thead>
											<tr>
												<th>User</th>
												<th>Email</th>
                                                <th>Phone</th>
											</tr>
										</thead>
										<tbody>
											<?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
											<tr>
												<td><?php echo e($m->name); ?></td>
												<td><?php echo e($m->email); ?></td>
                                                <td><?php echo e($m->phone); ?></td>
											</tr>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
											<tr>
												<td colspan="3"><center><i>You have not referred anyone. share your referral link to get referral bonus</i></center></td>
											</tr>
											<?php endif; ?>
										</tbody>
									</table>
									<?php echo e($users->links()); ?>

									<div class="row">
										<div class="col-lg-12">
											<div class="alert alert-success">
												<p class="text-center">Your Referral Link is <a href="https://www.10in10trading.com/register?ref=<?php echo e(Auth::user()->email); ?>" style="word-wrap:break-word;"><b>https://www.10in10trading.com/register?ref=<?php echo e(Auth::user()->email); ?></b></a></p>
											</div>
										</div class="col-lg-12">
                                            <center>
                                                <a href="https://form.myjotform.com/80456227648564">Apply to become an affiliate in your country</a>
                                            </center>
                                            <p>
                                                <script type="text/javascript" src="https://form.myjotform.com/jsform/80456227648564"></script>
                                            </p>
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