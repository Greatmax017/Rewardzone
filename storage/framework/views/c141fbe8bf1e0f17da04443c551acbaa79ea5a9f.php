

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
              <div class="row">
                <div class="col-md-10 col-md-offset-1">
					    <div class="panel panel-default">
							<div class="panel-heading">Inbox</div>
							<div class="panel-body">
								<div>
								<table class="table">
									<thead>
										<tr>
											<th>Sender</th>
											<th>Subject</th>
											<th>Date</th>
										</tr>
									</thead>
									<tbody>
										<?php $__empty_1 = true; $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
										<tr>

											<td><a href="/admin/message/<?php echo e($m->id); ?>"><?php echo e(isset($m->sender_data->email) ? $m->sender_data->email : 'Support'); ?></a></td>
											<td><a href="/admin/message/<?php echo e($m->id); ?>"><?php echo e(isset($m->subject) ? $m->subject : ''); ?></a></td>
											<td><?php echo e($m->created_at->toDayDateTimeString()); ?></td>
										</tr>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
										<tr>
											<td colspan="3"><center><i>No messages in your inbox</i></center></td>
										</tr>
										<?php endif; ?>
									</tbody>
								</table>
								<?php echo e($messages->links()); ?>

								</div>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">Sent Messages</div>
							<div class="panel-body">
								<div>
								<table class="table">
									<thead>
										<tr>
											<th>To</th>
											<th>Subject</th>
											<th>Date</th>
										</tr>
									</thead>
									<tbody>
										<?php $__empty_1 = true; $__currentLoopData = $messages_sent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
										<tr>

											<td><a href="/admin/message/<?php echo e($m->id); ?>"><?php echo e(isset($m->receiver_data->email) ? $m->receiver_data->email : 'support'); ?></a></td>
											<td><a href="/admin/message/<?php echo e($m->id); ?>"><?php echo e(isset($m->subject) ? $m->subject : ''); ?></a></td>
											<td><?php echo e($m->created_at->toDayDateTimeString()); ?></td>
										</tr>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
										<tr>
											<td colspan="3"><center><i>You have not sent any messages yet</i></center></td>
										</tr>
										<?php endif; ?>
									</tbody>
								</table>
								</div>
								<div class="form-group">
								    <div style="margin-top:20px;" class="col-md-8 col-md-offset-2 text-center">
									<a href="/admin/message" class="btn btn-sm btn-primary">
									    New Message
									</a><br /><br />
								    </div>
								</div>
							</div>
						</div>
                    </div>
              </div><!-- /row -->
          </div><!-- /col-lg-9 END SECTION MIDDLE -->
    </body>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.d_app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>