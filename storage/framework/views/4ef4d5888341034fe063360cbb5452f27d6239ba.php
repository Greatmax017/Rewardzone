

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
              		<div class="panel panel-danger">
						<div class="panel-heading">Compose Message</div>
						<div class="panel-body">
							<form id="send-message" class="form" role="form" method="POST" action="<?php echo e(url('/admin/send_message')); ?>" enctype="multipart/form-data">
								<?php echo e(csrf_field()); ?>


								<div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
								   <label for="email" class="control-label">Send to:</label>
								   <input class="form-control" name="email" value="<?php echo e(isset($email) ? $email : ''); ?>">
								</div>

								<div class="form-group<?php echo e($errors->has('subject') ? ' has-error' : ''); ?>">
								   <label for="subject" class="control-label">Subject:</label>
								   <input id="subject" type="text" class="form-control" placeholder="Message Subject" name="subject" value="<?php echo e(isset($subject) ? $subject : ''); ?>" required autofocus>
									<?php if($errors->has('subject')): ?>
									    <span class="label label-danger">
										<strong><?php echo e($errors->first('subject')); ?></strong>
									    </span>
									<?php endif; ?>
								</div>

								<div class="form-group">
								    <label for="message" class="control-label">Message:</label><br />
								    <textarea class="form-control" rows="6" name="message"><?php echo e(isset($message) ? $message : ''); ?></textarea>
								</div>

								<div class="col-sm-6">
									<label for="attachment">Attach Image (Optional):</label>
									<input type="file" name="attachment" accept="image/*">
								</div>
								<br />

								<div class="form-group">
								    <div style="margin-top:20px;" class="col-md-8 col-md-offset-2 text-center">
									<a onclick="submitForm(this);" form-id="send-message" form-action="send this message" class="btn btn-lg btn-primary">
									    Send Message
									</a><br /><br />
								    </div>
								</div>
							    </form>
						</div>
					</div>
              </div><!-- /row -->
          </div><!-- /col-lg-9 END SECTION MIDDLE -->
    </body>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.d_app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>