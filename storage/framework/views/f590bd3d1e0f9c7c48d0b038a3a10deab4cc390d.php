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
					  <div class="col-lg-12">
                    	<div class="panel panel-default">
							<div class="panel-heading">Coupon Codes Statistics</div>
							<div class="panel-body">
								<div class="col-md-4 col-md-offset-4">
									<table class="table table-condensed">
								<tr><td><b>Total Coupons</b></td><td><b> <?php echo e($code_count, false); ?></b></td></tr>

									</table>
								</div>
							</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading">Coupon codes</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-lg-6 col-lg-offset-6">

								  </div>
								</div>
							</div>
							<div style="margin:10px; overflow-x:auto;" class="table-responsive">
								<table class="table table-striped">
									<thead>
										<tr>
											<th>S/No</th>
											<th>code</th>

										</tr>
									</thead>
									<tbody>
                    <?php $__currentLoopData = $codes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
        	<th><b><?php echo e($key+1, false); ?></b></th>
        <th><?php echo e($data->code, false); ?></th>


      </tr>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

									</tbody>
								</table>

							</div>
						</div>
                    </div>
                </div>
              </div><!-- /row -->
          </div><!-- /col-lg-9 END SECTION MIDDLE -->
    </body>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin_app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>