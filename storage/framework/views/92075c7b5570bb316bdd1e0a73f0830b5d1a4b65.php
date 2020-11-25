<?php $__env->startSection('content'); ?>
<!-- Inner Page Header serction end here -->
	<div class="wrapper">
            <div class="section section-clients">
                <div class="container">
		    <div class="row">
		   	<div class="col-lg-12">
                <br>
				<div class="col-md-8 offset-md-2">
					<?php if(session('success-status')): ?>
					    	<div class="alert alert-success">
						    <div class="container-fluid">
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
							  </button>
						       <center><?php echo e(session('success-status'), false); ?></center>
						    </div>
						</div>
					<?php endif; ?>
					<div class="card">
							<div class="card-header">Contact Form</div>
							<div class="card-body">
								<form id="send-message" class="form" role="form" method="POST" action="<?php echo e(url('/contact_us'), false); ?>">
									<?php echo e(csrf_field(), false); ?>


									<div class="form-group<?php echo e($errors->has('subject') ? ' has-error' : '', false); ?>">
									   <label for="subject" class="control-label">Your Name:</label>
									   <input id="subject" type="text" class="form-control" placeholder="Full Name" name="name" value="<?php echo e(old('name'), false); ?>" required autofocus>
										<?php if($errors->has('name')): ?>
										    <span class="label label-danger">
											<strong><?php echo e($errors->first('name'), false); ?></strong>
										    </span>
										<?php endif; ?>
									</div>


									<div class="form-group<?php echo e($errors->has('email') ? ' has-error' : '', false); ?>">
									   <label for="email" class="control-label">Your Email:</label>
									   <input id="email" type="email" class="form-control" placeholder="example@Digimexcrypto.com" name="email" value="<?php echo e(old('email'), false); ?>" required>
										<?php if($errors->has('email')): ?>
										    <span class="label label-danger">
											<strong><?php echo e($errors->first('email'), false); ?></strong>
										    </span>
										<?php endif; ?>
									</div>

									<div class="form-group<?php echo e($errors->has('subject') ? ' has-error' : '', false); ?>">
									   <label for="subject" class="control-label">Subject:</label>
									   <input id="subject" type="text" class="form-control" placeholder="Message Subject" name="subject" value="<?php echo e(old('subject'), false); ?>" required>
										<?php if($errors->has('subject')): ?>
										    <span class="label label-danger">
											<strong><?php echo e($errors->first('subject'), false); ?></strong>
										    </span>
										<?php endif; ?>
									</div>

									<div class="form-group">
									    <label for="message" class="control-label">Message:</label><br />
									    <textarea class="form-control" rows="6" name="message"><?php echo e(old('message'), false); ?></textarea>
									</div>

									<br />

									<div class="form-group">
									    <div style="margin-top:20px;" class="col-md-8 offset-md-2 text-center">
										<a onclick="submitForm(this);" form-id="send-message" form-action="send this message" class="btn btn-lg btn-primary">
										    Send Message
										</a><br /><br />
									    </div>
									</div>
								    </form>
							</div>
					</div>
				</div>
			</div>
		    </div>
		</div>
            </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>