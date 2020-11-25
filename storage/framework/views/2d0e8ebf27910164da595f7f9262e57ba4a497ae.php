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
				<div class="col-md-8 col-md-offset-2">
					<?php if(session('error-status')): ?>
					    	<div class="alert alert-danger">
						    <div class="container-fluid">
							  <div class="alert-icon">
							    <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
							  </div>
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
							  </button>
						      <b>Error:</b> <?php echo e(session('error-status')); ?>

						    </div>
						</div>
					<?php endif; ?>
					<div class="panel panel-default">
							<div class="panel-heading">Message Detail</div>
									<div class="panel-body">
										<div class="table-responsive">
											<table class="table table-condensed">
												<tbody>
													<tr><td><b>Sender Name</b></td><td><?php echo e(isset($message->sender_data->name) ? $message->sender_data->name : 'System'); ?><br /></td></tr>	
													<tr><td><b>Sender Email:</b></td><td><b><?php echo e(isset($message->sender_data->email) ? $message->sender_data->email : 'support@mutualfund.community'); ?> <?php if(Auth::user()->id != $message->sender): ?> <a href="/message/reply/<?php echo e($message->id); ?>" class="btn btn-xs btn-primary">Reply</a> <?php endif; ?></b></td></tr>
													<tr><td><b>Receiver Name</b></td><td> <?php echo e(isset($message->receiver_data->name) ? $message->receiver_data->name : 'support'); ?><br /></td></tr>	
													<tr><td><b>Receiver Email:</b></td><td><b><?php echo e(isset($message->receiver_data->email) ? $message->receiver_data->email : 'support@mutualfund.community'); ?></b></td></tr>
													<tr><td><b>Subject:</b></td><td><b><?php echo e(isset($message->subject) ? $message->subject : ''); ?></b></td></tr>
												</tbody>
											</table>
										</div>
										<p><?php echo e($message->message); ?></p>
										<?php if($message->attachment != null): ?>
											<b>Attachment:</b>
											<img class="img-responsive" src="/<?php echo e($message->attachment); ?>" alt="Message Attachment" />
										<?php endif; ?>
										<div class="form-group">
										    <div style="margin-top:20px;" class="col-md-8 col-md-offset-2 text-center">
											<a href="/messagebox" class="btn btn-sm btn-primary">
											    Return to Messages
											</a><br /><br />
										    </div>
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