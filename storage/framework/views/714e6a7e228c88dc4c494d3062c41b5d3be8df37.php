

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
              		<div class="col-md-10 col-md-offset-1">
                        <br>
                        <div class="panel panel-primary">
                          <div class="panel-heading">All Participated draws</div>
                          <div class="panel-body">
                            <div class="table-responsive" style="min-height: 200px;">
                                <table class="table">
                                  <thead>
                                    <tr>
                                      <th>S/N</th>
                                      <th>User</th>
                                      <th>Amount</th>
                                      <th>Guesses</th>
                                      <th>Game Release</th>
                                      <th>Status</th>
									  <th>Staked</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = $stakes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $uc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                      <tr>
                                        <td><?php echo e(++$key, false); ?></td>
                                        <td><a href="/admin/user/<?php echo e($uc->user_id, false); ?>"><?php echo e($uc->user->email, false); ?></a></td>
                                        <td><?php echo $uc->user->currency; ?><?php echo e(number_format($uc->amount), false); ?></td>
                                        <td><?php echo e($uc->numbers, false); ?></td>
                                        <td><?php echo e($uc->game->numbers, false); ?></td>
                                        <td><?php if($uc->win_index == null): ?>
                                            <span class="label label-warning">Pending...</span>
                                            <?php else: ?>
                                            <span class="label <?php if($uc->win_index > 2): ?> label-success <?php else: ?> label-danger <?php endif; ?>"> <?php echo e($uc->win_index, false); ?> </span>
                                            <?php endif; ?>
                                        </td>
										<td><?php echo e($uc->created_at->diffForHumans(), false); ?></td>
                                      </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                      <tr>
                                        <td colspan="5"><center><i><b>No stakes for next game</b></i></center></td>
                                      </tr>
                                    <?php endif; ?>
                                  </tbody>
                                </table>
                                <?php echo e($stakes->links(), false); ?>

                            </div>

                          </div>
                        </div>
                    </div>
              </div><!-- /row -->
        </div><!-- /col-lg-9 END SECTION MIDDLE -->
    </body>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.d_app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>